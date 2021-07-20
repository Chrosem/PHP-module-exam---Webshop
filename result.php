<?php require "header.php"; ?>


<div id="menu">
    <?php  require "menu.php";  ?>
</div>


<div id="kereses">
    <?php  require "keres.php";  ?>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
            <div class="col-10 mt-5">

            <div id="kategoriak">
                <?php require "kategoriak.php"; ?>
            </div>

<div id="result">
<?php

        if(isset($_POST["search"])){

            $talalat = $_POST["talalat"];

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT * FROM termekek WHERE szerzo LIKE '%$talalat%' OR cim LIKE '%$talalat%'";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0){

              while($row = mysqli_fetch_array($result)){

                  $id = $row["id"];
                  $szerzo = $row["szerzo"];
                  $cim = $row["cim"];
                  $kiad_ev = $row["kiad_ev"];
                  $ar = $row["ar"];
                  $borito = $row["borito"];
                  $keszlet = $row["keszlet"];

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
            }
              else{

                echo "<h3>Nem található ilyen könyv!</h3>";
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