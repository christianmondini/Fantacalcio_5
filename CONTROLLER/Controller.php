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
        $sql="INSERT INTO giocatore(nome,email,`password`,crediti)
              VALUES ('$nome','$email','$password',500);";
        
        $response=$this->conn->query($sql);

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

    public function getID($email,$password){
        $sql="SELECT id
              FROM giocatore
               WHERE email='$email' AND `password`='$password';";

        $result=$this->conn->query($sql);
        
            return $result;
        
    }

    public function getLeghe($id_giocatore){
        $sql="SELECT l.nome,l.id
            FROM lega l
            INNER JOIN giocatore_lega gl ON gl.id_lega=l.id
            INNER JOIN giocatore g ON gl.id_giocatore=g.id
            WHERE g.id='$id_giocatore'";

        $result=$this->conn->query($sql);

        return $result;
    }

    public function Delete_lega($id_giocatore,$id_lega){
            $sql="DELETE *
                   FROM giocatore_lega gl 
                   INNER JOIN lega l ON l.id=gl.id_lega
                   INNER JOIN giocatore g ON g.id=gl.id_giocatore
                   WHERE g.id='$id_giocatore' AND l.id='$id_lega';";
            
            $this->conn->query($sql);

            unset($sql);

            $sql="DELETE * 
                  FROM lega l
                  WHERE l.id='$id_lega';";
                  
            $this->conn->query($sql);
    }

    

    function AssegnaCalciatore($id_calciatore,$id_giocatore){

        $query="INSERT INTO ";

    }



}

?>
