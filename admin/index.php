<?php

require "../assets/includes/config.php";

if (!isset($_SESSION['admin_id'])) {
  header("Location: ./pages/login.php");
  exit;
}

include pathOf('admin/assets/includes/sidebar.php');
include pathOf('admin/assets/includes/header.php');

$id = $_SESSION['admin_id'];

$sql = "SELECT c.username AS customer_name, p.name ,p.price AS product_price, o.total_amount, o.order_date AS order_date, oi.quantity
FROM 
    customers c
INNER JOIN 
    orders o ON c.user_id = o.user_id
INNER JOIN 
    order_items oi ON o.order_id = oi.order_id
INNER JOIN 
    products p ON oi.product_id = p.prod_id
WHERE
  DATE(o.order_date) = CURDATE()";

$result = mysqli_query($con, $sql);
$data = mysqli_fetch_all($result);

?>

<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0 align-middle">
                    <h6 class="fw-semibold mb-0 align-middle text-center">Sr No.</h6>
                  </th>
                  <th class="border-bottom-0 align-middle">
                    <h6 class="fw-semibold mb-0 align-middle text-center">Customer Name</h6>
                  </th>
                  <th class="border-bottom-0 align-middle">
                    <h6 class="fw-semibold mb-0 align-middle text-center">Product Name</h6>
                  </th>
                  <th class="border-bottom-0 align-middle">
                    <h6 class="fw-semibold mb-0 align-middle text-center">Product Price</h6>
                  </th>
                  <th class="border-bottom-0 align-middle">
                    <h6 class="fw-semibold mb-o align-middle text-center">Quantity</h6>
                  </th>
                  <th class="border-bottom-0 align-middle">
                    <h6 class="fw-semibold mb-o align-middle text-center">Total Amount</h6>
                  </th>
                  <th class="border-bottom-0 align-middle">
                    <h6 class="fw-semibold mb-o align-middle text-center">Order Date</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                  for ($i = 0; $i < count($data); $i++) { ?>
                    <tr>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0 text-center"><?= $i + 1  ?></h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1 text-center"><?= $data[$i][0] ?></h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1 text-center"><?= $data[$i][1] ?></h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1 text-center"><?= $data[$i][2] ?></h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1 text-center"><?= $data[$i][5] ?></h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1 text-center"><?= $data[$i][3] ?></h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1 text-center"><?= $data[$i][4] ?></h6>
                      </td>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>
                    <td colspan="7" class="border-bottom-0">
                      <h6 class="fw-semibold mb-1 text-center">No recent transactions found.</h6>  
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php

  include pathOf('admin/assets/includes/footer.php');

  ?>