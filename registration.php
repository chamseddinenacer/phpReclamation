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
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>





<?php
    require('db.php');
    
    if (isset($_REQUEST['prenom'])) {
       
        $prenom = stripslashes($_REQUEST['prenom']);
        $prenom = mysqli_real_escape_string($connexion, $prenom);

      

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($connexion, $email);

         $cin    = stripslashes($_REQUEST['cin']);
        $cin    = mysqli_real_escape_string($connexion, $cin);

        $passe = stripslashes($_REQUEST['passe']);
        $passe = mysqli_real_escape_string($connexion, $passe);

        

        $create_datetime = date("Y-m-d H:i:s");  

        $query    = "INSERT into `client` (prenom,cin,email,passe,create_datetime)
                     VALUES ('$prenom','$cin','$email','" . md5($passe) . "','$create_datetime')";
        $result   = mysqli_query($connexion, $query);


       



        if ($result) {
            echo "<div class='form'style='height:50%;background-color:white'>
                  <h3>Reçu,Merci pour votre inscription! </h3><br/>
                 <a href='login.php'> <input type='submit' value='Login'  class='btn btn-primary btn-user btn-block' /></a>
                  </div>";
} else {
            echo "<div class='form'style='height:50%;background-color:white'>
                  <h3>Probleme</h3><br/>
                   <a href='registration.php'> <input type='submit' value='Login'  class='btn btn-primary btn-user btn-block' /></a>
                  </div>";
        }
    } else {
?>


 

                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="prenom">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name"name="cin">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address"name="email">
                                    </div>
                                    <div class="col-sm-6">
                                       <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="passe">
                                    </div>
                                </div>

 
                              
                                 <input type="submit" value="Register" name="submit"   class="btn btn-primary btn-user btn-block" />
                        
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                                  <hr>
                            <div class="text-center">
                                <a class="small">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                            </form>
                                                        <?php
    }
?>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>