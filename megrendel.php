<?php require "header.php"; ?>

<div id="menu">
    <?php  require "menu.php";  ?>
</div>

<div id="tartalom">

<div class="container-fluid">
        <div class="row justify-content-center ">
            <div id="kosar_tablazat" class="col-8">

    <h2>Megrendelés összesítése</h2>

    <table align="center" cellpadding="8" width="90%">
        <tr align="center">
        <th>Szerző</th>
        <th>Cím</th>
        <th>Kiadás éve</th>
        <th>Brutto ár</th>
        <th>Darabszám</th>
        <th>Érték</th>
        </tr>

        <?php

            $vegosszeg = 0;

            if(isset($_SESSION["cart"])){

                foreach($_SESSION["cart"] as $product_id => $db){

                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                    $sql = "SELECT * FROM termekek WHERE id='$product_id'";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $szerzo = $row["szerzo"];
                        $cim = $row["cim"];
                        $kiad_ev = $row["kiad_ev"];
                        $bruttoar = $row["ar"];
                        $ertek = $bruttoar * $db;

                        echo "
                        <tr align='center'>
                        <td>".$szerzo."</td>
                        <td style='max-width:200px'>".$cim."</td>
                        <td style='text-align:center'>".$kiad_ev."</td>
                        <td style='text-align:right'>".number_format($bruttoar,0,".",".")." Ft</td>
                        <td style='text-align:center'>".$db."</td>
                        <td style='text-align:right'>".number_format($ertek,0,".",".")." Ft</td>
                        <td>

                            </tr>
                        ";

                        $vegosszeg += $ertek;
                    }

                }
            }

        ?>
<tr>

<td id="color4" align="right" colspan="7">Végösszeg :  <?php  echo number_format($vegosszeg,0,".",".");  ?> Ft </td>

</tr>
</table>
<!-- Új szállítási adatok bevitele-->
    <?php

        $error="";
        $error2="";

        if(isset($_POST["megrendel"]) && (isset($_POST["check3"]) == 1)){

            // Adatok
            $user = $_SESSION["user"];
            $v_nev = $_POST["v_nev"];
            $k_nev = $_POST["k_nev"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];

            // Szállítási Adatok
            $szallit_irsz = $_POST["szallit_irsz"];
            $szallit_telepules = $_POST["szallit_telepules"];
            $szallit_utca = $_POST["szallit_utca"];
            $szallit_hazszam = $_POST["szallit_hazszam"];

            $szallitas = $_POST["szallitas"];
            $fiz_mod = $_POST["fiz_mod"];


            if(empty($v_nev) || empty($k_nev) || empty($email) || empty($tel) || empty($szallit_irsz) || empty($szallit_telepules) || empty($szallit_utca) 
            || empty($szallit_hazszam)){

                 $error = "Rendelés leadásához minden mező kitöltése kötelező!";
            }
            else{

                $con = mysqli_connect(host,user,pwd,dbname);
                mysqli_query($con, "SET NAMES utf8");

                $sql = "INSERT INTO vevo_adatok(user,v_nev,k_nev,email,tel,pwd,szallit_irsz,szallit_telepules,szallit_utca,szallit_hazszam)

                VALUES('$user','$v_nev','$k_nev','$email','$tel', '' ,'$szallit_irsz','$szallit_telepules','$szallit_utca','$szallit_hazszam')";

                mysqli_query($con, $sql);

                //Megkeresem az utolsó vevőm azonosítóját
                $utolsovevoid = "SELECT id FROM adatok ORDER BY id DESC LIMIT 1";

                //Eltárolom az sql lekérdezésem kimenetét egy változóba
                $result = mysqli_query($con, $utolsovevoid);

                //Tömbösítem az sql lekérdezésem kimenetét
                $get_vevoid = mysqli_fetch_array($result);

                //A végleges vevő id-t eltárolom egy változóba
                $kapottvevoid = $get_vevoid[0];

                //Fetöltöm a megfelelő adatok a rendelések táblába
                $sql2 = "INSERT INTO rendeles(vevo_id,szallitas,fiz_mod,datum,statusz,b_osszeg) VALUES('$kapottvevoid', '$szallitas', '$fiz_mod', NOW(), 'függőben', '$vegosszeg')";

                mysqli_query($con, $sql2);

                  //Megkeresem az utolsó rendelésem azonosítóját
                $utolsorendelesid = "SELECT id FROM rendeles ORDER BY id DESC LIMIT 1";

                //Eltárolom az sql lekérdezésem kimenetét egy változóba
                $result2 = mysqli_query($con, $utolsorendelesid);
                //Tömbösítem az sql lekérdezésem kimenetét
                $get_rendelesid = mysqli_fetch_array($result2);
                //A végleges vevő id-t eltárolom egy változóba
                $kapottrendelesid = $get_rendelesid[0];

                foreach($_SESSION["cart"] as $product_id => $db){

                    //FEltöltöm a megfelelő adatokat a rend_term táblába
                    $sql3 = "INSERT INTO vevo_rend_term(rendeles_id,termek_id,db) VALUES('$kapottrendelesid','$product_id', '$db')";

                    mysqli_query($con, $sql3);

                    //Frissítem a termék készletének darabszámát
                    $sql4 = "UPDATE termekek SET keszlet= keszlet - '$db' WHERE id='$product_id'";
                    mysqli_query($con, $sql4);
                }

                echo "<h3 style='text-align:center; color:green'>Rendelésed sikeresen rögzítettük!</h3>";
                unset($_SESSION["cart"]);

            }
        }

        else if(isset($_POST["megrendel"]) && (isset($_POST["check3"]) == 0)){

            $v_nev = $_POST["v_nev"];
            $k_nev = $_POST["k_nev"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];

            $szallit_irsz = $_POST["szallit_irsz"];
            $szallit_telepules = $_POST["szallit_telepules"];
            $szallit_utca = $_POST["szallit_utca"];
            $szallit_hazszam = $_POST["szallit_hazszam"];

            $szallitas = $_POST["szallitas"];
            $fiz_mod = $_POST["fiz_mod"];


            $error2="Vásárlási feltételek elfogadása kötelező!";

            if(empty($v_nev) || empty($k_nev) || empty($email) || empty($tel) || empty($szallit_irsz) || empty($szallit_telepules) ||
             empty($szallit_utca) || empty($szallit_hazszam)){

                 $error = "Rendelés leadásához minden mező kitöltése kötelező!";
            }
        }


       // Saját adatok használata

        $error3="";

        if(isset($_POST["rendelsajat"]) && (isset($_POST["check2"]) == 1)){  // check2--> vásárlási feltételek

            $user = $_SESSION["user"];
            $szallitas = $_POST["szallitas"];
            $fiz_mod = $_POST["fiz_mod"];

                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                    $user = $_SESSION["user"];
                    $sql="SELECT * FROM vevo_adatok WHERE user LIKE $user";

                            //Megkeresem az utolsó vevőm azonosítóját
                        $utolsovevoid = "SELECT id FROM adatok ORDER BY id DESC LIMIT 1";

                        //Eltárolom az sql lekérdezésem kimenetét egy változóba
                        $result = mysqli_query($con, $utolsovevoid);

                        //Tömbösítem az sql lekérdezésem kimenetét
                        $get_vevoid = mysqli_fetch_array($result);

                        //A végleges vevő id-t eltárolom egy változóba
                        $kapottvevoid = $get_vevoid[0];

                        //Fetöltöm a megfelelő adatok a rendelések táblába
                        $sql2 = "INSERT INTO rendeles(vevo_id,szallitas,fiz_mod,datum,statusz,b_osszeg) VALUES('$kapottvevoid', '$szallitas', '$fiz_mod', NOW(), 'függőben', '$vegosszeg')";

                        mysqli_query($con, $sql2);

                        //Megkeresem az utolsó rendelésem azonosítóját
                        $utolsorendelesid = "SELECT id FROM rendeles ORDER BY id DESC LIMIT 1";

                        //Eltárolom az sql lekérdezésem kimenetét egy változóba
                        $result2 = mysqli_query($con, $utolsorendelesid);
                        //Tömbösítem az sql lekérdezésem kimenetét
                        $get_rendelesid = mysqli_fetch_array($result2);
                        //A végleges vevő id-t eltárolom egy változóba
                        $kapottrendelesid = $get_rendelesid[0];

                        foreach($_SESSION["cart"] as $product_id => $db){

                            //FEltöltöm a megfelelő adatokat a rend_term táblába
                            $sql3 = "INSERT INTO vevo_rend_term(rendeles_id,termek_id,db) VALUES('$kapottrendelesid','$product_id', '$db')";

                            mysqli_query($con, $sql3);

                            //Frissítem a termék készletének darabszámát
                            $sql4 = "UPDATE termekek SET keszlet= keszlet - '$db' WHERE id='$product_id'";
                            mysqli_query($con, $sql4);
                        }

                        echo "<h3 style='text-align:center; color:green'>Rendelésed sikeresen rögzítettük!</h3>";
                        unset($_SESSION["cart"]);
                    }

        else if(isset($_POST["rendelsajat"]) && (isset($_POST["check2"]) == 0)){

            $error3="Vásárlási feltételek elfogadása kötelező!";
        }


    ?>

        <p>Használom a mentett Szállítási adataimat<input type="checkbox" name="check1" id="check" class="ml-2"> </p>


        <!--Saját adatok kiírása -->
        <div id="sajatadat" style="display: none" >
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

                                    <div id='sajatadatok' class=' text-white pl-2'>
                                        <h2>Szállítási cím</h2>
                                        <p>Név: ".$v_nev ." ".$k_nev."</p>
                                        <p>E-mail: ".$email."</p>
                                        <p>Telefon: ".$tel."</p>
                                        <p>Cím: ".$szallit_irsz." ".$szallit_telepules."</p>
                                        <p>".$szallit_utca." ".$szallit_hazszam."</p>
                                    </div>

                                    ";
                                }
                    ?>
                <form action="" method="post">
                <h4 style="color: red"> <?php  if(!empty($error3)){ echo $error3;} ?></h4>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                    <label>Szállítási mód:</label>
                    <select name="szallitas">
                    <option value="gls">GLS futárral</option>
                    <option value="posta-utanvet">Postai utánvéttel</option>
                    <option value="szemelyes">Személyes átvétel</option>
                </select>
                </div>

                <div class="form-group col-md-6">
                <label>Fizetési mód:</label>
                <select name="fiz_mod">
                    <option value="utanvet">Utánvét</option>
                    <option value="bkartya">Online bankkártya</option>
                    <option value="atutalas">Átutalás</option>
                </select>
                </div>
                </div>
                <p><a href="vasar_tudni.php?katid=5" target="new"> Elfogadom a vásárlási feltételeket </a><input type="checkbox" name="check2"></p>

                <button type="submit" name="rendelsajat" class=" btn btn-primary mt-3 mb-3">Rendelés leadása</button>
                </form>
                </div>

<!--Szállítási adatok kitöltése -->
        <div id="megrendeles">

            <form action="" method="post">
                <h4 style="color: red"> <?php  if(!empty($error)){ echo $error;} ?></h4>

                <h2>Személyes adatok</h2>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6">
                            <label>Vezetéknév</label>
                            <input type="text" name="v_nev" placeholder="Vezetéknév...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Keresztnév</label>
                            <input type="text" name="k_nev" placeholder="Keresztnév...">
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6">
                            <label>E-mail</label>
                            <input type="text" name="email" placeholder="E-mail cím...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Telefonszám</label>
                            <input type="text" name="tel" placeholder="Telefonszám...">
                        </div>
                    </div>

                    <h2>Szállítási cím</h2>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6">
                            <label>Irányító szám</label>
                            <input type="text" name="szallit_irsz" placeholder="Irányítószám...">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Település</label>
                            <input type="text" name="szallit_telepules" placeholder="Település...">
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6">
                            <label>Utca vagy Út</label>
                            <input type="text" name="szallit_utca" placeholder="Utca..">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Házszám</label>
                            <input type="text" name="szallit_hazszam" placeholder="Házszám...">
                        </div>

                    </div>

                    <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                    <label>Szállítási mód:</label>
                    <select name="szallitas">
                    <option value="gls">GLS futárral</option>
                    <option value="posta-utanvet">Postai utánvéttel</option>
                    <option value="szemelyes">Személyes átvétel</option>
                </select>
                </div>

                <div class="form-group col-md-6">
                <label>Fizetési mód:</label>
                <select name="fiz_mod">
                    <option value="utanvet">Utánvét</option>
                    <option value="bkartya">Online bankkártya</option>
                    <option value="atutalas">Átutalás</option>
                </select>
                </div>
                </div>

                <h4 style="color: red"> <?php  if(!empty($error2)){ echo $error2;} ?></h4>
                <p> <a href="vasar_tudni.php?katid=5" target="new"> Elfogadom a vásárlási feltételeket </a><input type="checkbox" name="check3"></p>


                <button type="submit" name="megrendel" class=" btn btn-primary mt-3 mb-3">Rendelés leadása</button>
            </form>
    </div>
</div>
</div>

    <div id="footer">
        <?php require "footer.php"; ?>
    </div>

    <script>

 $(function () {
        $("#check").click(function () {
            if ($(this).is(":checked")) {
                $("#sajatadat").show();
                $("#megrendeles").hide();
            } else {
                $("#sajatadat").hide();
                $("#megrendeles").show();
            }
        });
    });
    </script>

</body>
</html>