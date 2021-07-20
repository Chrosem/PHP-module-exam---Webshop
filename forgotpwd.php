<?php  require "connection.php";

$error = "";
$success = "";



if(isset($_POST["send"])){

    $user = $_POST["user"];
    $email = $_POST["email"];

    if(empty($user) || empty($email)){

        $error = "Minkét mező kitöltése kötelező!";

    }

    else{

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            /*létező felhasználó név és email */

            $user_sql = "SELECT * FROM adatok WHERE user='$user'";

            $user_exsist = mysqli_query($con, $user_sql);

            $email_sql = "SELECT * FROM adatok WHERE email='$email'";

            $email_exsist = mysqli_query($con, $email_sql);

            if(mysqli_num_rows($user_exsist) < 1){

                $error = "Nem létező felhasználónév!";

            }

            else if(mysqli_num_rows($email_exsist) < 1){

                $error = "A megadott E-mail cím nem létezik!";

            }

            else{

            header('Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ.$newURL');

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

<title>Elfelejtett Jelszó</title>
</head>
<body>

    <div class="container">
        <div id="login" class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5 bg-light">
                <span class="text-danger d-block"><?php if(!empty($error)){ echo $error;} ?></span>
                <span class="text-success d-block"><?php if(!empty($success)){ echo $success;} ?></span>

                <h1>Új jelszó küldése</h1>

                <label for="email"><b>Adja meg a Felhasználónevét amellyel regisztrált</b></label>
                <input type="text" name="user" placeholder="Felhasználónév..."class="form-control mb-4 mt-4">

                <label for="email"><b>Adja meg a regisztrációkor használt E-mail címét</b></label>
                <input type="email" name="email" placeholder="Email-cím..." class="form-control mb-4 mt-4">

                <button type="submit" name="send" id="loginbtn" class=" btn btn-primary pt-2 pb-2 mt-2 mb-2">Új jelszó küldése</button>

            </form>

        </div>
    </div>

</body>
</html>