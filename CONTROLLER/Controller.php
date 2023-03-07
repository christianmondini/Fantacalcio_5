<?php 

define(
    'JSON_OK',
    array(
        'Content-Type: application/json',
        'HTTP/1.1 200 OK'
    )
);



Class Controller{

    public $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function ShowData($data){

        $result=array();

        while($row=$data->fetch_assoc()){
            array_push($result,$row);
        }

        print_r($result);

    }

    public function ReturnData($data){

        $result=array();

        while($row=$data->fetch_assoc()){
            array_push($result,$row);
        }

        return $result;

    }


    public function NewGiocatore($nome,$email,$password){
        $sql="INSERT INTO giocatore
              VALUES ('','$nome','$email','$password',500);";
        
        $response=$this->conn->query($sql);
            /*if(!$response){

                print_r("Errore");
            }*/

        return $response;
    }


    public function Get_giocatore($id){
        $sql="SELECT nome,email
             FROM giocatore
             WHERE id='$id';";

        $result=$this->conn->query($sql);
        return $result;
    }

    public function NewLega($nome_lega,$n_componenti){
        $sql="INSERT INTO lega 
            VALUES ('$nome_lega','$n_componenti');";

        $response=$this->conn->query($sql);

        return json_encode($response);

    }

    public function Get_calciatori(){
        $sql="SELECT nome,ruolo,valore_iniziale
              FROM  calciatore;";
        
        $result=$this->conn->query($sql);
        
        return $result;
    }

    

    function AssegnaCalciatore($id_calciatore,$id_giocatore){

        $query="INSERT INTO ";

    }
}

?>
