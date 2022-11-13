<?php 
        session_start(); 
        require_once('db.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>affiche client</title>
   
 <link rel="stylesheet" type="text/css" href="assetsA/css/Material+Icons.css" />
 
  <!-- Material Kit CSS -->
  
  

    <style>
      

    </style>
</head>


<body style=" background-color: black;">
      


<!--########################### AFFICHAGE DES PRODUITS #########################################-->

    
        <div class="">
         <div style="margin-bottom:8%;height: 100%;background-color:#6495ED;position: fixed; " >
           
            <div  class="panel-body">
                <form method="get" action="affichageClient.php" class="form-inline" >
                    <div class="input-group">
                        <input type="text" name="rechercheClient" placeholder="nom ou prenom " class="form-control">
                        <div class="input-group-btn form-inline">
                            <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>



                   <div style="float: left;position: fixed;"  >




        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="Profile.php"style="color:black">
              <p><i class="material-icons">dashboard</i>Profile</p>
              
            </a>
          </li> 
         <!-- <li class="nav-item ">
            <a class="nav-link" href="adduser.php">
              <i class="material-icons">person</i>
              <p>Add User</p>
            </a>
          </li>-->
      <li class="nav-item" >
            <a class="nav-link" href="affichageProduit.php" style="color:black">
             <p> <i class="material-icons">list</i>Liste des Produits</p>
            </a>
           </li>
          
          
          <li class="nav-item ">
            <a class="nav-link" href="produit.php"style="color:black">
              <p><i class="material-icons">add</i>Ajouter Produit</p>
             </a>
          </li>
         <li class="nav-item ">
            <a class="nav-link" href="client.php"style="color:black">
              <p><i class="material-icons">add</i>Ajouter Client</p>
             </a>
          </li>

          
            

          
          <li class="nav-item ">
            <a class="nav-link" href="index.php"style="color:black">
              <p><i class="material-icons">logout</i>se déconnecter</p>
            
            </a>
          </li>
          
        </ul>
      </div>
</div>
























 
                    <?php 
                         if(isset($_GET['rechercheClient'])){
                            $tape = $_GET['rechercheClient'];
                         }else{
                                $tape="";
                             }
                    
               
                    
                    
                    $limite=isset($_GET['limite'])?$_GET['limite']:10;
                    $page=isset($_GET['page'])?$_GET['page']:1;
                    $defaut = ($page - 1)*$limite;
                    
                    /* Requête pour afficher tous les clients y compris les critères de recherche*/
                     $sql="select * from client where prenom like '%$tape%' or prenom like '%$tape%' limit $limite offset $defaut";
                    /*  Requête pour compter le nombre des clients enregistré */
                    $sqlCompteur="select count(*) compteur from client where prenom like '%$tape%'";
                    
                    $resultatCompteur = mysqli_query($connexion,$sqlCompteur);
                    $tableauCompteur = mysqli_fetch_assoc($resultatCompteur);
                    
                    $nombre=$tableauCompteur['compteur'];
                    
                   
                    
                    $reste = $nombre % $limite; /*reste de la division euclidienne du $nombre par $limite*/
                    
                    if($reste === 0){  
                        $pageNombre = $nombre/$limite;
                    }else{
                        $pageNombre = floor($nombre/$limite)+1; /*Floor est une methode permettant de retourner
                                                                        la partie entière
                                                                        +1 pour la page suivante'*/
                    }
                    
                
                    
                    ?>
                    
                </form>

            </div>
        </div>
        </div>
        



















        <div  style="float:right;margin-right:70px;margin-top: 10%;" class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center class="farid">Liste des Clients  [<b><?php echo $tableauCompteur['compteur'] ?></b> Clients]</center>
            </div>

            <div class="panel-body" style="background-color: #6495ED">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <!--<th>
                                <center>ID</center>
                            </th>-->
                            <th>
                                <center>NOM/PRENOM</center>
                            </th>
                            <th>
                                <center>CIN</center>
                            </th>
                              <th>
                                <center>EMAIL</center>
                            </th>
                            <th>
                                <center>DATE</center>
                            </th>
                            <th>
                                <center>ACTIONS</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php   
                                $resultat1=mysqli_query($connexion,$sql);
                                while($ligne=mysqli_fetch_assoc($resultat1)){  ?>
                        <!--**************-->
                        <tr>
                            <!--<td>
                                <center>
                                    <?php /*echo $ligne['idclient']*/?>
                                </center>
                            </td>-->
                            <td>
                                <center>
                                    <?php echo strtoupper($ligne['prenom'])?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $ligne['cin']?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $ligne['email']?>
                                </center>
                            </td>
                             <td>
                                <center>
                                    <?php echo $ligne['create_datetime']?>
                                </center>
                            </td>
                            <td>

                                <center >
                                    <a href="modifierClient.php?idclient=<?php echo $ligne['idclient']?>">
                                       
                                        <span style="color: green;background-color: green" class="glyphicon glyphicon-pencil"> </span>
                                    </a> &nbsp; &nbsp;
                                    <a onclick="return confirm('vous êtes sûr ?')" href="supprimerClient.php?id=<?php echo $ligne['idclient']?>">
                                       
                                        <span style="color: red;background-color: red" class="glyphicon glyphicon-trash" > </span>
                                    </a>
                                </center>

                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div>
                   <!--########### PAGINATION ###########-->
                    <ul class="pagination">
                        <?php
                        if($page == 1){
                            echo '<li class="page-item disabled"><a class="page-link" href="">Précèdent</a></li>';
                        }
                        if($page>1){
                            echo '<li class="page-item"><a class="page-link" href="affichageClient.php?page=<?php echo $page ?>">Précèdent</a>
                            </li>'; } for($i=1;$i<=$pageNombre;$i++){ ?>

                                <li class="page-item <?php if($page==$i) echo " active " ?>">
                                    <a class="page-link" href="affichageClient.php?page=<?php echo $i?>">
                                        <?php echo $i ?>
                                    </a>
                                </li>
                                <?php 
                                    } 
                                
                                if($page>=$pageNombre){
                                    echo '<li class="page-item disabled"><a class="page-link" href="">Suivant</a></li>';
                                   
                                }else{
                                    echo '<li class="page-item"><a class="page-link" href="affichageClient.php?page=<?php echo $page ?>">Suivant</a>
                                </li>'; } /*if($page<$pageNombre)*/ ?>
                                    <!--href="pagination.php?page=<?page/* echo '$page'*/ ?>"-->


                    </ul>
                </div>
                
            </div>
        </div>
    </div>
<?php
include('menu.php');
?>


</body>

</html>
