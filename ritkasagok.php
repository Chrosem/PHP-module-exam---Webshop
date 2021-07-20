<?php require "header.php"; ?>

<div id="menu">
    <?php  require "menu.php";  ?>
</div>

<div class="container-fluid">
    <div class="row justify-content-center ">
        <div id="color3" class="col-6 ">
            <hr/>
                <h2>Ritkaságok</h2>
                <p style="text-align:justify">Szakképzett kollégáink felkutatják az ön által keresett ritka, dedikált vagy limitált kiadású könyveket.
                    Kérjük, vegyék figyelembe, hogy az általunk felkutatott könyvek állapota és ára változó!
                    Kizárólag pontos egyeztetés után áll módunkban felkutatni az ön által keresett könyveket.
                    Telefonon és e-mailben, elegendő információ hiányában hozzávetőlegesen sem adunk tájékoztatást az árról,
                    kizárólag megtekintés után tudjuk megállapítani a könyvek értékét!</p>

             <?php

        $error = "";
        $success = "";

    if(isset($_POST["add"])){

        $kuldo= $_POST["kuldo"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $keres = $_POST["keres"];

        if(empty($kuldo) || empty($email) || empty($tel) || empty($keres)){

            $error = "Minden mező kitöltése kötelező!";
        }
        else{

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "INSERT INTO ajanlatkeres(kuldo,email,tel,keres,datum) VALUES('$kuldo', '$email', '$tel', '$keres', NOW())";

            mysqli_query($con, $sql);

            $success = "Kérés rögzítése megtörtént! Hamarosan felvesszük önnel a kapcsolatot.";
        }
    }
    ?>

            <form action="" class="text-center p-5" method="post">

                <h2 class="">Ajánlatkérés</h2>
                <img src="img/knowledge2.png" class="pb-3 pt-2" alt="">

                <input type="text" name="kuldo" class="form-control mb-3" placeholder="Teljes név...">
                <input type="text" name="email" class="form-control mb-3" placeholder="E-mail...">
                <input type="text" name="tel" class="form-control mb-3" placeholder="Telefonszám...">

                <textarea name="keres" class="form-control mb-3" cols="70" rows="10" placeholder="Kérés...."></textarea>

                <button name="add" id="loginbtn" class="btn btn-success form-control mb-3" type="submit">Kérés küldése</button>

                <span class="text-danger d-block mb-3"><?php if(!empty($error)){echo $error;}  ?></span>
                <span class="text-success d-block mb-3"><?php if(!empty($success)){echo $success;}  ?></span>

            </form>

        </div>
    </div>
</div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>