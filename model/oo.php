<?php

class oo {

    public static $config = array();
    
    public function __construct() {
    }

    /**
     * 
     * @return \debugModel
     */
    public static function logs() {
        if (!isset(self::$config['logs'])) {
            include_once PATH_MODEL . DS  .'class.logs.php';
            self::$config['logs'] = new logs();
        }
        return self::$config['logs'];
    }

    /**
     * 
     * @return type
     */
    public static function smarty() {
        if (!isset(self::$config['smarty'])) {
            include_once PATH_LIB . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';
            self::$config['smarty'] = new Smarty();
        }
        return self::$config['smarty'];
    }
    
    /**
     * 
     * @return type
     */
    public static function mail() {
        if (!isset(self::$config['mail'])) {
            include_once PATH_MODEL . DS . 'class.mail.php';
            self::$config['mail'] = new mail();
        }
        return self::$config['mail'];
    }
    
    /**
     * 
     * @return type
     */
    public static function mysql() {
        if (!isset(self::$config['mysql'])) {
            include_once PATH_MODEL . DS . 'class.mysql.php';
            self::$config['mongo'] = new mysql();
        }
        return  self::$config['mongo'];
    }
    /**
     * 
     * @return type
     */
    public static function mongo() {
        if (!isset(self::$config['mongo'])) {
            include_once PATH_MODEL . DS . 'class.mongo.php';
            self::$config['mongo'] = new mumongo();
        }
        return  self::$config['mongo'];
    }
    
    /**
     * 
     * @return type
     */
    public static function mumemcached() {
        if (!isset(self::$config['mumemcached'])) {
            include_once PATH_MODEL . DS . 'class.mumemcached.php';
            self::$config['mumemcached'] = new mumemcached();
        }
        return  self::$config['mumemcached'];
    }
    
    public static function muredis() {
        if (!isset(self::$config['muredis'])) {
            include_once PATH_MODEL . DS . 'class.muredis.php';
            self::$config['muredis'] = new muredis();
        }
        return  self::$config['muredis'];
    }

    public static function payment() {
        if (!isset(self::$config['payment'])) {
            include_once PATH_MODEL . DS . 'class.payment.php';
            self::$config['memcached'] = new payment();
        }
        return  self::$config['payment'];
    }
}
