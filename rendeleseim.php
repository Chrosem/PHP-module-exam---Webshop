<?php require "header.php"; ?>

<div id="menu">
    <?php  require "menu.php";  ?>
</div>

<div id="tartalom">

<div class="container-fluid">
    <div class="row justify-content-center ">
        <div id="kosar_tablazat" class="col-8">
            <h2>Kedves <?php  echo $_SESSION["becenev"].", eddigi rendeléseid:"; ?></h2>

                <table width="100%" align="center" cellpadding="5">
                <tr>
                    <th>Dátum</th>
                    <th>Borito</th>
                    <th>Szerző</th>
                    <th style="width:200px">Cím</th>
                    <th>Kiadás éve</th>
                    <th>Brutto ár</th>
                    <th>Darabszám</th>
                    <th>Érték</th>
                </tr>

        <?php

        $user = $_SESSION["user"];

        $con = mysqli_connect(host,user,pwd,dbname);
        mysqli_query($con, "SET NAMES utf8");

        $sql = "SELECT termek_id,datum,szerzo,cim,kiad_ev,ar,db,borito FROM vevo_adatok INNER JOIN rendeles ON vevo_adatok.id=rendeles.vevo_id INNER JOIN vevo_rend_term ON
        rendeles.id=vevo_rend_term.rendeles_id INNER JOIN termekek ON vevo_rend_term.termek_id=termekek.id WHERE vevo_adatok.user LIKE '$user'";


        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($result)){


            $termek_id = $row["termek_id"];
            $datum = $row["datum"];
            $szerzo = $row["szerzo"];
            $cim = $row["cim"];
            $kiad_ev = $row["kiad_ev"];
            $ar = $row["ar"];
            $db = $row["db"];
            $borito = $row["borito"];
            $ertek = $db * $ar;

            echo "

                <tr align='center'>
                    <td>".$datum."</td>
                    <td><a href='termek.php?termekid=".$id."'><img src='$borito' width='32px' height='32px'</a></td>
                    <td>".$szerzo."</td>
                    <td>".$cim."</td>
                    <td>".$kiad_ev."</td>
                    <td>".number_format($ar,0,".",".")."</td>
                    <td>".$db."</td>
                    <td>".number_format($ertek,0,".",".")."</td>

                </tr>

            ";

        }
        ?>

    </table>
    </div>
</div>
</div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>