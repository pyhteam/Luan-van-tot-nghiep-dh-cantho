<?php
    class DB extends PDO{
        public $con;
        protected $server_name = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "mvc_php_noithat";

        public function __construct(){
            try {
                $this->con = new PDO('mysql:host='.$this->server_name.';dbname='.$this->dbname, $this->username, $this->password);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $error_message = 'Không thể kết nối đến CSDL';
                echo $error_message;
                exit();
            }

        }
    }

?>