<?php
$page_titre = "Connection";
include './includes/header.php';
?>
<?php
require_once '../Controller/blogc.php';
$blog=new blogc();  
$liste=$blog->listblog() ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>THNEYTI Admin Panel</title>
</head>

<body>
   
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>idblog</th>
                            <th>blogcentent</th>
                            <th>titre</th>
                            <th>typeblog </th>
                            <th>username </th>
                            <th>dateblog</th>
                        </tr>
                        <?php
            foreach ($liste as  $blog){
        ?>
        <tr>
                <td><?php echo $paiement['idblog'];?></td>
                <td><?php echo $paiement['blogcentent'];?></td>
                <td><?php echo $paiement['titre'];?></td>
                <td><?php echo $paiement['typeblog'];?></td>
                <td><?php echo $paiement['username'];?></td>
                <td><?php echo $paiement['dateblog'];?></td>
                
            
                
                <td><a href="updatepaiement.php?cin=<?php echo $paiement['cin']; ?>" class="btn">modifier</a></td>
                <td><a href="deletepaiement.php?cin=<?php echo $paiement['cin']; ?>" class="btn">Supprimer</a></td>
                
                <td>
                    
    
                    
            </form>
            </td>

            
            

            </tr>
            <?php
            }
        ?>
        
                </div>
            </div>
        </div>
    </div>
</body>

</html>