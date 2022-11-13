
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="st/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="st/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block  ">
                    <img src="imgg/regi.jpg" width="110%" height="100%"> </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>





<?php

  
 

    require('db.php');
    session_start();
   
    if (isset($_POST['submit'])) {

         

        // $prenom = stripslashes($_REQUEST['prenom']);    
        // $prenom = mysqli_real_escape_string($connexion, $prenom);
        $cin = stripslashes($_REQUEST['cin']);    
        $cin = mysqli_real_escape_string($connexion, $cin);
        $passe = stripslashes($_REQUEST['passe']);
        $passe = mysqli_real_escape_string($connexion, $passe);
        $type  = stripslashes($_REQUEST['type']); 
        $type = mysqli_real_escape_string($connexion, $type);
   
        $query    = "SELECT * FROM `client` WHERE cin='$cin'
                     AND passe='" . md5($passe) . "'";
        $result = mysqli_query($connexion, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

    
    
        if ($rows == 1 ) {
          if ($type=='client') {
           
          
                $_SESSION['cin'] = $cin;
                 
                 
                header("Location:rec.php");
            }

       else{
                $_SESSION['cin'] = $cin;
           
            header("Location: admin.php");
            }}
         else {
            echo "<div class='form' style='height:50%;background-color:white'>
                  <h3>le Prenom ou mot de passe que vous avez saisir ne correspondent pas!!</h3><br/>
                  <a href='login.php'> <input type='submit' value='Login'  class='btn btn-primary btn-user btn-block' /></a>
                  </div>";
        }
    } 
    else{
?>
      <form class="user" method="post">
                                   <div class="form-group" >
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Cin"name="cin">
                                    </div>
                                   <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Password"name="passe">
                                    </div>

                                    
        
      
         <select name="type" class="btn btn-primary ">
        <option value="client">client</option>
        <option value="admin">Admin</option>
      </select>
   <br>
    <br>

                                    <input type="submit" value="Login" name="submit"   class="btn btn-primary btn-user btn-block" />
                                      <hr>
                            <div class="text-center">
                                <a class="small">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="registration.php">You do not have an account ? <B>Register</B></a>
                            </div>


  
<?php
    }
?>

 

       </body>
       </html>




















































