<?php require_once '../includes/header.php'; ?>
<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ../../index.php");
}

// INIT BILL CLASS
$bills = $billController->showAllBills();


?>
    <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th>Id</th>
                    <th>Invoice</th>
                    <th>Customer Data</th>
                    <th>Adresse</th>
                    <th>Total</th>
                    <th>order notes</th>
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
                      <?php if ($bill->delivery == 0) : ?>
                        <td class="bg-danger"> in processing </td>
                      <?php else : ?>
                        <td class="bg-success"> delivered </td>
                        <?php endif; ?>
                      <td><?php echo $bill->order_notes; ?></td>
                      <td><?php echo $bill->created_at; ?></td>
                      <td>                
                          <a href="#" class="btn btn-warning text-white mb-4 text-center">update</a>
                      </td>
                    
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <?php endif; ?>
              </table> 
            </div>
          </div>
        </div>
      </div>



      <?php require_once '../includes/footer.php'; ?>