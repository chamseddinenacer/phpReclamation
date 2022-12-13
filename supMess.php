<?php 

    require_once('db.php');
    
    $id = isset($_GET['id'])?$_GET['id']:0;

    $reqSql = "delete from mess where id = $id";
    
    $resultat = mysqli_query($connexion,$reqSql);


    if($resultat){
        header('location:mssg.php');
    }
    else{
            echo "<script> alert('Echec de suppression !')</script>";
            header('location:mssg.php');
    }
    
?>