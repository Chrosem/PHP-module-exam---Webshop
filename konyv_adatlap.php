<?php require "header.php"; ?>


<div id="menu">
    <?php  require "menu.php";  ?>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
            <div class="col-10 mt-5">

            <div id="kategoriak">
                <?php require "kategoriak.php"; ?>
            </div>

            <div id="megjelen_termekek">

                <?php

                $color = "";
                $text = "";
                $button= "";

                $con = mysqli_connect(host,user,pwd,dbname);
                mysqli_query($con, "SET NAMES utf8");

                    if(isset($_GET["termekid"])){

                        $termekid = $_GET["termekid"];

                        $sql = "SELECT * FROM termekek WHERE id='$termekid'";
                    }

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $id = $row["id"];
                        $szerzo = $row["szerzo"];
                        $cim = $row["cim"];
                        $kiado = $row["kiado"];
                        $kiad_ev = $row["kiad_ev"];
                        $ar = $row["ar"];
                        $borito = $row["borito"];
                        $keszlet = $row["keszlet"];
                        $leiras = $row["leiras"];
                        $egyeb = $row["egyeb"];


                        if ($keszlet ==  0) {

                            $color = "red";
                            $text = "Készlethiány";
                            $button = "no";

                        }
                        else{

                            $color = "green";
                            $text = "Raktáron";
                            $button = "add";
                        }


                        echo "


                        <div id='borito'>
                                <img src='$borito' alt='' title=''/>
                        </div>

                            <div id='konyvadat'>

                                <div id='cim'>
                                    <h1>".$cim."</h1>
                                </div>

                                <div id='szerzo'>
                                <h2> ".$szerzo." </h2>
                                </div>

                                <div id='kiad_ev'>
                                    <h2>".$kiad_ev."</h2><h2>".$kiado."</h2>
                                </div>

                                <div id='ar'>
                                    <h3>Ár: ".number_format($ar,0,".",".")." Ft</h3>
                                </div>

                                <div id='".$color."'>
                                <p>".$text."</p>
                                </div>

                                <div id='".$button."'>
                                    <a href='kosarmuvelet.php?id=".$id."&action=add'><img src='img/bag.png' alt='' class='mr-2' >Kosárba</a>
                                </div>
                            </div>


                                <div id='leiras'>
                                    <p>".$leiras."</p>
                                </div>

                                <div id='leiras'>
                                    <p>".$egyeb."</p>
                                </div>

                        ";
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