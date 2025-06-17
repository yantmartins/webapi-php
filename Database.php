<?php
    Class Database {

        private $conn;

        private $server = "10.28.1.115"; //  localhost

        private $db = "pessoas";

        private $user = "devweb"; // devweb   root

        private $pass = "suporte@22"; // "" 

        private $table;

        public function __construct($table = null){
            $this->table = $table;
            $this->conectar();        
        }

        public function conectar(){
            try {
                $this->conn = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db . ";", $this->user, $this->pass);

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $this->conn;

            } catch(PDOException $err){
                die("Connection Failed ".$err->getMessage());
            }
        }
        
        public function execute($query, $binds = []) {
            try {
                $stmt = $this->conn->prepare($query);
                $stmt->execute($binds);
                
                return $stmt;
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function select($fields = "*"){
            try {
                $query = "SELECT " . $fields . " FROM " . $this->table;

                return $this->execute($query);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function insert($values) {
            try {
                $fields = array_keys($values);
                $binds = array_fill(0, count($fields), "?");

                $query = "INSERT INTO " . $this->table . " (" . implode(",", $fields) . ") VALUES (" . implode(",", $binds) . ");";

                $res = $this->execute($query, array_values($values));

                return $res ? true : false;
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function update($where, $array) {
            try {
                $fields = array_keys($array);
                $binds = array_values($array);

                $query = "UPDATE " . $this->table . " SET " . implode("=?,", $fields) .  "=? WHERE " . $where;

                $res = $this->execute($query, $binds);

                return $res ? true : false;
            } catch (\Throwable $th) {
                //throw $th;
            }
    }

        public function delete($where){
            try {
                $query = "DELETE FROM " . $this->table . " WHERE " .$where;
                $del = $this->execute($query);
                $del = $del->rowCount();

                if ($del == 1) {
                    return true;
                } else {
                    return false;
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
    }
}

?>