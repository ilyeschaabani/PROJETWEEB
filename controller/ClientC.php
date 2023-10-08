<?php

include '../model/Client.php';

class ClientC {
    public function listClient() {
        $db = config::getConnexion();
        try{
            $liste = $db->query('SELECT * FROM avis');
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addClient($client) {
        $db = config::getConnexion();
        try {
            $req = $db->prepare('INSERT INTO avis (contenu, id_user) VALUES (:c, :i)');
            $req->execute([
                'c' => $client->getcontenu(),
                'i' => $client->getiduser()
            ]);
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function deleteClient($id) {
        $db = config::getConnexion();
        try {
            $query = $db->prepare('DELETE FROM avis WHERE id = :id');
            $query->execute(['id' => $id]);
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }  
    }

    public function getClient($id) {
        $db = config::getConnexion();
        try {
            $req = $db->prepare('SELECT * FROM avis WHERE id = :id');
            $req->execute(['id' => $id]);
            $result = $req->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateClient($id, $client) {
        $db = config::getConnexion();
        try {
            $query = $db->prepare('UPDATE avis SET contenu = :c, id_user = :i WHERE id = :id');
            $query->execute([
                'id' => $id,
                'c' => $client->getcontenu(),
                'i' => $client->getiduser(),
            ]);
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function Join($id) {
        $db = config::getconnexion();
        try {
            $query = $db->prepare('SELECT * FROM avis 
                INNER JOIN reponse
                ON avis.`id` = reponse.`id`
                WHERE reponse.`id` = :id AND avis.`id` = :id');
            $query->execute([':id' => $id, ':id' => $id]);
    
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    }

