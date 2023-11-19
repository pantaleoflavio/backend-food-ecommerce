<?php require_once "includes/header.php"; ?>
<?php require_once "config/config.php"; ?>
<?php 

    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location: http://localhost/freshcery/index.php');
        exit;
    }

    if(!isset($_SESSION['user_id'])) {
                
        echo "<script> window.location.href='".APPURL."'; </script>";

    }

if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id'];
    $bill = $conn->query("SELECT * FROM bills WHERE user_id = '{$user}'");
    $bill->execute();
    $billDetails = $bill->fetchAll(PDO::FETCH_OBJ);


}

?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
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
                                        <th width="5%"></th>
                                        <th>Invoice</th>
                                        <th>Date</th>
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
                                        <td>1</td>
                                        <td>
                                            AL121N8H2XQB47
                                        </td>
                                        <td>
                                            <?php echo $billDetail->created_at; ?>
                                        </td>

                                        <td>
                                            <?php echo $billDetail->product_list; ?>
                                        </td>
                                        <td>
                                            <?php echo $billDetail->total; ?>
                                        </td>
                                        <td>
                                            Delivered
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr class="text-center bg-success">>
                                        <td colspan="6">No Bills</td>
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

<?php require_once "includes/footer.php"; ?>

