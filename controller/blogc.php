<?php
require_once '../config.php';
require_once '../Model/blog.php';
class blogc
{
    function listblog()
    {
        $sql = "SELECT * FROM blogs";
        try {
			$liste = $bdd->query($sql);
			return $liste;
		}catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
    }
    function deleteblog($id)
    {
        $sql = "DELETE FROM blogs WHERE id=:idblog";  
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idblog', $idblog);
        try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}

    }
    function addblog($blog)
	{
		$sql = "INSERT INTO blogs (idblog,blogcentent, titre, typeblog, username , dateblog) 
			VALUES (:idblog, :blogcentent, :titre, :typeblog, :username, :dateblog )";
		$db = config::getConnexion();
		try {
            $query = $db->prepare($sql);
			$query->execute([
				'idblog' => $blog->GetIdBlog(),
				'titre' => $blog->Gettitre(),
				'blogcentent' => $blog->Getblogcentent(),
				'username' => $blog-> Getusername(),
				'dateblog' => $blog->Getdate(),
                'typeblog' => $blog->Gettypeblog()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    
	}
    function recupererblog($id)
	{
		$sql = "SELECT * from blogs where idblog=$id";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$paiement = $query->fetch();
			return $paiement;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}


}

function updateblog($blog, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE blogs SET 
                   dateblog= :dateblog, 
                    blogcentent= :blogcentent, 
                    titre= :titre, 
                    typeblog= :typeblog, 
                    username = :username 
                WHERE id= :idblog'
        );
        $query->execute([
            'idblog' => $blog->GetIdBlog(),
            'titre' => $blog->Gettitre(),
            'blogcentent' => $blog->Getblogcentent(),
            'username' => $blog-> Getusername(),
            'dateblog' => $blog->Getdate(),
            'typeblog' => $blog->Gettypeblog()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    
    }


}

}
?>