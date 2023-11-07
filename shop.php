<?php require_once "includes/header.php"; ?>
<?php require_once "config/config.php"; ?>
<?php
    // Categories
    $categories = $conn->query("SELECT * FROM categories");
    $categories->execute();
    $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

    // Most wanted products
    $mostProducts = $conn->query("SELECT * FROM products WHERE status = 1");
    $mostProducts->execute();

    $allMostProducts = $mostProducts->fetchAll(PDO::FETCH_OBJ);
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
                                        <a href="detail-product.php"><?php echo $allMostProduct->product_title; ?></a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">€ <?php echo $allMostProduct->product_price; ?></span>
                                        <span class="reguler">€ 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Vegetables</h2>
                    <div class="product-carousel owl-carousel">
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/meats.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/fish.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/vegetables.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/frozen.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/fruits.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="meats">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Meats</h2>
                    <div class="product-carousel owl-carousel">
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/meats.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/fish.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/vegetables.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/frozen.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/fruits.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.php" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fishes" class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Fishes</h2>
                    <div class="product-carousel owl-carousel">
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/meats.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/fish.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/vegetables.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/frozen.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/fruits.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fruits">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Fruits</h2>
                    <div class="product-carousel owl-carousel">
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/meats.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/fish.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/vegetables.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/frozen.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
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
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="assets/img/fruits.jpg" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.html">Product Title</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="discount">Rp. 300.000</span>
                                        <span class="reguler">Rp. 200.000</span>
                                    </div>
                                    <a href="detail-product.html" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once "includes/footer.php"; ?>
