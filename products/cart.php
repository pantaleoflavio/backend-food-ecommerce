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
                                                <input disabled class="pro_price" type="number" name="pro_price" value="<?php echo $cartProduct->pro_price; ?>"> €
                                            </td>
                                            <td>
                                                <input class="pro_qty form-control" type="number" min="1" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="<?php echo $cartProduct->pro_qty; ?>" name="vertical-spin">
                                            </td>
                                            <td>
                                                <button value="<?php echo $cartProduct->cart_id; ?>" class="btn btn-primary btn-update">UPDATE</button>
                                            </td>
                                            <td class="total_price">
                                                <?php echo ($cartProduct->pro_price * $cartProduct->pro_qty); ?> €
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
                            <?php
                                $cartSubtot = array();
                                foreach ($cartProducts as $cartProduct) {
                                    $singleSubtot = $cartProduct->pro_qty * $cartProduct->pro_price;
                                    $cartSubtot[] = $singleSubtot; 
                            ?>
                            <?php } ?>
                            <h6 class="mt-3">Total: € <?php echo array_sum($cartSubtot) ?></h6>
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

        $(".pro_qty").mouseup(function () {
                  
            var $el = $(this).closest('tr');

            var pro_qty = $el.find(".pro_qty").val();
            var pro_price = $el.find(".pro_price").val();

            console.log(pro_qty);
            console.log(pro_price);

            var total = pro_qty * pro_price;

            $el.find(".total_price").html("");        

            $el.find(".total_price").append(`${total.toFixed(2)} €`);
        
        
            let ajax = false;
            $(".btn-update").on('click', function(e) {
                if (!ajax) {
                    ajax = true;
                


                    var id = $(this).val();
                

                    $.ajax({
                    type: "POST",
                    url: "update-product.php",
                    data: {
                        update: "update",
                        id: id,
                        pro_qty: pro_qty
                    },

                    success: function() {
                        ajax = false;
                        //alert("done");
                        window.location.reload();
                    }
                    })
                }
            });
        });
        
            
        // fetch();     
        

    })
</script>
