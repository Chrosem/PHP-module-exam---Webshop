<?php

    require "../connection.php";

?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Bookstore"/>
<meta name="keywords" content="Modulzáró PHP, Webshop, Könyv">
<meta name="author" content="Gazdag Gergő">

<link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<link rel="stylesheet" href="../css/style.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>  
<script src="main.js"></script>
<title>PHP Webshop Admin</title>
</head>
<body>
<nav class="navbar">
<div class="logo">
    <img src="settings.png" alt="" margin="auto">
    <h1>Admin</h1>
</div>
<form id="menusor" class="form-inline">
<a class="nav-item nav-link text-light rounded-left" href="admin_termek.php">Termékfeltöltés</a>
    <a class="nav-item nav-link text-light" href="admin_user.php">Felhasználó adatmódosítás</a>
    <a class="nav-item nav-link text-light rounded-right" href="admin_log.php">Kijelentkezés</a>
</form>
</nav>

    <div class="container">
        <div class="row justify-content-center" id="color1">
            <div class="col-12 text-white">
                <?php

                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                        if(isset($_GET["id"])){

                            $id = $_GET["id"];

                            $sql = "SELECT * FROM adatok WHERE id='$id'";


                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $user = $row["user"];
                        $becenev = $row["becenev"];
                        $email = $row["email"];

                            echo "
                            <div id='adatok' class='col-3 d-inline-block m-3 p-2'>
                                <p class='pt-3'>Felhasználónév: ".$user."</p>
                                <p>Becenév: ".$becenev."</p>
                                <p>E-mail: ".$email."</p>
                            </div>
                                ";

                                }
                            }
                ?>

                        <div id="profil" class="col-3 d-inline-block mt-3 mb-3 text-white">

                        <form action="" method="post"  class="form-group  text-center p-2">

                        <div class="form-group ">
                            <label for=""><b>Becenév</b></label>
                            <input type="text" name="becenev" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label for=""><b>E-mail cím</b></label>
                            <input type="email" name="email"  class="form-control ">
                        </div>

                        <div class="form-group col-12 mb-3 mt-3">
                            <label for=""><b>Jelszó</b></label>
                            <input type="password" name="pwd"  class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="save" class="btn btn-primary mt-3">Mentés</button>
                        </div>
                        </form>
                        </div>

                        <?php

                                $succes = "";
                                $error="";

                                if(isset($_POST["save"])){

                                    $becenev = $_POST["becenev"];
                                    $email = $_POST["email"];
                                    $pwd = $_POST["pwd"];

                                    /* Minden mező kitöltése */
                                    if(empty($becenev)  || empty($email) || empty($pwd) ){

                                         $error="Minden mező kitöltése kötelező!";

                                    }

                                    else if (strlen($pwd) < 6){

                                         $error = "A jelszó hossza min. 6 karakter legyen!";
                                    }

                                    else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@@#$%^&*.]{6,20}$/', $pwd)) {
                                        $error="Jelszó nem felel meg az adott követelményeknek!";

                                    }

                                    else{

                                    $con = mysqli_connect(host,user,pwd,dbname);
                                    mysqli_query($con, "SET NAMES utf8");

                                    $sql = "UPDATE adatok SET becenev='$becenev', email='$email', pwd=sha1('$pwd') WHERE user LIKE '$user' ";

                                    mysqli_query($con, $sql);

                                    $success = "Sikeres adatmódosítás!";
                                    echo "<meta http-equiv='refresh' content='2'>";

                                    }
                                }

                        ?>

                            <span class="text-danger d-block"><?php if(!empty($error)){ echo $error;} ?></span>
                            <span class="text-success d-block"><?php if(!empty($success)){ echo $success;} ?></span>

            </div>
        </div>
    </div>

</body>
</html>