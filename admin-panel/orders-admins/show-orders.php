<?php require_once '../includes/header.php'; ?>
<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ../../index.php");
}

// INIT BILL CLASS
//$bills = $billController->showAllBills();
$users = $usersContr->getAllUsers();

if (isset($_GET['id']) && isset($_GET['delivery'])) {

  $billId = $_GET['id'];
  $deliveryStatus = $_GET['delivery'];
  $changeStatus = $billController->setDeliveryStatus($billId, $deliveryStatus);
  echo "<script>window.location.href='show-orders.php'</script>";


}


?>
    <div class="row">
        <div class="col">
          <?php foreach($users as $user) : ?>
          <?php $bills = $billController->showAllBillsProUser($user->user_id); ?>
          <?php if(count($bills) > 0) : ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Orders from User: <?php echo $user->username; ?></h5>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th>Id</th>
                      <th>Invoice</th>
                      <th>Customer Data</th>
                      <th>Adresse</th>
                      <th>Total in €</th>
                      <th>order notes</th>
                      <th>Product list</th>
                      <th>Status</th>
                      <th scope="col">date</th>
                      <th scope="col">update</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(count($bills) > 0) : ?>
                    <?php foreach($bills as $bill) : ?>
                      <tr>
                        <th scope="row">1</th>
                        <td><?php echo $bill->bill_id; ?></td>
                        <td><?php echo $bill->invoice; ?></td>
                        <td><?php echo $bill->fullname . '<br>' . $bill->phone . '<br>' . $bill->email; ?></td>
                        <td><?php echo $bill->adresse. '<br>' . $bill->zip . '<br>' . $bill->city . '<br>' . $bill->country; ?></td>
                        <td><?php echo $bill->total; ?></td>
                        <td><?php echo $bill->order_notes; ?></td>
                        <td><?php echo $bill->product_list; ?></td>
                        <?php if ($bill->delivery == 0) : ?>
                          <td class="bg-danger"> in processing </td>
                        <?php else : ?>
                          <td class="bg-success"> delivered </td>
                          <?php endif; ?>
                        <td><?php echo $bill->created_at; ?></td>
                        <td>                
                            <a href="show-orders.php?id=<?php echo $bill->bill_id; ?>&delivery=<?php echo $bill->delivery; ?>" class="btn btn-warning text-white mb-4 text-center">update</a>
                        </td>
                      
                      </tr>
                      <!-- END FOREACH STMT for to cycle the BILLS-->
                    <?php endforeach; ?>
                  </tbody>
                  <!-- END IF STMT for to check if there are bills-->
                  <?php endif; ?>
                </table> 
              </div>
            </div>
            <!-- END IF CONTROL if user has invoices-->
          <?php endif; ?>
          <!-- END FOREACH STMT for to cycle the users-->
          <?php endforeach; ?>
        </div>
      </div>



      <?php require_once '../includes/footer.php'; ?>