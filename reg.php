<?php  require "connection.php";

error_reporting(E_ALL ^ E_NOTICE); //kikapcsolja a hibákat

session_start();
$_SESSION["logged"] = false;


$error = "";
$success = "";


/* regisztráció */

if(isset($_POST["reg"])){

    $user = $_POST["user"];
    $pwd = $_POST["pwd"];
    $becenev = $_POST["becenev"];
    $email = $_POST["email"];

    /* Minden mező kitöltése */
    if(empty($user) || empty($pwd) || empty($becenev) || empty($email)){

        $error="Minden mező kitöltése kötelező!";

    }
    else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@@#$%^&*.]{6,20}$/', $pwd)) {
        $error="Jelszó nem felel meg az adott követelményeknek!";

    }

    else{

        $con = mysqli_connect(host,user,pwd,dbname);
        mysqli_query($con, "SET NAMES utf8");

        /*létező felhasználó név és email */

        $user_sql = "SELECT * FROM adatok WHERE user='$user'";

        $user_exsist = mysqli_query($con, $user_sql);

        $email_sql = "SELECT * FROM adatok WHERE email='$email'";

        $email_exsist = mysqli_query($con, $email_sql);

        if(mysqli_num_rows($user_exsist) >= 1){

            $error = "Létező felhasználónév!";

        }

        else if(mysqli_num_rows($email_exsist) >= 1){

            $error = "A megadott E-mail cím már használatban van!";

        }

        else{


        $sql = "INSERT INTO adatok(user,becenev,email,pwd) VALUES('$user', '$becenev', '$email', sha1('$pwd'))";

        mysqli_query($con, $sql);

        $success = "Sikeres regisztráció!";
        header("Refresh:2; url=login_reg.php");
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div id="login" class="row justify-content-center pt-5">
        <form action="" method="post"  class="form-group  text-center p-2 bg-light">
            <span class="text-danger d-block"><?php if(!empty($error)){ echo $error;} ?></span>
            <span class="text-success d-block"><?php if(!empty($success)){ echo $success;} ?></span>

              <h3>Regisztráció</h3>

                <div class="form-group col-12 mb-3 mt-3">
                    <label for=""><b>Felhasználónév</b></label>
                    <input type="text" name="user" class="form-control">
                </div>

                <div class="form-group col-12 mb-3 mt-3">
                    <label for=""><b>Hogyan szólíthatunk?</b></label>
                    <input type="text" name="becenev"  class="form-control">
                </div>

                <div class="form-group col-12 mb-3 mt-3">
                    <label for=""><b>E-mail cím</b></label>
                    <input type="email" name="email"  class="form-control ">
                </div>

                <div class="form-group has-feedback col-12 mb-3 mt-3">
                    <label for=""><b>Jelszó</b></label>
                    <input class="form-control" name="pwd"  type="password" id="NewPassword">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group col-12 mb-3 mt-3 text-left">
                <p>A jelszó kritériumai:</p>
                    <ul>
                        <li id="Length" class="remove">Legalább 6 karakter hosszú</li>
                        <li id="UpperCase" class="remove">Legalább 1 nagybetűt tartalmaz</li>
                        <li id="LowerCase" class="remove">Legalább 1 kisbetűt tartalmaz</li>
                        <li id="Numbers" class="remove">Legalább 1 számot tartalmaz (0-9)</li>
                        <li id="Symbols" class="remove">Legalább 1 speciális karakter (! @ $ ...stb)</li>
                    </ul>

                </div>

                <div class="form-group">
                    <button type="submit" name="reg"  class=" btn btn-primary mt-3">Regisztráció</button>
                </div>

        </form>
    </div>
</div>
<script>

    function ValidatePassword() {

    var rules = [{
        Pattern: "[A-Z]",
        Target: "UpperCase"
        },
        {
        Pattern: "[a-z]",
        Target: "LowerCase"
        },
        {
        Pattern: "[0-9]",
        Target: "Numbers"
        },
        {
        Pattern: "[!@@#$%^&*.]",
        Target: "Symbols"
        }
    ];


    var password = $(this).val();


    $("#Length").removeClass(password.length > 6 ? "remove" : "ok");
    $("#Length").addClass(password.length > 6 ? "ok" : "remove");


    for (var i = 0; i < rules.length; i++) {

        $("#" + rules[i].Target).removeClass(new RegExp(rules[i].Pattern).test(password) ? "remove" : "ok");
        $("#" + rules[i].Target).addClass(new RegExp(rules[i].Pattern).test(password) ? "ok" : "remove");
        }
        }


        $(document).ready(function() {
        $("#NewPassword").on('keyup', ValidatePassword)
        });

</script>
</body>
</html>