<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    class mumongo {

        private $_connect = false;
        private $_client = null;
        private $_con = null;

        public function __construct() {
            
        }

        public function connect() {
            $aIni = parse_ini_file(PATH_CONFIG . DS . 'app.ini', true);
            $host = $aIni['mongo']['host'];
            $port = $aIni['mongo']['port'];
            $db = $aIni['mongo']['db'];
            $this->_con = new MongoClient("mongodb://{$host}:{$port}");
            $this->_client = $this->_con->selectDB($db);
            return true;
        }

        public function selectCollection($table) {
            if ($table && $this->connect()) {
                return $this->_client->selectCollection($table);
            } else {
                //错误日志
            }
        }

        public function findOne($table, $key) {
            return $this->selectCollection($table)->findOne(array('_id' => $key));
        }

        public function update($table, $key, $aRet) {
            if (!empty($key)) {
                return $this->selectCollection($table)->insert(array('_id' => $key, 'content' => $aRet));
            } else {
                
            }
        }

        public function get($table, $key) {
            if ($table && ($this->selectCollection($table))) {
                return $this->findOne($table, $key);
            }
        }

        public function set($table, $key, $aRet) {
            return $this->update($table, $key, $aRet);
        }

        public function hSet($table, $key, $aRe) {
            if ($this->selectCollection($table)) {
//            $this->_client->
            }
        }

        public function __destruct() {
            echo "__destruct... mongo";
            //$this->_con->close(); // 1 关闭mongodb 连接
        }

    }
    