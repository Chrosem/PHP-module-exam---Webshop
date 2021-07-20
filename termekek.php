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

                <div class="row justify-content-center">
                    <img src="img/search.png" alt="" class="mr-3 mb-3">
                    <form  action="" method="post">
                        <input type="text" name="search_text" class="search_text" placeholder="Írja be a könyv Szerzőjét vagy Címét">
                    </form>
                </div>

                <div id="sort">
                    <a href="?sort=price_asc"><img src="img/up.png" alt="" class="mr-2" ></a>
                    <span>Ár</span>
                    <a href="?sort=price_desc"><img src="img/down.png" alt="" class="mr-2" ></a>

                    <a href="?sort=ev_asc"><img src="img/up.png" alt="" class="mr-2" ></a>
                    <span>Kiadás Éve</span>
                    <a href="?sort=ev_desc"><img src="img/down.png" alt="" class="mr-2" ></a>

                    <a href="?sort=szerzo_asc"><img src="img/arrow.png" alt="" class="mr-2" ></a>
                    <span>Szerző</span>

                    <a href="?sort=cim_asc"><img src="img/arrow.png" alt="" class="mr-2" ></a>
                    <span>Cím</span>

                </div>
                <div class="result">
                <script>
                $(function(){
                    $(".search_text").keyup(function(){
                        var text = $(".search_text").val();
                        if(text != ""){
                            $.ajax({
                                url : "fetch.php",
                                type : "post",
                                dataType : "text",
                                data : {search : text},
                                success : function(data){

                                    $(".result").html(data);
                                }
                            })
                        }
                        else{
                            $(".result").html("");
                        }
                    })
                })
            </script>

<?php

    $con = mysqli_connect(host,user,pwd,dbname);
    mysqli_query($con, "SET NAMES utf8");

    $color = "";
    $text = "";
    $button= "";


    if(isset($_GET["katid"])){

        $katid = $_GET["katid"];
        $sql = "SELECT * FROM termekek WHERE kategoria='$katid'";
    }

    /* Rendezés */
    else if(isset($_GET["sort"])){

        $sort = $_GET["sort"];

        switch($sort){

            case "price_asc":
                $sql = "SELECT * FROM termekek ORDER BY ar ASC";
            break;

            case "price_desc":
                $sql = "SELECT * FROM termekek  ORDER BY ar DESC";
            break;

            case "ev_asc":
                $sql = "SELECT * FROM termekek  ORDER BY kiad_ev ASC";
            break;

            case "ev_desc":
                $sql = "SELECT * FROM termekek  ORDER BY kiad_ev DESC";
            break;

            case "szerzo_asc":
                $sql = "SELECT * FROM termekek ORDER BY szerzo ASC";
            break;

            case "cim_asc":
                $sql = "SELECT * FROM termekek ORDER BY cim ASC";
            break;
        }
    }
    else{

        $sql = "SELECT * FROM termekek ORDER BY id DESC";
    }


    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)){

        $id = $row["id"];
        $akcio = $row["akcio"];
        $kedvezmeny = $row["kedvezmeny"];
        $szerzo = $row["szerzo"];
        $cim = $row["cim"];
        $kiado = $row["kiado"];
        $kiad_ev = $row["kiad_ev"];
        $ar = $row["ar"];
        $borito = $row["borito"];
        $keszlet = $row["keszlet"];
        $akcios_ar = $row["ar"]-($row["ar"]/100*$kedvezmeny);

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


        if($akcio == 1){
        echo "

        <div class='termekdoboz'>

            <div class='borito'>
                <a href='konyv_adatlap.php?termekid=".$id."'>
                    <img src='$borito'/>
                </a>
            </div>

            <div class='cim'>
             ".$cim."  (".$kiad_ev.")
            </div>
            <div class='szerzo'>
                ".$szerzo."
            </div>

            <div class='ar'>
                <span style='text-decoration: line-through'>".number_format($ar,0,".",".")." Ft</span>
                 ".number_format($akcios_ar,0,".",".")." Ft
                <br><span style='color:red'>-".$kedvezmeny."%</span>
            </div>

            <div id='".$color."'>
            <p>".$text."</p>
            </div>

            <div class='".$button."'>
                <a href='kosarmuvelet.php?id=".$id."&action=add'><img src='img/bag.png' alt='' class='mr-2' >Kosárba</a>
            </div>

        </div>
    ";

        }
        else{
            echo "
            <div class='termekdoboz'>

                <div class='borito'>
                    <a href='konyv_adatlap.php?termekid=".$id."'>
                        <img src='$borito'/>
                    </a>
                </div>

                <div class='cim'>
                 ".$cim." (".$kiad_ev.")
                </div>
                <div class='szerzo'>
                    ".$szerzo."
                </div>

                <div class='ar'>
                    ".number_format($ar,0,".",".")." Ft
                </div>

                <div id='".$color."'>
                <p>".$text."</p>
                </div>

                <div class='".$button."'>
                    <a href='kosarmuvelet.php?id=".$id."&action=add'><img src='img/bag.png' alt='' class='mr-2' >Kosárba</a>
                </div>

            </div>
            ";
        }
    }
?>

</div>
            </div>
        </div>
    </div>
</div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>