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

    public function Get_ID_ByName($nome_giocatore){
        $sql="SELECT id
              FROM giocatore
              WHERE nome='$nome_giocatore';";

        $response=$this->conn->query($sql);

        $id=$response->fetch_assoc();

        return $id["id"];
    }

    public function NewLega($nome_lega,$n_componenti){
        $sql="INSERT INTO lega 
            VALUES ('$nome_lega','$n_componenti');";

        $response=$this->conn->query($sql);

        return json_encode($response);

    }

    public function Get_Calciatori(){
        $sql="SELECT c.nome as nome,ruolo as ruolo , s.nome as squadra,valore_iniziale as valore
              FROM  calciatore c
              LEFT JOIN squadra s ON s.id=c.id_squadra;";
        
        $result=$this->conn->query($sql);
        
        return $result;
    }

    public function Get_Calciatori_Altrui($id_giocatore,$id_lega){
        $sql="SELECT c.nome as nome,ruolo as ruolo , s.nome as squadra,valore_iniziale as valore
              FROM  calciatore c
              LEFT JOIN squadra s ON s.id=c.id_squadra
              LEFT JOIN giocatore_calciatore gc ON c.id=gc.id_calciatore
              WHERE gc.id_giocatore!='$id_giocatore' AND gc.id_lega='$id_lega';";
        
        $result=$this->conn->query($sql);
        
        return $result;
    }


    public function Get_Calciatori_Utente($id_giocatore,$id_lega){

        $sql="SELECT c.nome as nome,c.ruolo as ruolo ,s.nome as squadra,c.valore_iniziale as valore
              FROM calciatore c 
              LEFT JOIN squadra s ON s.id=c.id_squadra
              INNER JOIN giocatore_calciatore gc ON gc.id_calciatore=c.id
              LEFT JOIN giocatore g ON g.id=gc.id_giocatore 
              WHERE g.id='$id_giocatore' AND gc.id_lega='$id_lega';";

        $response=$this->conn->query($sql);

        return $response;
    }

    public function getID($email,$password){
        $sql="SELECT id
              FROM giocatore
               WHERE email='$email' AND `password`='$password';";

        $result=$this->conn->query($sql);
        
            return $result;
        
    }

    public function Get_Nome_Lega($id_lega){
        $sql="SELECT nome
              FROM lega 
              WHERE id='$id_lega';";
        $response=$this->conn->query($sql);

        return $response;
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

        $sql="INSERT INTO giocatore_lega(id_giocatore,id_lega,creatore)
              VALUES ('$id_giocatore','$id_lega','1');";

        $this->conn->query($sql);
    }

    public function Entry_Lega($id_giocatore,$nome_lega){

        $id_lega=$this->Get_ID_Lega($nome_lega);

        $sql="INSERT INTO giocatore_lega(id_giocatore,id_lega)
              VALUES ('$id_giocatore','$id_lega');";

        $this->conn->query($sql);
    }


    public function Get_Creatore($id_giocatore,$id_lega){
        $sql="SELECT g.nome,gl.creatore
              FROM giocatore g
              INNER JOIN giocatore_lega gl ON g.id=gl.id_giocatore
              WHERE gl.id_giocatore='$id_giocatore' AND gl.id_lega='$id_lega';";
        
        $response=$this->conn->query($sql);

        return $response;

    }

    

    function AssegnaCalciatore($nome_giocatore,$nome_calciatore,$id_lega){

        $id_giocatore=$this->Get_ID_ByName($nome_giocatore);

        $id_calciatore=$this->Get_ID_ByName_Calciatore($nome_calciatore);

        $sql="INSERT INTO giocatore_calciatore(id_giocatore,id_calciatore,id_lega)
                VALUES('$id_giocatore','$id_calciatore','$id_lega');";

        $this->conn->query($sql);

    }

    public function TogliCalciatore($nome_giocatore,$nome_calciatore,$id_lega){

        $id_giocatore=$this->Get_ID_ByName($nome_giocatore);

        $id_calciatore=$this->Get_ID_ByName_Calciatore($nome_calciatore);

        $sql="DELETE 
              FROM giocatore_calciatore
              WHERE id_giocatore='$id_giocatore' AND id_calciatore='$id_calciatore' AND id_lega='$id_lega';";

        $this->conn->query($sql);
    }

    public function Get_ID_ByName_Calciatore($nome_calciatore){
        $sql="SELECT id
              FROM calciatore
              WHERE nome='$nome_calciatore';";

        $response=$this->conn->query($sql);

        $id=$response->fetch_assoc();

        return $id["id"];
    }



}

?>
