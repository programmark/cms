<?php

class mysql {

    public $_connect = false;
    public $_pdo = '';
    protected $book = 'book'; //书籍表
    protected $user = 'user'; //用户表
    protected $news_article = 'news_article';

    /**
     * 构造方法
     * @return type
     */

    public function __construct() {
        if (!$this->_connect) {
            $this->connect();
        }
    }

    /**
     * mysql 连接
     * @return \PDO
     */
    public function connect() {
            $tmp = parse_ini_file(PATH_CONFIG . DS . 'app.ini', true);
            $aIni = $tmp['mysql'];
            $_db = $aIni['db'];
            $_host = $aIni['host'];
            $_user = $aIni['user'];
            $_pwd = $aIni['password'];
            $_port = $aIni['port'];
            $dsn = "mysql:host={$_host};dbname={$_db};port={$_port}";
            try {
                $this->_pdo = new PDO($dsn, $_user, $_pwd);
                $this->_connect = true;
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }

        /**
     * 获取多条记录
     * @param string $table 表名 必填
     * @param string $desc 查询顺序 desc降序  asc升序 默认desc
     * @param int $limit 查询条数 默认1条
     * @return array
     */
    public function getList($table, $desc = 'desc', $limit = 1) {
        $sql = "select * from $table order by id $desc limit $limit";
        $ret = $this->_pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $ret;
    }

    public function close() {
        $this->_connect = false;
    }

}
