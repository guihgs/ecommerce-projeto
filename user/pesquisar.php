<?php
include "header.php";
include "config.php";
?> 

  <?php
            include "left_menu.php";
            ?>
             <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Resultados da Pesquisa</h2>
                    <?php
        //Search input result from database
        if(isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($link, $_POST['search']);
            $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%' OR id LIKE '%$search%' OR product_price LIKE '%$search%' OR product_category LIKE '%$search%' OR product_desc LIKE '%$search%'";
            $result = mysqli_query($link, $sql);
            $queryResult = mysqli_num_rows($result);
            ?>
            <p style="text-align: center;"><?php echo "Foram encontrados ".$queryResult." resultados!";?></p>
            <?php
            if($queryResult > 0){

                //if have results
                while($row = mysqli_fetch_assoc($result)){ ?>

                        <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="product_details.php?id=<?php echo $row["id"]; ?>">
                                    <img src="../admin/<?php echo $row["product_image"]; ?>" alt="" width="180" height="381" />
                                    <h2>$<?php echo $row["product_price"]; ?></h2>
                                    <p><?php echo $row["product_name"]; ?></p>
                                    <p><?php echo $row["product_category"]; ?></p>
                                    <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver Descrição</a>
                                </a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="product_details.php?id=<?php echo $row["id"]; ?>">
                                        <h2>$<?php echo $row["product_price"]; ?></h2>
                                        <p><?php echo $row["product_name"]; ?></p>
                                        <p><?php echo $row["product_category"]; ?></p>
                                        <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver Descrição</a>
                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
<?php
}
            }else{?>
                <p style="text-align: center;"><?php echo "Nenhum resultado foi encontrado!"; ?></p>
            <?php }
        }
    ?>

                     </div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

            <?php
include "footer.php";
?>