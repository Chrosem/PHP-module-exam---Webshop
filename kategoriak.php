<?php

    $con = mysqli_connect(host,user,pwd,dbname);
    mysqli_query($con, "SET NAMES utf8");

    $sql = "SELECT * FROM kategoriak ORDER BY kat_sorrend ASC";

    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)){

        $id = $row["id"];
        $katnev = $row["kat_nev"];

        echo "
            <div class='kategoriak'>
               <a href='termekek.php?katid=".$id."'>
                    ".$katnev."
                </a>
            </div>
        ";
    }
    ?>

    <script>

var btnContainer = document.getElementById("kategoriak");

var btns = btnContainer.getElementsByClassName("btn");

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
    </script>