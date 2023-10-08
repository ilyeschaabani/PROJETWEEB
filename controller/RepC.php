<?php

include '../config1.php';
include '../Model/Response.php'; // Rename the file to "Response.php" to avoid naming conflict

class RepC {
    public function listRep() {
        $db = config::getConnexion();
        try{
          
           $liste =$db->query('SELECT * FROM reponse');//query fusion de prepare,execute et fetch all
           return $liste;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    /*ajout*/
   public function addRep($reponsee) { // Rename the parameter to match the class name
         $db = config::getConnexion();
         try {
            $req = $db->prepare('INSERT INTO reponse VALUES ( NULL, :c, :d)');
            $req->execute([
               
                'c' => $reponsee->getcontenu_rep(),
                'd' => $reponsee->getdate_rep(),
               
                
               
            ]);

         } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
         }
    }
    /*supp*/
    public function DeleteRep($id) {
        $db = config::getConnexion();
        try {
           $query = $db->prepare('DELETE FROM reponse where id = :id');
           $query->execute([ 'id' => $id]);

        } catch(Exception $e) {
           die('Error: ' . $e->getMessage());
    }  
}
/*modifier*/
public function getRep($id) {
    $db = config::getConnexion();
    try {
        $req =$db->prepare('SELECT * FROM reponse WHERE id=:id');
        $req->execute([
            'id' => $id
        ]);
        $result = $req->fetch();
        return $result;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

public function Update($id, $reponsee) { // Rename the parameter to match the class name
    $db = config::getConnexion();
    try {
        $query = $db->prepare('UPDATE reponse SET  contenu_rep=:c, date_rep=:d WHERE id=:id');
        $query->execute([
            'id' => $id,
            'c' => $reponsee->getcontenu_rep(),
            'd' => $reponsee->getdate_rep()
        ]);
    } catch(Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

}

?>
