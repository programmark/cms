<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    define("WEB_ROOT", __DIR__);
    define("DS", DIRECTORY_SEPARATOR);
    define("PS", PATH_SEPARATOR);
    define("PRODUCTION_SERVER", "dev");
    define("PATH_MODEL", WEB_ROOT . DS . 'model');
    define("PATH_LIB", WEB_ROOT . DS . 'lib');
    define("PATH_CONFIG", WEB_ROOT . DS . 'config');
    define("PATH_VIEW", WEB_ROOT . DS . 'view');

    include(PATH_MODEL . DS . 'oo.php');
    include(PATH_MODEL . DS . 'otable.php');

    header('Content-type: text/html;charset=UTF-8');

    function p() {
        $aP = func_get_args();
        $ret = debug_backtrace();
        echo '◆ ' . $ret[0]['file'] . '  Line ' . $ret[0]['line'] . "<br>";
        if (func_num_args() === 1) $aP = $aP[0];
        print_r($aP);
        exit;
    }
    
    function f() {
        $aP = func_get_args();
        $ret = debug_backtrace();
        echo '◆ ' . $ret[0]['file'] . ' Line ' . $ret[0]['line'] . "<br>";
        if (!file_exists("d:/phpworkspace/logs/" . $aP[0])) die ("文件不存在");
        $string =  file_get_contents("d:/phpworkspace/logs/" . $aP[0]);
        //$string = str_replace("\n", "<br>", $string); // ok
        echo nl2br($string); // ok
        //echo htmlspecialchars($string); //err
    }

    function microtime_float() {
        list($usec, $sec) = explode(" ", microtime());
        return ((float) $usec + (float) $sec);
    }

    function alterMsg($msg, $start_time = '') {
        $start_time = $start_time ? $start_time : microtime_float();
        $end_time = microtime_float();
        $runtime = round(($end_time - $start_time) * 1000);
        echo "$msg  (times:" . $runtime . "ms);<br>";
    }
    