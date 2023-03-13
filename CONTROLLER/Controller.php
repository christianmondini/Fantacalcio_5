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

    public function Get_ID_Lega($nome_lega){
            $sql="SELECT id
                  FROM lega
                  WHERE nome='$nome_lega';";

            $result=$this->conn->query($sql);

            $id_lega=$result->fetch_assoc();

            return $id_lega["id"];
    }

    public function Delete_lega($id_giocatore,$id_lega){

            $sql="DELETE 
                   FROM giocatore_lega  
                   WHERE id_giocatore='$id_giocatore' AND id_lega='$id_lega';";
            
                  
            $result=$this->conn->query($sql);

            return $result;
    }

    public function Add_lega($id_giocatore,$nome_lega){

        $sql="INSERT INTO lega(nome)
              VALUES('$nome_lega');";
        
        $this->conn->query($sql);

        unset($sql);

        $id_lega=$this->Get_ID_Lega($nome_lega);
        echo($id_lega);

        $sql="INSERT INTO giocatore_lega(id_giocatore,id_lega)
              VALUES ('$id_giocatore','$id_lega');";

        $this->conn->query($sql);
    }

    public function Entry_Lega($id_giocatore,$nome_lega){

        $id_lega=$this->Get_ID_Lega($nome_lega);

        $sql="INSERT INTO giocatore_lega(id_giocatore,id_lega)
              VALUES ('$id_giocatore','$id_lega');";

        $this->conn->query($sql);
    }

    

    function AssegnaCalciatore($id_calciatore,$id_giocatore){

        $query="INSERT INTO ";

    }



}

?>
