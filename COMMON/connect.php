<?php
class Database
{

    public $conn;

    protected $server="localhost";

    protected $user="root";

    protected $password="";

    protected $db="fantacalcio";

    protected $port=3306;

    public function connect(){
        $this->conn=new mysqli($this->server,$this->user,$this->password,$this->db,$this->port);
        if ($this->conn->connect_errno) {
            printf("Connect failed: %s\n", $this->conn->connect_error);
            exit();
        }
        return $this->conn;
    }
  
}

?>