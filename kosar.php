<?php require "header.php"; ?>

<div id="menu">
    <?php  require "menu.php";  ?>
</div>

<div id="tartalom">

   <div class="container-fluid">
        <div class="row justify-content-center ">
            <div id="kosar_tablazat" class="col-8">
                <h1 id="color4"><img src="img/bag.png" alt="" class="mr-2" >Kosár tartalma</h1>
                    <table width="100%" align="center"  cellspacing="10">
                            <tr>
                                <th>Szerző</th>
                                <th>Cím</th>
                                <th>Kiadás éve</th>
                                <th>Brutto ár</th>
                                <th>Darabszám</th>
                                <th>Érték</th>
                                <th><a href="kosarmuvelet.php?action=empty"><img src="img/garbage.png" alt="" class="mr-2" ></a>Kosár üritése</th>
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
                        $akcio = $row["akcio"];
                        $kedvezmeny = $row["kedvezmeny"];
                        $szerzo = $row["szerzo"];
                        $cim = $row["cim"];
                        $kiadev = $row["kiad_ev"];
                        $bruttoar = $row["ar"];
                        $ertek = $bruttoar * $db;

                        if($akcio == 1){

                        $bruttoar = $row["ar"]-($row["ar"]/100*$kedvezmeny);
                        $ertek = $bruttoar * $db;
                        echo "

                        <tr>
                            <td>".$szerzo."</td>
                            <td style='max-width:200px'>".$cim."</td>
                            <td style='text-align:center'>".$kiadev."</td>
                            <td style='text-align:center min-width:300px''>".number_format($bruttoar,0,".",".")." Ft</td>
                            <td style='text-align:center'>".$db."</td>
                            <td style='text-align:right'>".number_format($ertek,0,".",".")." Ft</td>
                            <td style='text-align:center'>
                                <a href='kosarmuvelet.php?id=".$product_id."&action=add'><img src='img/plus.png' alt=''  class='mr-2' ></a>
                                <a href='kosarmuvelet.php?id=".$product_id."&action=remove'><img src='img/minus.png' alt='' class='mr-2' ></a>
                            </td>
                        </tr>

                    ";

                    $vegosszeg += $ertek;
                        }

                        else{
                        echo "

                            <tr>
                                <td>".$szerzo."</td>
                                <td style='max-width:200px'>".$cim."</td>
                                <td style='text-align:center'>".$kiadev."</td>
                                <td style='text-align:center min-width:300px''>".number_format($bruttoar,0,".",".")." Ft</td>
                                <td style='text-align:center'>".$db."</td>
                                <td style='text-align:right'>".number_format($ertek,0,".",".")." Ft</td>
                                <td style='text-align:center'>
                                    <a href='kosarmuvelet.php?id=".$product_id."&action=add'><img src='img/plus.png' alt=''  class='mr-2' ></a>
                                    <a href='kosarmuvelet.php?id=".$product_id."&action=remove'><img src='img/minus.png' alt='' class='mr-2' ></a>
                                </td>
                            </tr>

                        ";

                        $vegosszeg += $ertek;
                        }
                    }
                }
            }
            else{

                echo "<h2 align='center'>A kosár üres!</h2>";
            }
        ?>
        <tr>

            <td id="color4" align="right" class="margint-bottom:20px" colspan="7">Végösszeg :  <?php  echo number_format($vegosszeg,0,".",".");  ?> Ft </td>

        </tr>
   </table>

   <?php

            if(isset($_SESSION["logged"])){

    ?>
    <a class="rendel_gomb" href="megrendel.php">Megrendelem</a>

    <?php
            }
            else{

    ?>
    <a class="rendel_gomb" href="login_reg.php">Rendelés leadásához kérjük jelentkezzen be!</a>
    <?php
            }
    ?>

            </div>
        </div>
    </div>
</div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>