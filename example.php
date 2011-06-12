<?php

ini_set('max_execution_time', 777);
ignore_user_abort(true);
@set_time_limit(0);

function delete($arg) {
    $d = opendir($arg);
    while ($f = readdir($d)) {
        if ($f != "." && $f != "..") {
            if (is_dir($arg . "/" . $f))
                delete($arg . "/" . $f);
            else
                unlink($arg . "/" . $f);
        }
    }
    closedir($d);
    rmdir($arg);
}

$url = 'http://myprivatesite.googlecode.com/svn/';
//$url = 'http://phpsvnclient.googlecode.com/svn/';

require_once("phpsvnclient.php");
$phpsvnclient = new phpsvnclient($url);

//delete('../dev');
$phpsvnclient->createOrUpdateWorkingCopy('branches/TestVersion', dirname(__FILE__).'/../dev');
//$phpsvnclient->createOrUpdateWorkingCopy('branches/khartn', '../dev');
?>