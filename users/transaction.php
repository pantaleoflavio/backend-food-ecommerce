<?php require_once "../includes/header.php"; ?>
<?php require_once "../config/config.php"; ?>
<?php

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $_GET['id']) {
    $userId = $_SESSION['user_id'];

    $billDetails = $billController->showAllBillsProUser($userId);
} else {
    echo "<script>window.location.href='../404.php'</script>";
}


?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Your Transactions
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
                                        <th>Invoice</th>
                                        <th>Date</th>
                                        <th>Customer Data</th>
                                        <th>Products</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(count($billDetails) > 0) : ?>
                                    <?php foreach($billDetails as $billDetail) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $billDetail->invoice . "&id=" . $billDetail->bill_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $billDetail->created_at; ?>
                                        </td>
                                        <td>
                                            <?php echo $billDetail->fullname . ", phone: " . $billDetail->phone . "<br>email: " . $billDetail->email . "<br>details: " . $billDetail->order_notes . "<br>" . $billDetail->adresse . "<br>" . $billDetail->zip . " " . $billDetail->city . ", " . $billDetail->country; ?>
                                        </td>
                                        <td>
                                            <?php echo $billDetail->product_list; ?>
                                        </td>
                                        <td>
                                            € <?php echo $billDetail->total; ?>
                                        </td>
                                        <!-- If for to check delivery status -->
                                        <?php if ($billDetail->delivery === 0) : ?>
                                        <td>
                                            under processing
                                        </td>
                                        <?php else : ?>
                                        <td>
                                            Delivered
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr class="text-center bg-success">>
                                        <td colspan="7">No Bills</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                      
                    </div>
                </div>
            </div>
        </section>

       
    </div>

<?php require_once "../includes/footer.php"; ?>

