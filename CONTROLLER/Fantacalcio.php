<?php 

include ("../COMMON/connect.php");

define(
    'JSON_OK',
    array(
        'Content-Type: application/json',
        'HTTP/1.1 200 OK'
    )
);

/*
$this->SetHeaders($headers);

        $arr = array();
        while ($row = $data->fetch_assoc()) {
            array_push($arr, $row);
        }
        print_r(json_encode($arr, JSON_PRETTY_PRINT));
        exit;
*/ 

/*

            $this->conn->real_escape_string($id)
*/ 


Class Fantacalcio{

    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function NewGiocatore($nome_giocatore){
        $sql="INSERT INTO giocatore
              VALUES ('$nome_giocatore',500);";
        
        $response=$this->conn->query($sql);
        return json_encode($response);
    }

    function NewLega($nome_lega,$n_componenti){
        $sql="INSERT INTO lega 
            VALUES ('$nome_lega','$n_componenti');";

        $response=$this->conn->query($sql);

        return json_encode($response);

    }

    

    function AssegnaCalciatore($id_calciatore,$id_giocatore){

        $query="INSERT INTO ";

    }
}

?>
