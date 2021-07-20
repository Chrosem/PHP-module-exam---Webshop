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
                    <h2>Termék keresése</h2>
                    <img src="img/search.png" alt="" class="ml-3 mb-3">
                </div>

            <div class="row justify-content-center">
                    <form class="center" action="" method="post">
                        <input type="text" name="search_text" class="search_text" placeholder="Írja be a könyv Szerzőjét vagy Címét">
                    </form>

            </div>
            <div class="result"></div>

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

        </div>
    </div>
</div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>