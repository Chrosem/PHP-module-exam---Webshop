<?php require "header.php"; ?>


<div id="menu">
    <?php  require "menu.php";  ?>
</div>

<div id="tartalom">
    <div class="container" id="kosar_tablazat">
        <div class="row justify-content-center">
            <div id="adatok" class="col-4 ml-2 mr-4 text-white">


<!--Kiírja a Profiil adatokat és a szállítási adatokat -->
                <?php
                    $user = $_SESSION["user"];

                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                    $sql = "SELECT * FROM adatok WHERE user LIKE '$user'";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $user = $row["user"];
                        $becenev = $row["becenev"];
                        $email = $row["email"];

                            echo "
                                <h1 class='mt-2 mb-4 text-center'><img src='img/user.png' alt='' class='mb-2 mr-2'>Adataim</h1>
                                <p class='pt-3'>Felhasználónév: ".$user."</p>
                                <p>Becenév: ".$becenev."</p>
                                <p>E-mail: ".$email."</p>
                                <button type='submit' name='egyeb' id='egyeb' class='btn text-white mt-5 mb-2'>Módosítás</button>
                                ";

                                }
                                ?>
                    </div>

                    <div id="adatok" class="col-4 mr-2 ml-4  text-white">

                    <?php
                                $user = $_SESSION["user"];

                                $con = mysqli_connect(host,user,pwd,dbname);
                                mysqli_query($con, "SET NAMES utf8");

                                $sql = "SELECT * FROM vevo_adatok WHERE user LIKE '$user' LIMIT 1";

                                $result = mysqli_query($con, $sql);

                                while($row = mysqli_fetch_array($result)){

                                    $v_nev = $row["v_nev"];
                                    $k_nev = $row["k_nev"];
                                    $email = $row["email"];
                                    $tel = $row["tel"];
                                    $szallit_irsz = $row["szallit_irsz"];
                                    $szallit_telepules = $row["szallit_telepules"];
                                    $szallit_utca = $row["szallit_utca"];
                                    $szallit_hazszam = $row["szallit_hazszam"];

                                    echo "
                                        <h2 class='mt-2 text-center'><img src='img/szolgaltat/logistics.png' alt='' class='mb-2 mr-2'>Szállítási cím</h2>
                                        <p>Név: ".$v_nev ." ".$k_nev."</p>
                                        <p>E-mail: ".$email."</p>
                                        <p>Telefon: ".$tel."</p>
                                        <p>Cím: ".$szallit_irsz." ".$szallit_telepules."</p>
                                        <p>".$szallit_utca." ".$szallit_hazszam."</p>
                                        <button type='submit' name='szallit' id='szallit' class='btn text-white mb-2'>Módosítás</button>
                                    ";
                                }
                    ?>

                    </div>
            </div>

<!--Profil adatok és Szállítási adatok módosítása -->

            <!--Profil adatok -->
            <?php
                    $user = $_SESSION["user"];

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


                        else{

                        $con = mysqli_connect(host,user,pwd,dbname);
                        mysqli_query($con, "SET NAMES utf8");

                        $sql = "UPDATE adatok SET becenev='$becenev', email='$email', pwd=sha1('$pwd') WHERE user LIKE '$user' ";

                        mysqli_query($con, $sql);

                        $success = "Sikeres adatmódosítás!";
                        echo "<meta http-equiv='refresh' content='0'>";

                        }
                    }


                    ?>
                    <span class="text-danger d-block"><?php if(!empty($error)){ echo $error;} ?></span>
                    <span class="text-success d-block"><?php if(!empty($success)){ echo $success;} ?></span>

            <div class="row justify-content-center">
                <div id="profil" class="col-6 pb-10 text-white">

                    <form action="" method="post"  class="form-group  text-center p-2">


                    <div class="form-group col-12 mb-3 mt-3">
                        <label for=""><b>Becenév</b></label>
                        <input type="text" name="becenev" class="form-control">
                    </div>

                    <div class="form-group col-12 mb-3 mt-3">
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
            </div>


            <!--Szállítási adatok -->
                <?php
                    $user = $_SESSION["user"];

                    $succes = "";
                    $error="";

                    if(isset($_POST["save2"])){

                    $v_nev = $_POST["v_nev"];
                    $k_nev = $_POST["k_nev"];
                    $email = $_POST["email"];
                    $tel = $_POST["tel"];
                    $szallit_irsz = $_POST["szallit_irsz"];
                    $szallit_telepules = $_POST["szallit_telepules"];
                    $szallit_utca = $_POST["szallit_utca"];
                    $szallit_hazszam = $_POST["szallit_hazszam"];

                        /* Minden mező kitöltése */
                        if(empty($v_nev)  || empty($k_nev) || empty($email) || empty($tel) || empty($email) || empty($szallit_irsz)
                        || empty($szallit_telepules) || empty($szallit_utca) || empty($szallit_hazszam)){

                            $error="Minden mező kitöltése kötelező!";

                        }

                        else{

                            $con = mysqli_connect(host,user,pwd,dbname);
                            mysqli_query($con, "SET NAMES utf8");


                            $sql = "UPDATE vevo_adatok SET v_nev='$v_nev', k_nev='$k_nev', email='$email' , tel='$tel'
                            , szallit_irsz='$szallit_irsz' , szallit_telepules='$szallit_telepules' , szallit_utca='$szallit_utca' ,
                            szallit_hazszam='$szallit_hazszam' WHERE user LIKE '$user' ";

                            mysqli_query($con, $sql);

                            $success = "Sikeres adatmódosítás!";
                            echo "<meta http-equiv='refresh' content='0'>";
                            }
                    }
                ?>
                <span class="text-danger d-block"><?php if(!empty($error)){ echo $error;} ?></span>
                <span class="text-success d-block"><?php if(!empty($success)){ echo $success;} ?></span>

                <div class="row justify-content-center">
                <div id="szallitadatok" class="col-6 mt-6 text-white">

                    <form action="" method="post"  class="form-group  text-center p-2">

                        <div class="form-group col-md-6">
                            <label>Vezetéknév</label>
                            <input type="text" name="v_nev" placeholder="Vezetéknév...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Keresztnév</label>
                            <input type="text" name="k_nev" placeholder="Keresztnév...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>E-mail</label>
                            <input type="text" name="email" placeholder="E-mail cím...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Telefonszám</label>
                            <input type="text" name="tel" placeholder="Telefonszám...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Irányító szám</label>
                            <input type="text" name="szallit_irsz" placeholder="Irányítószám...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Település</label>
                            <input type="text" name="szallit_telepules" placeholder="Település...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Utca vagy Út</label>
                            <input type="text" name="szallit_utca" placeholder="Utca..">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Házszám</label>
                            <input type="text" name="szallit_hazszam" placeholder="Házszám...">
                        </div>

                    <div class="form-group">
                        <button type="submit" name="save2"  class="btn btn-primary mt-3">Mentés</button>
                    </div>

                    </form>
                </div>
            </div>

 </div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>
</body>
</html>

<script>

    //elrejti alapból
    $(document).ready(function(){
        $("#szallitadatok").hide();
        $("#profil").hide();
    });

    $(document).ready(function(){
        $("#szallit").click(function(){
            $("#szallitadatok").toggle();
        });
        $("#egyeb").click(function(){
            $("#profil").toggle();
        });
    });

</script>

