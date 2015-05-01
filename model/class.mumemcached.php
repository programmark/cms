<?php

    class mumemcached {

        private $_mem = null;

        public function __construct() {
            
        }

        public function connect() {
            $aIni = parse_ini_file(PATH_CONFIG . DS . 'app.ini', true);
            $host = $aIni['memcached']['host'];
            $port = $aIni['memcached']['port'];
            for($try=0; $try<3; $try++){
                
            }
            try {
                $m = new Memcache();
                $m->connect($host, $port);
                $this->_mem = $m;
                return true;
            } catch (Exception $ex) {
                p("memcached connect fair " . $ex->getMessage());
            }
        }

        public function get($key) {
            if ($key && $this->connect()) {
                return $this->_mem->get($key);
            }
        }

        public function set($key, $value, $expiration = 0) {
            if ($key && $this->connect()) {
                return $this->_mem->set($key, $value, $expiration);
            }
        }

        public function increment($key, $offset) {
            if ($key && $this->connect()) {
                return $this->_mem->increment($key, $offset);
            }
        }

        public function delete($key) {
            if ($key && $this->connect()) {
                return $this->_mem->delete($key);
            }
        }

        public function getMulti(array $keys) {
            if ($keys && $this->connect()) {
                return $this->_mem->getMulti($keys);
            }
        }

    }
    