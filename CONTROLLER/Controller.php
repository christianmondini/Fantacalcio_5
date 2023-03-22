<?php

define(
    'JSON_OK',
    array(
        'Content-Type: application/json',
        'HTTP/1.1 200 OK'
    )
);



class Controller
{

    public $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    /*-------------------------------------------OPZIONI GIOCATORE-------------------------------------------------------------------------------------------------*/

    public function NewGiocatore($nome, $email, $password)
    {
        $sql = "INSERT INTO giocatore(nome,email,`password`,crediti)
              VALUES ('$nome','$email','$password',500);";

        $response = $this->conn->query($sql);

        return $response;
    }


    public function Get_giocatore($id)
    {
        $sql = "SELECT nome,email
             FROM giocatore
             WHERE id='$id';";

        $result = $this->conn->query($sql);
        return $result;
    }

    public function Get_ID_ByName($nome_giocatore)
    {
        $sql = "SELECT id
              FROM giocatore
              WHERE nome='$nome_giocatore';";

        $response = $this->conn->query($sql);

        $id = $response->fetch_assoc();

        return $id["id"];
    }


    public function getID($email, $password)
    {
        $sql = "SELECT id
              FROM giocatore
               WHERE email='$email' AND `password`='$password';";

        $result = $this->conn->query($sql);

        return $result;
    }





    public function Get_Creatore($id_giocatore, $id_lega)
    {
        $sql = "SELECT g.nome,gl.creatore
              FROM giocatore g
              INNER JOIN giocatore_lega gl ON g.id=gl.id_giocatore
              WHERE gl.id_giocatore='$id_giocatore' AND gl.id_lega='$id_lega';";

        $response = $this->conn->query($sql);

        return $response;
    }

    /*-------------------------------------------OPZIONI LEGA-------------------------------------------------------------------------------------------------*/


    public function Get_Nome_Lega($id_lega)
    {
        $sql = "SELECT nome
              FROM lega 
              WHERE id='$id_lega';";
        $response = $this->conn->query($sql);

        return $response;
    }

    public function getLeghe($id_giocatore)
    {
        $sql = "SELECT l.nome,l.id
            FROM lega l
            INNER JOIN giocatore_lega gl ON gl.id_lega=l.id
            INNER JOIN giocatore g ON gl.id_giocatore=g.id
            WHERE g.id='$id_giocatore'";

        $result = $this->conn->query($sql);

        return $result;
    }

    public function Get_ID_Lega($nome_lega)
    {
        $sql = "SELECT id
              FROM lega
              WHERE nome='$nome_lega';";

        $result = $this->conn->query($sql);

        $id_lega = $result->fetch_assoc();

        return $id_lega["id"];
    }

    public function Exit_lega($id_giocatore, $id_lega)
    {

        $sql = "DELETE 
               FROM giocatore_lega  
               WHERE id_giocatore='$id_giocatore' AND id_lega='$id_lega';";


        $result = $this->conn->query($sql);

        return $result;
    }

    public function Add_lega($id_giocatore, $nome_lega)
    {

        $sql = "INSERT INTO lega(nome,campionato_iniziato) 
           VALUES ('$nome_lega',0);";

        $this->conn->query($sql);

        unset($sql);

        $id_lega = $this->Get_ID_Lega($nome_lega);
        echo ($id_lega);

        $sql = "INSERT INTO giocatore_lega(id_giocatore,id_lega,creatore)
          VALUES ('$id_giocatore','$id_lega','1');";

        $this->conn->query($sql);
    }

    public function Entry_Lega($id_giocatore, $nome_lega)
    {

        $id_lega = $this->Get_ID_Lega($nome_lega);

        $sql = "INSERT INTO giocatore_lega(id_giocatore,id_lega,punti)
          VALUES ('$id_giocatore','$id_lega',0);";

        $this->conn->query($sql);
    }


    public function Delete_Lega($id_lega)
    {
        $sql = "DELETE 
          FROM giocatore_lega
          WHERE l.id='$id_lega';";

        $this->conn->query($sql);

        unset($sql);

        $sql = "DELETE 
          FROM lega
          WHERE l.id='$id_lega';";

        $this->conn->query($sql);
    }


    /*-------------------------------------------OPZIONI CALCIATORE-------------------------------------------------------------------------------------------------*/

    public function Get_Calciatori()
    {
        $sql = "SELECT c.nome as nome,ruolo as ruolo , s.nome as squadra,valore_iniziale as valore
              FROM  calciatore c
              LEFT JOIN squadra s ON s.id=c.id_squadra;";

        $result = $this->conn->query($sql);

        return $result;
    }

    public function Get_Calciatori_Altrui($id_giocatore, $id_lega)
    {
        $sql = "SELECT c.nome as nome,ruolo as ruolo , s.nome as squadra,valore_iniziale as valore
              FROM  calciatore c
              LEFT JOIN squadra s ON s.id=c.id_squadra
              LEFT JOIN giocatore_calciatore gc ON c.id=gc.id_calciatore
              WHERE gc.id_giocatore!='$id_giocatore' AND gc.id_lega='$id_lega';";

        $result = $this->conn->query($sql);

        return $result;
    }


    public function Get_Calciatori_Utente($id_giocatore, $id_lega)
    {

        $sql = "SELECT c.nome as nome,c.ruolo as ruolo ,s.nome as squadra,c.valore_iniziale as valore
              FROM calciatore c 
              LEFT JOIN squadra s ON s.id=c.id_squadra
              INNER JOIN giocatore_calciatore gc ON gc.id_calciatore=c.id
              LEFT JOIN giocatore g ON g.id=gc.id_giocatore 
              WHERE g.id='$id_giocatore' AND gc.id_lega='$id_lega';";

        $response = $this->conn->query($sql);

        return $response;
    }





    function AssegnaCalciatore($nome_giocatore, $nome_calciatore, $id_lega)
    {

        $id_giocatore = $this->Get_ID_ByName($nome_giocatore);

        $id_calciatore = $this->Get_ID_ByName_Calciatore($nome_calciatore);

        $sql = "INSERT INTO giocatore_calciatore(id_giocatore,id_calciatore,id_lega)
                VALUES('$id_giocatore','$id_calciatore','$id_lega');";

        $this->conn->query($sql);
    }

    public function TogliCalciatore($nome_giocatore, $nome_calciatore, $id_lega)
    {

        $id_giocatore = $this->Get_ID_ByName($nome_giocatore);

        $id_calciatore = $this->Get_ID_ByName_Calciatore($nome_calciatore);

        $sql = "DELETE 
              FROM giocatore_calciatore
              WHERE id_giocatore='$id_giocatore' AND id_calciatore='$id_calciatore' AND id_lega='$id_lega';";

        $this->conn->query($sql);
    }

    public function Get_ID_ByName_Calciatore($nome_calciatore)
    {
        $sql = "SELECT id
              FROM calciatore
              WHERE nome='$nome_calciatore';";

        $response = $this->conn->query($sql);

        $id = $response->fetch_assoc();

        return $id["id"];
    }

    /*-------------------------------------------------------------OPZIONI GIORNATA-------------------------------------------------------------------------------------------*/


    public function Get_Inizio_Campionato($id_lega)
    {

        $sql = "SELECT campionato_iniziato
          FROM lega 
          WHERE id='$id_lega';";

        $response = $this->conn->query($sql);

        return $response;
    }


    public function Inizia_Campionato($id_lega)
    {

        $sql = "UPDATE lega
          SET campionato_iniziato=1
          WHERE id='$id_lega';";

        $this->conn->query($sql);

        $this->Prepara_Giornate($id_lega);


        unset($sql);
        $response = $this->Get_Inizio_Campionato($id_lega);

        return $response;
    }



    public function Get_Partecipanti($id_lega)
    {

        $sql = "SELECT DISTINCT g.id as id_giocatore,g.nome as nome_giocatore
          FROM giocatore g
          INNER JOIN giocatore_lega gl ON g.id=gl.id_giocatore
          LEFT JOIN lega l ON l.id=gl.id_lega
          WHERE l.id='$id_lega';";

        $response = $this->conn->query($sql);

        return $response;
    }


    //Preparo tutte le partite di andata e ritorno tra tutti i giocatori
    public function Prepara_Giornate($id_lega)
    {

        $n_giocatori = 0;

        $result = $this->Get_Partecipanti($id_lega);

        $giocatori = array();

        while ($row = $result->fetch_assoc()) {
            array_push($giocatori, $row);
            $n_giocatori++;
        }



        //conti le partite in casa per ogni giocatore e sicuramente nelle partite in casa di un giocatore sono incluse quelle fuori casa degli altri
        //$n_partite=$n_giocatori*($n_giocatori-1);

        for ($i = 0; $i < ($n_giocatori); $i++) {

            for ($j = 0; $j < ($n_giocatori); $j++) {

                //Se non è lo stesso giocatore
                if ($i != $j) {

                    $giocatore1 = $giocatori[$i]["id_giocatore"];
                    $giocatore2 = $giocatori[$j]["id_giocatore"];


                    $sql = "INSERT INTO giornata(id_giocatore1,id_giocatore2,risultato,id_lega)
                      VALUES('$giocatore1','$giocatore2',0,'$id_lega');";

                    $this->conn->query($sql);

                    unset($sql);
                }
            }
        }
    }


    public function Prendi_Avversari($id_giocatore, $id_lega)
    {

        $sql = "SELECT gn.id as id,g.id as id_avversario,g.nome as nome_avversario
          FROM giocatore g
          INNER JOIN giornata gn ON gn.id_giocatore2=g.id
          WHERE gn.id_giocatore1='$id_giocatore' AND gn.id_lega='$id_lega' AND gn.risultato=0;";

        $response = $this->conn->query($sql);

        return $response;
    }

    public function Prendi_Risultati($id_giocatore, $id_lega)
    {

        $sql = "SELECT g.id as id,g.nome as nome_avversario,gn.risultato as risultato
          FROM giocatore g
          INNER JOIN giornata gn ON gn.id_giocatore2=g.id
          WHERE gn.id_giocatore1='$id_giocatore' AND gn.id_lega='$id_lega' AND gn.risultato!=0;";

        $response = $this->conn->query($sql);

        return $response;
    }


    public function Calcola_Giornata($id_giornata, $id_giocatore, $id_avversario, $id_lega)
    {
        $risultato = random_int(1, 3);

        $sql = "UPDATE giornata
          SET risultato='$risultato'
          WHERE id='$id_giornata';";

        $this->conn->query($sql);

        $this->Set_punti($id_giocatore, $id_avversario, $id_lega, $risultato);

        return $risultato;
    }


    public function Set_punti($id_giocatore, $id_avversario, $id_lega, $risultato)
    {
        if ($risultato == 3) {
            $sql = "UPDATE giocatore_lega 
                SET punti=punti+3;
                    WHERE id_giocatore='$id_giocatore' AND id_lega='$id_lega'";

            $this->conn->query($sql);
        } else if ($risultato == 2) {

            $sql = "UPDATE giocatore_lega 
            SET punti=punti+1
                    WHERE id_giocatore='$id_giocatore' AND id_lega='$id_lega'
                    ;";

            $this->conn->query($sql);

            unset($sql);

            $sql = "UPDATE giocatore_lega 
            SET punti=punti+1
                    WHERE id_giocatore='$id_avversario' AND id_lega='$id_lega'
                    ;";

            $this->conn->query($sql);
        } else {

            $sql = "UPDATE giocatore_lega 
            SET punti=punti+3
            WHERE id_giocatore='$id_avversario' AND id_lega='$id_lega'
            ;";

            $this->conn->query($sql);
        }
    }

    public function Prendi_Classifica($id_lega)
    {
        $sql = "SELECT g.nome as giocatore, gl.punti as punti
          FROM lega l 
          INNER JOIN giocatore_lega gl ON gl.id_lega=l.id
          LEFT JOIN giocatore g ON g.id=gl.id_giocatore
          WHERE l.id='$id_lega'
          ORDER BY gl.punti ASC;";

        $result = $this->conn->query($sql);

        return $result;
    }

    public function ControllaFineCampionato($id_lega)
    {
        $sql = "SELECT id
          FROM giornata 
          WHERE id_lega='$id_lega' AND risultato=0;";

        $result = $this->conn->query($sql);

        return $result;
    }
}
