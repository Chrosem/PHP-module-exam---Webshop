<?php

    require "../connection.php";

    $error = "";
    $success = "";

    if(isset($_POST["upload"])){

        $target = "../img/termekek/"; //célmappa eltárolása változóban
        $file_name = $_FILES["file"]["name"]; //file nevének eltárolása változóban
        $tmp_file = $_FILES["file"]["tmp_name"]; //ideiglenes file nevének eltárolása változóban
        $file_size = $_FILES["file"]["size"];

        //Ha a file kiterjesztése nem egyezik, azaz jpg,jpeg,gif vagy png akkor...
        if(!preg_match('/(jpg|png|jpeg|gif)$/i', $file_name)){

            $error = "A file kiterjesztése csak jpg,png,jpeg,gif lehet!";
        }
        else if($file_size > 2000000){

            $error = "A file mérete nem lehet nagyobb 2MB-nál!";
        }

        else{
            //Feltölthetjük az ideiglenes névvel ellátott filet az uploads mappába eredeti filenévvel

        $borito = $_FILES["file"]["name"];
        $szerzo = $_POST["szerzo"];
        $cim = $_POST["cim"];
        $kiado = $_POST["kiado"];
        $kiad_ev = $_POST["kiad_ev"];
        $ar = $_POST["ar"];
        $keszlet = $_POST["keszlet"];
        $leiras = $_POST["leiras"];
        $egyeb = $_POST["egyeb"];
        $kategoria = $_POST["kategoria"];
        $kedvezmeny = $_POST["kedvezmeny"];

            if(isset($_POST["upload"]) && (isset($_POST["akcio"]) == 1)){

                $akcio = 1;
            }

            if(empty($borito) || empty($szerzo) || empty($cim) || empty($cim) || empty($kiad_ev) || empty($ar) || empty($leiras) || empty($egyeb)){

                $error = "Minden mező kitöltése kötelező!";
            }

            else{

                $con = mysqli_connect(host,user,pwd,dbname);
                mysqli_query($con, "SET NAMES utf8");

                $sql = "INSERT INTO termekek(kategoria,akcio,kedvezmeny,szerzo,cim,kiado,kiad_ev,ar,leiras,egyeb,borito,keszlet)
                VALUES('$kategoria', $akcio,'$kedvezmeny','$szerzo', '$cim', '$kiado', '$kiad_ev', '$ar', '$leiras', '$egyeb', 'img/termekek/$borito', '$keszlet')";

                mysqli_query($con, $sql);

                move_uploaded_file($tmp_file, $target.$file_name);
                move_uploaded_file($_FILES["file"]["tmp_name"] , $target);

                $success = "Sikeres termékfeltöltés!";
            }
        }
    }

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
            <div class="col-6">
            <form enctype="multipart/form-data" action="" method="post" class="form-group text-center bg-light p-5">

                <span class="text-danger d-block mb-3">
                 <?php
                    if(!empty($error)){

                        echo $error ;
                    }
                 ?>
                 </span>
                <span class="text-success d-block mb-3">
                 <?php

                    if(!empty($success)){
                        echo $success;
                    }
                 ?>
                 </span>
                <h2 class="mb-5">Termékfeltöltés</h2>

                <label for="">Borító</label>
                <input type="file" name="file" class="form-control mb-3 ">

                <label for="">Szerző</label>
                <input type="text" name="szerzo" class="form-control mb-3">

                <label for="">Cím</label>
                <input type="text" name="cim" class="form-control mb-3">

                <label for="">Kiadó</label>
                <input type="text" name="kiado" class="form-control mb-3">

                <label for="">Kiadás Éve</label>
                <input type="text" name="kiad_ev" class="form-control mb-3">

                <label for="">Könyv ár</label>
                <input type="text" name="ar" class="form-control mb-3">

                <label for="">Ismertető</label>
                <textarea name="leiras" cols="50" rows="10" class="form-control mb-3"></textarea>

                <label for="">Egyéb adat</label>
                <textarea name="egyeb" cols="20" rows="10" class="form-control mb-3"></textarea>


                <label for="">Kategória</label>
                <select name="kategoria" class="form-control mb-3">
                    <option value="1">Életmód, Egészség</option>
                    <option value="2">Ezotéria</option>
                    <option value="3">Gasztronómia</option>
                    <option value="4">Gyermekkönyvek</option>
                    <option value="5">Kötelező olvasmányok</option>
                    <option value="6">Lexikon, Enciklopédia</option>
                    <option value="7">Pénz, gazdaság</option>
                    <option value="8">Szórakoztató irodalom</option>
                    <option value="9">Számítástechnika</option>
                </select>

                <label for="">Készlet</label>
                <input type="text" name="keszlet" class="form-control mb-3">

                <label for="">Akció</label>
                <input type="checkbox" name="akcio" class="mb-3">

                <br>

                <label for="">Akció mértéke %-ban</label>
                <input type="text" name="kedvezmeny" class="form-control mb-3">

                <button type="submit" name="upload" class="btn btn-primary form-control">Feltöltés</button>
            </form>

            </div>
        </div>
    </div>

</body>
</html>