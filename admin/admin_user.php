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

                    $sql = "SELECT * FROM adatok ";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){
                        $id = $row["id"];
                        $user = $row["user"];
                        $becenev = $row["becenev"];
                        $email = $row["email"];

                            echo "
                            <div id='adatok' class='col-3 d-inline-block m-3 p-2'>
                                <p class='pt-3'>Felhasználónév: ".$user."</p>
                                <p>Becenév: ".$becenev."</p>
                                <p>E-mail: ".$email."</p>
                                <div  class='kategoriak btn btn-primary pt-2 pb-2 mt-2 mb-2'>
                                    <a href='admin_userM.php?id=".$id."'>Módosít</a>
                                </div>
                            </div>
                                ";

                                }
                                ?>
                </div>
        </div>
    </div>

</body>
</html>