<?php require_once "includes/header.php"; ?>

<?php
    //Include of the classes
    include "classes/db.classes.php";
    include "admin-panel/classes/category-contr.classes.php";
    include "admin-panel/classes/product-contr.classes.php";
    
    // Instantiate all classes controller
    $categoryControll = new CategoryContr();
    $productControll = new ProductContr();

    // Instantiate Categorie class
    $allCategories = $categoryControll->getCategories();

    // Most wanted products
    $allMostProducts = $productControll->getProducts();


?>

<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Shopping Page
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shop-categories owl-carousel mt-5">
                    <?php foreach($allCategories as $category) : ?>
                    <div class="item">
                        <a href="shop.php">
                            <div class="media d-flex align-items-center justify-content-center">
                                <span class="d-flex mr-2"><i class="sb-<?php echo $category->category_icon ?>"></i></span>
                                <div class="media-body">
                                    <h5><?php echo $category->category_name ?></h5>
                                    <p><?php echo $category->category_description ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>

    <section id="most-wanted">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Most Wanted</h2>
                    <div class="product-carousel owl-carousel">
                        <?php foreach($allMostProducts as $allMostProduct) : ?>
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
                                            Until <?php echo $allMostProduct->exp_date; ?>
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/<?php echo $allMostProduct->product_image; ?>" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="products/detail-product.php?id=<?php echo $allMostProduct->product_id; ?>"><?php echo $allMostProduct->product_title; ?></a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="reguler">€ <?php echo $allMostProduct->product_price; ?></span>
                                        <span class="discount">€ 200.000</span>
                                    </div>
                                    <a href="products/detail-product.php?id=<?php echo $allMostProduct->product_id; ?>" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="vegetables" class="gray-bg">

        <?php foreach($allCategories as $category) : ?>
        <?php

            // STATEMENT FOR TO HAVE EVERY SINGLE SECTION FOR EVERY SINGLE CATEGORY
            $cat_id = $category->category_id;
            $products = $productControll->getProductsByCategory($cat_id);

        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title"><?php echo $category->category_name; ?></h2>
                        <div class="product-carousel owl-carousel">
                            <?php foreach($products as $product) : ?>
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
                                                Until <?php echo $product->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/<?php echo $product->product_image; ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="products/detail-product.php?id=<?php echo $product->product_id; ?>"><?php echo $product->product_title; ?></a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="reguler">€ <?php echo $product->product_price; ?></span>
                                            <span class="discount">€ 200.000</span>
                                        </div>
                                        <a href="products/detail-product.php?id=<?php echo $product->product_id; ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <!-- END FOREACH OF THE PRODUCT GROUPS -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- END FOREACH OF THE CATEGORIES -->
    <?php endforeach; ?>








    






</div>

<?php require_once "includes/footer.php"; ?>
