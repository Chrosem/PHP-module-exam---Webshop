<?php

if ( isset($_SESSION['logged']) )
    {

?>

<!-- Navbar -->
<nav class="navbar">

  <div class="logo">
    <img src="img/bookstore.png" alt="" margin="auto">
    <h1>Bookstore</h1>

  </div>

    <form id="menusor" class="form-inline">

      <a class="nav-item nav-link text-light rounded-left" href="index.php">Nyitólap</a>

      <div class="dropdown show">
        <a id="button" class="btn text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Könyvek
        </a>
        <div class="dropdown-menu text-light" aria-labelledby="dropdownMenuLink">

        <?php

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT * FROM kategoriak ORDER BY kat_sorrend ASC";

            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($result)){

                $id = $row["id"];
                $katnev = $row["kat_nev"];

                echo "<a class='dropdown-item text-light' href='termekek.php?katid=".$id."'>".$katnev."</a>";
            }
            ?>

            </div>
      </div>
      <a class="nav-item nav-link text-light" href="akcio.php">Akció</a>

      <a class="nav-item nav-link text-light" href="ritkasagok.php">Ritkaságok</a>

      <!--Vásárlási tudnivalók -->

      <div class="dropdown show">
        <a id="button" class="btn text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Vásárlási tudnivalók
        </a>
        <div class="dropdown-menu text-light" aria-labelledby="dropdownMenuLink">

        <?php
            ob_start();
            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT * FROM tajekoztatok ORDER BY cim ASC";

            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($result)){

                $id = $row["id"];
                $cim = $row["cim"];
                $tartalom = $row["tartalom"];
                ob_start();
                echo "<a class='dropdown-item text-light' href='vasar_tudni.php?katid=".$id."'>".$cim."</a>";
            }
            ob_end_flush();
          ?>
            </div>
      </div>

      <a class="nav-item nav-link text-light rounded-right" href="rolunk.php">Rólunk</a>

    </form>

    <form action=""  method="post" class="form-inline" id="right">
      <a class="nav-item nav-link text-light rounded-left" href="kosar.php"><img src="img/bag.png" alt="" class="mr-2" >Kosár</a>
      <a id="button" class="btn text-light"  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"><?php echo "<img src='img/user.png' alt='' class='mr-2' >Üdvözlöm, ".$_SESSION["becenev"]; ?></a>
      <div id="dropdownmenu"class="dropdown-menu text-light dropdown-menu-right" aria-labelledby="dropdownMenuLink">

            <a class="dropdown-item text-light" href="profile.php">Profilom</a>
            <a class="dropdown-item text-light" href="rendeleseim.php">Rendeléseim</a>
            <div class="dropdown-divider"></div>
            <button id="logout" class="dropdown-item text-light" id="logout" type="submit" name="logout">Kijelentkezés</button>
            </div>
    </form>

</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div id="rounded" class="col-7 align-center">

<p>„ Aki könyvet olvas, kezdetnek éppúgy hajlandó eltársalogni az időjárásról,<br> mint akárki más, de innen általában tovább is tud lépni. “</p>
<p>Stephen King</p>

    </div>
  </div>
</div>

<!-- else ág -->
<?php
    }

   else{

    $_SESSION["user"] = "";

?>

<!-- Navbar -->
<nav class="navbar">

  <div class="logo">
    <img src="img/bookstore.png" alt="" margin="auto">
    <h1>Bookstore</h1>

  </div>

    <form id="menusor" class="form-inline">

      <a class="nav-item nav-link text-light rounded-left" href="index.php">Nyitólap</a>

      <div class="dropdown show">
        <a id="button" class="btn text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Könyvek
        </a>
        <div class="dropdown-menu text-light" aria-labelledby="dropdownMenuLink">

        <?php

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT * FROM kategoriak ORDER BY kat_sorrend ASC";

            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($result)){

                $id = $row["id"];
                $katnev = $row["kat_nev"];

                echo "<a class='dropdown-item text-light' href='termekek.php?katid=".$id."'>".$katnev."</a>";
            }
            ?>

            </div>
      </div>
      <a class="nav-item nav-link text-light" href="akcio.php">Akció</a>

      <a class="nav-item nav-link text-light" href="ritkasagok.php">Ritkaságok</a>

      <!--Vásárlási tudnivalók -->

      <div class="dropdown show">
        <a id="button" class="btn text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Vásárlási tudnivalók
        </a>
        <div class="dropdown-menu text-light" aria-labelledby="dropdownMenuLink">

        <?php
            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT * FROM tajekoztatok ORDER BY cim ASC";
            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($result)){
              $id = $row["id"];
              $cim = $row["cim"];
              $tartalom = $row["tartalom"];

              echo"<a class='dropdown-item text-light' href='vasar_tudni.php?katid=".$id."'>".$cim."</a>";

            }

            ?>

            </div>
      </div>

      <a class="nav-item nav-link text-light rounded-right" href="rolunk.php">Rólunk</a>

    </form>

    <form class="form-inline">
      <a class="nav-item nav-link text-light rounded-left" href="kosar.php"><img src="img/bag.png" alt="" class="mr-2" >Kosár  </a>
      <a class="nav-item nav-link text-light rounded-right" href="login_reg.php"><img src="img/user.png" alt="" class="mr-2" > Bejelentkezés</a>
    </form>

</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div id="rounded" class="col-7 aling-center">



<p>„ Aki könyvet olvas, kezdetnek éppúgy hajlandó eltársalogni az időjárásról,<br> mint akárki más, de innen általában tovább is tud lépni. “</p>
<p>Stephen King</p>

    </div>
  </div>
</div>

<?php
    }
        if(isset($_POST["logout"])){
            session_destroy();
            $_SESSION["logged"] = false;
            header("Location: index.php");

        }
   ?>