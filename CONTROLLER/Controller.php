<?php 

include ("../COMMON/connect.php");

define(
    'JSON_OK',
    array(
        'Content-Type: application/json',
        'HTTP/1.1 200 OK'
    )
);



Class Controller{

    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function NewGiocatore($nome,$email,$password){
        $sql="INSERT INTO giocatore
              VALUES ('','$nome','$email','$password',500);";
        
        $response=$this->conn->query($sql);
        return $response;
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
