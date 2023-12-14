<?php require_once "../includes/header.php"; ?>
<?php

// QUERY for to insert in cart table the customners products 
if (isset($_POST['submit'])) {
    $pro_id = $_POST['pro_id'];
    $pro_title = $_POST['pro_title'];
    $pro_image = $_POST['pro_image'];
    $pro_price = $_POST['pro_price'];
    $pro_qty = $_POST['pro_qty'];
    $user_id = $_POST['user_id'];

    $insert = $conn->prepare("INSERT INTO cart (pro_id, pro_title, pro_image, pro_price, pro_qty, user_id)
    VALUE (:pro_id, :pro_title, :pro_image, :pro_price, :pro_qty, :user_id)");

    $insert->execute([
        ':pro_id' => $pro_id,
        ':pro_title' => $pro_title,
        ':pro_image' => $pro_image,
        ':pro_price' => $pro_price,
        ':pro_qty' => $pro_qty,
        ':user_id' => $user_id,
    ]);

} else {
    # code...
}


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = $conn->query("SELECT * FROM products WHERE status = 1 AND product_id = {$id}");
    $select->execute();
    if ($select->rowCount() > 0) {
        $product = $select->fetch(PDO::FETCH_OBJ);

        // Related Products fetch
        $relatedProducts = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = {$product->category_id} AND product_id != {$id}");
        $relatedProducts->execute();
        $allRelatedProducts = $relatedProducts->fetchAll(PDO::FETCH_OBJ);

        //validating cart products
        if (isset($_SESSION['user_id'])) {
            $validate = $conn->query("SELECT * FROM cart WHERE pro_id = {$id} AND user_id = {$_SESSION['user_id']}");
            $validate->execute();
        }

    } else {
        echo "<script>window.location.href='../404.php'</script>";
    }
    
    // Validation if Product exists
} else {
    echo "<script>window.location.href='../404.php'</script>";
}


?>
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                    <?php echo $product->product_title; ?>
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="slider-zoom">
                            <a href="../assets/img/<?php echo $product->product_image; ?>" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                                <img alt="Detail Zoom thumbs image" src="../assets/img/<?php echo $product->product_image; ?>" style="width: 100%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>
                            <strong>Overview</strong><br>
                            <?php echo $product->product_description; ?>
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <strong>Price</strong> (/Pack)<br>
                                    <span class="price">€ <?php echo $product->product_price; ?></span>
                                    
                                </p>
                            </div>
                        </div>
                        <!-- IF SESSION USER VALIDATION -->
                        <?php if(!isset($_SESSION['user_id'])) : ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    PLEASE FIRST <a href="../auth/register.php" class="nav-link">SIGN UP</a> or <a href="../auth/login.php" class="nav-link">SIGN IN</a>
                                </div>
                            </div>

                        <?php else : ?>
                        <p class="mb-1">
                            <strong>Quantity</strong>
                        </p>
                        <form method="post" id="form-data" action="">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input class="form-control" type="hidden" name="pro_id" value="<?php echo $product->product_id; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <input class="form-control" type="hidden" name="pro_title" value="<?php echo $product->product_title; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <input class="form-control" type="hidden" name="pro_image" value="<?php echo $product->product_image; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <input class="form-control" type="hidden" name="pro_price" value="<?php echo $product->product_price; ?>">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-5">
                                    <input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-sm-5">
                                    <input class="form-control" type="number" min="1" max="<?php echo $product->product_quantity; ?>" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" name="pro_qty">
                                </div>
                                <div class="col-sm-6"><span class="pt-1 d-inline-block">Pack (1000 gram)</span></div>
                            </div>
                            <?php if($validate->rowCount() > 0) : ?>
                            <button id="add-to-cart" name="submit" type="submit" disabled class="mt-3 btn btn-primary btn-lg">
                                <i class="fa fa-shopping-basket"></i> Added to Cart
                            </button>
                            <?php else : ?>
                            <button id="add-to-cart" name="submit" type="submit" class="mt-3 btn btn-primary btn-lg">
                                <i class="fa fa-shopping-basket"></i> Add to Cart
                            </button>
                            <?php endif; ?>

                        <!-- END IF SESSION USER VALIDATION -->
                        <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section id="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Related Products</h2>
                        <div class="product-carousel owl-carousel">
                        <?php foreach($allRelatedProducts as $allRelatedProduct) : ?>
                        <div class="item">
                            <div class="card card-product">
                                <div class="card-ribbon">
                                    <div class="card-ribbon-container right">
                                        <span class="ribbon ribbon-primary">SPECIAL</span>
                                    </div>
                                </div>
                                <div class="card-badge">
                                    <div class="card-badge-container left">
                                        <span class="badge badge-default">
                                            Until <?php echo $allRelatedProduct->exp_date; ?>
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="<?php echo APPURL ?>/assets/img/<?php echo $allRelatedProduct->product_image; ?>" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php"><?php echo $allRelatedProduct->product_title; ?></a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">€ <?php echo $allRelatedProduct->product_price; ?></span>

                                    </div>
                                    <a href="<?php echo APPURL ?>/products/detail-product.php?id=<?php echo $allRelatedProduct->product_id; ?>" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php require_once "../includes/footer.php"; ?>

    <script>
        $(document).ready(function() {
            $(".form-control").keyup(function(){
                var value = $(this).val();

                // Remove initial 0
                value = value.replace(/^(0*)/,"");

                // Max Qty of the product
                var maxQuantity = <?php echo $product->product_quantity; ?>;

                // compare to the max value
                if (parseInt(value) > maxQuantity) {
                    // if value overcome max, set to max value
                    $(this).val(maxQuantity);
                }
            });

            // prevent default 
           $('#add-to-cart').on('click', function (e) {
                e.preventDefault();

                // confirm query with AJAX, with alert message, handling eventual errors
                var form_data = $('#form-data').serialize()+'&submit=submit';
                $.ajax({
                    url: "detail-product.php?id=<?php echo $id; ?>",
                    method: "POST",
                    async: true,
                    timeout: 1000,
                    data: form_data,

                    success: function () {
                        alert("Product added succesfully");
                        window.location.reload();
                        $('#add-to-cart').html("<i class='fa fa-shopping-basket'></i> Added to Cart").prop("disabled", true);
                    },
                    error: function () {
                        alert("Something went wrong");
                    }

                })
            }); 

        })
    </script>