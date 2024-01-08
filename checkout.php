<?php require_once "includes/header.php"; ?>
<?php

if (isset($_SESSION['user_id'])) {

    // Subtot and TOT plus Update total as Session key
    $cartSubtot = array();
    foreach ($cartProducts as $cartProduct) {
        $singleSubtot = $cartProduct->pro_qty * $cartProduct->pro_price;
        $cartSubtot[] = $singleSubtot;
    }

    $mySubTot = floatval(array_sum($cartSubtot));

    if(isset($_POST['submit'])) {

        $invoice = $billController->generateInvoiceRandom();
        $customer = $_POST['fullname'];
        $company = $_POST['company'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $adresse = $_POST['adresse'];
        $zip = $_POST['zip'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $order_notes = $_POST['order_notes'];
        $user_id = $_SESSION['user_id'];


        $product_list = "";
        foreach ($cartProducts as $cartProduct) {
            $product_list .= $cartProduct->pro_title . " €" . $cartProduct->pro_price . " x " . $cartProduct->pro_qty . "<br>";
        };

        $newBill = $billController->createBill($invoice, $customer, $company, $city, $country, $adresse, $zip, $email, $phone, $order_notes, $user_id, $mySubTot + 20, $product_list); 

        // Update total as Session key
        if (!isset($_SESSION['total_bill'])) {
            $_SESSION['total_bill'] = $mySubTot + 20;
        }

        echo "<script>window.location.href='products/pay.php'</script>";
    }
    
} else {
    echo "<script>window.location.href='index.php'</script>";
}
?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Checkout
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <form action="checkout.php" method="post" class="bill-detail">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <h5 class="mb-3">BILLING DETAILS</h5>
                            <!-- Bill Detail of the User -->
                            <fieldset>
                                <div class="form-group">
                                    <input name="fullname" class="form-control" placeholder="Name" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input name="company" class="form-control" placeholder="Company Name" type="text">
                                </div>
                                <div class="form-group">
                                    <input name="adresse" type="text" class="form-control" placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <input name="city" class="form-control" placeholder="Town / City" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input name="country" class="form-control" placeholder="State / Country" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input name="zip" class="form-control" placeholder="Postcode / Zip" type="text" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <input name="email" class="form-control" placeholder="Email Address" type="email" required>
                                    </div>
                                    <div class="col">
                                        <input name="phone" class="form-control" placeholder="Phone Number" type="tel" required>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <textarea name="order_notes" class="form-control" placeholder="Order Notes"></textarea>
                                </div>
                            </fieldset>
                            <!-- Bill Detail of the Uset end -->
                        </div>

                        <div class="col-xs-12 col-sm-5">
                            <div class="holder">
                                <h5 class="mb-3">YOUR ORDER</h5>
                                <!-- Bill Detail of the Cart -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th class="text-right">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($cartProducts as $cartProduct) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $cartProduct->pro_title . " x " . $cartProduct->pro_qty ?>
                                                </td>
                                                <td class="text-right">
                                                    € <?php echo ($cartProduct->pro_qty * $cartProduct->pro_price) ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfooter>
                                            <tr>
                                                <td>
                                                    <strong>ORDER SUBTOTAL</strong>
                                                </td>
                                                <td class="text-right">
                                                    € <?php echo $mySubTot;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>SHIPPING</td>
                                                <td class="text-right">€ 20</td>
                                            </tr>
                                            <hr>
                                            <tr>
                                                <td><strong>TOTAL</strong></td>
                                                <td class="text-right">€ <?php echo $mySubTot + 20; ?>
                                                    <input name="total_bill" class="text-right" type="hidden" value="<?php echo $myTot; ?>">
                                                </td>
                                            </tr>
                                        </tfooter>
                                    </table>
                                </div>
                                <!-- Bill Detail of the Cart end-->
                            </div>
                            <!-- Validating if is empty-->
                            <p class="text-right mt-3">
                                <input id="terms" type="checkbox"> I’ve read &amp; accept the <a href="terms.php">terms &amp; conditions</a>
                            </p>
                            <?php if ($mySubTot == 0) : ?>
                            <div class="btn btn-danger float-right">CART EMPTY <i class="fa fa-check"></i></div>
                            <?php else : ?>
                            <button type="submit" name="submit" class="btn btn-primary float-right">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>

<?php require_once "includes/footer.php"; ?>
<script>
// Validating if terms are accepted
$(document).ready(function() {
    $('body').on('click', '[name="submit"]', function() {
      if ($('#terms').is(':checked')) {
        $(this).submit();
      }
      else {
        alert("Please accept the terms");
        return false;
      }
    });
});
</script>