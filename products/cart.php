<?php require_once "../includes/header.php"; ?>
<?php require_once "../config/config.php"; ?>
<?php
if(!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='".APPURL."'</script>";
}

if (isset($_SESSION['user_id'])) {
    $cart = $conn->query("SELECT * FROM cart WHERE user_id = {$_SESSION['user_id']}");
    $cart->execute();
    $cartProducts = $cart->fetchAll(PDO::FETCH_OBJ);

    if (isset($_GET['update'])) {
        # code...
    }

    
} else {
    echo "<script>window.location.href='".APPURL."'</script>";
}

?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Your Cart
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <section id="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%"></th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th width="15%">Quantity</th>
                                        <th width="15%">Update</th>
                                        <th>Subtotal</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php if(count($cartProducts) > 0) : ?>
                                    <?php foreach($cartProducts as $cartProduct) : ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo APPURL; ?>/assets/img/<?php echo $cartProduct->pro_image; ?>" width="60">
                                            </td>
                                            <td>
                                                <?php echo $cartProduct->pro_title; ?><br>
                                            </td>
                                            <td>
                                                € <?php echo $cartProduct->pro_price; ?>
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" min="1" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="<?php echo $cartProduct->pro_qty; ?>" name="vertical-spin">
                                            </td>
                                            <td>
                                                <a href="<?php echo APPURL."products/cart.php&update" ?>" class="btn btn-primary">UPDATE</a>
                                            </td>
                                            <td>
                                                € <?php echo ($cartProduct->pro_price * $cartProduct->pro_qty); ?>
                                            </td>
                                            <td>
                                                <a href="javasript:void" class="text-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr class="text-center bg-success">>
                                        <td colspan="7">THE CART IS EMPTY</td>
                                    </tr>
                                </tbody>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>

                    <div class="col">
                        <a href="<?php echo APPURL; ?>/shop.php" class="btn btn-default">Continue Shopping</a>
                    </div>
                    <div class="col text-right">
                        <div class="clearfix"></div>
                        <?php if(count($cartProducts) > 0) : ?>
                    
                        <h6 class="mt-3">Total: € <?php //echo sum($cartProducts-) ?></h6>
                        <?php else : ?>
                        <h6 class="mt-3">Total: € 0</h6>
                        <?php endif; ?>
                        <a href="checkout.html" class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></a>
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
            value = value.replace(/^(0*)/,"");
            $(this).val(1);
        });

    })
</script>
