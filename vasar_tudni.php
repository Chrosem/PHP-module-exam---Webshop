<?php require "header.php"; ?>

<div id="menu">
    <?php  require "menu.php";  ?>
</div>

<div class="container-fluid">
    <div class="row justify-content-center ">
        <div id="color3" class="col-6 ">
            <hr/>
            <?php

                $con = mysqli_connect(host,user,pwd,dbname);
                mysqli_query($con, "SET NAMES utf8");
                if(isset($_GET["katid"])){

                    $katid = $_GET["katid"];
                    $sql = "SELECT * FROM tajekoztatok WHERE id='$katid' ";

                }

                $result = mysqli_query($con, $sql);

                while($row = mysqli_fetch_array($result)){

                    $cim = $row["cim"];
                    $tartalom = $row["tartalom"];

                    echo "

                        <h2>".$cim."</h2>
                        <div>".$tartalom."</div>
                        ";
                    }
                    ?>
        </div>
    </div>
</div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>