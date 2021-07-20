<!-- Carousel -->
<div class="container-fluid">
  <div class="row justify-content-center">
    <div id="color1" class="col-6">

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/carousel/carousel6.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carousel/carousel5.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carousel/carousel4.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>
  </div>
</div>
<!-- Carousel vége -->

<!-- tartalom -->
<div class="container-fluid">
  <div id="szolgaltatasok" class="row justify-content-center">
    <div  id="color1" class="col-sm-2">
    <hr/>
      <div class="szolgaltatasok">
      <a href="vasar_tudni.php?katid=3" ><img src="img/szolgaltat/logistics.png" alt=""></a>
				<h5>Házhozszállítás</h5>
				<p>Ingyenes házhozszállítás 9.990Ft feletti vásárlás esetén az ország bármely településére</p>
			</div>
		</div>

    <div id="color1" class="col-sm-2">
          <hr>
          <div class="szolgaltatasok">

          <a href="vasar_tudni.php?katid=2" ><img src="img/szolgaltat/pay.png" alt=""></a>

						<h5>Könnyű fizetés</h5>
						<p>Fizessen  online vagy utánvétellel bankkártyájával könnyen.</p>
					</div>
				</div>

    <div id="color1" class="col-sm-2">
    <hr>
      <div class="szolgaltatasok">
      <a href="vasar_tudni.php?katid=1" ><img src="img/szolgaltat/shield.png" alt=""></a>

				<h5>Adatvédelem</h5>
				<p>Alapvető kötelezettségünknek tekintjük a személyes adatok védelméhez fűződő jog maradéktalan biztosítását.</p>
			</div>
    </div>
</div>
</div>
</div>

<div class="container-fluid">
  <div class="row justify-content-center ">
    <div id="color1" class="col-6 ">
    <hr>
    <a href="termekek.php?katid=5" class="tartalom_cim"><h1>Kötelező olvasmányok</h1></a>
    <p class="tartalom_cim">Webshopunkban megtalálható az összes kötelező olvasmány, mind általános iskolások, mind középiskolások számára.</p>
    <?php

$con = mysqli_connect(host,user,pwd,dbname);
mysqli_query($con, "SET NAMES utf8");

$sql = "SELECT * FROM termekek WHERE kategoria=5 LIMIT 8";

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)){
        $borito = $row["borito"];
        $id = $row["id"];

        echo "
            <div class='termekdoboz2'>

                <div class='borito2'>
                    <a href='konyv_adatlap.php?termekid=".$id."'>
                        <img src='$borito'/>
                    </a>
                </div>

            </div>
        ";
}


?>
    </div>
  </div>
</div>


<div class="container-fluid">
  <div class="row justify-content-center ">
    <div id="color1" class="col-6 ">
    <hr>
    <h1>A Legolvasottabb könyvek a Molyon</h1>
    <iframe conent="center" src="https://www.youtube.com/embed/vd7ijEBrNug" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div id="color1" class="col-6 ">
    <hr>
    <a href="akcio.php" class="tartalom_cim"><h1>Akció</h1></a>
    <p class="tartalom_cim">Havonta megújuló akciókkal várjuk kedves látogatóinkat!</p>
    <p class="tartalom_cim">Szeptember 1-éig 30% minden <a href="termekek.php?katid=4" class="gyerek">Gyermekkönyvre</a></p>

    <?php

$con = mysqli_connect(host,user,pwd,dbname);
mysqli_query($con, "SET NAMES utf8");

$sql = "SELECT * FROM termekek WHERE kategoria=4 AND akcio=1 LIMIT 8";

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)){
        $borito = $row["borito"];
        $id = $row["id"];

        echo "
            <div class='termekdoboz2'>

                <div class='borito2'>
                    <a href='konyv_adatlap.php?termekid=".$id."'>
                        <img src='$borito'/>
                    </a>
                </div>

            </div>
        ";
}

?>

    </div>
  </div>
</div>
