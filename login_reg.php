<?php  require "connection.php";

session_start();
$_SESSION["logged"] = false;

$error = "";
$success = "";

if(isset($_POST["login"])){

    $user = $_POST["user"];
    $pwd = $_POST["pwd"];

            /* Ha valamelyik mező üres akkor hiba*/

            if(empty($user) && empty($pwd)){

                $error = "Minkét mező kitöltése kötelező!";

            }

            else if(empty($user)){

                $error = "Felhasználónév megadása kötelező!";

            }

            else if(empty($pwd)){

                $error = "Jelszó megadása kötelező!";

            }

    /* Ha minkét  mező ki van töltve akkor adatbázisból ellenörzi a felhasználónevet és jelszavat*/
            else{

                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                    $sql = "SELECT * FROM adatok WHERE user= '$user' AND pwd= sha1('$pwd')";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $becenev = $row["becenev"];

                    if(mysqli_num_rows($result) == 1){
                        $_SESSION["logged"] == true;
                        $_SESSION["user"] = $user;
                        $_SESSION["becenev"] = $becenev;
                        header("Location: index.php");
                        }
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
<link rel="stylesheet" href="css/style.css">

<title>Bejelentkezés</title>
</head>
<body>

    <div class="container">
        <div id="login" class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5 bg-light">
                <span class="text-danger d-block"><?php if(!empty($error)){ echo $error;} ?></span>
                <span class="text-success d-block"><?php if(!empty($success)){ echo $success;} ?></span>
                <button class="btn text-white mb-3" type="submit" name="back" >Vissza</button>

                <?php
                        if(isset($_POST["back"])){
                            session_destroy();
                            header("Location: index.php");
                        }

                ?>

                <h1>Kérjük, jelentkezzen be.</h1>

                <input type="text" name="user" placeholder="Felhasználónév..."class="form-control mb-4 mt-4">
                <input type="password" name="pwd" placeholder="Jelszó..." class="form-control mb-4 mt-4">

                <button type="submit" name="login" id="loginbtn" class="btn btn-success pt-2 pb-2 mt-2 mb-4">Bejelentkezés</button>
                <div class="loginreg_hr pt-2 pb-3">
                <p><a href="forgotpwd.php" target="_blank">Elfelejtett Jelszó</a></p>
                    <hr/>
                </div>
                <p>Nincs még fiókja? Regisztráljon!</p>
                <button type="submit" name="reg"  id="loginbtn" formaction="reg.php" formtarget="_blank"
                class="btn btn-primary pt-2 pb-2 mt-2 mb-2">Regisztráció</button>

            </form>

        </div>
    </div>

</body>
</html>