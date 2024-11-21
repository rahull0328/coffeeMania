<?php


require "../../assets/includes/config.php";
include pathOf('admin/assets/includes/sidebar.php');
include pathOf('admin/assets/includes/header.php');

if(!isset($_SESSION['admin_id'])){
    header("Location: ./login.php");
}

$sql = "SELECT c.username AS customer_name, p.name ,p.price AS product_price, o.total_amount, o.order_date AS order_date, oi.quantity
FROM 
    customers c
INNER JOIN 
    orders o ON c.user_id = o.user_id
INNER JOIN 
    order_items oi ON o.order_id = oi.order_id
INNER JOIN 
    products p ON oi.product_id = p.prod_id";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_all($result);

?>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">All Orders
                        <svg xmlns="http://www.w3.org/2000/svg" class="col icon icon-tabler icon-tabler-plus" onclick="showInsertModal()" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                    </h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle bg-dark text-white" style="border-radius: 10px;">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white text-center">Sr No.</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white text-center">Customer Name</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white text-center">Product Name</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white text-center">Product Price</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-o align-middle text-white text-center">Quantity</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-o align-middle text-white text-center">Total Amount</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-o align-middle text-white text-center">Order Date</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($data); $i++) { ?>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 text-white text-center"><?= $i + 1  ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white text-center"><?= $data[$i][0] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white text-center"><?= $data[$i][1] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white text-center"><?= $data[$i][2] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white text-center"><?= $data[$i][5] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white text-center"><?= $data[$i][3] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white text-center"><?= $data[$i][4] ?></h6>
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
    <!-- show insert model -->
    <dialog id="insertCategoryModal" style="top: 50%;left: 50%;border:0px;border-radius:10px;height: 50%;width: 30%;-webkit-transform: translateX(-50%) translateY(-50%);-moz-transform: translateX(-50%) translateY(-50%);-ms-transform: translateX(-50%) translateY(-50%);transform: translateX(-50%) translateY(-50%);">
        <form method="POST" id="insertForm">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label mb-3">Category Name : </label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter Category Name : " required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </dialog>

    <!-- show update model -->
    <dialog id="updateCategoryModal" style="top: 50%;left: 50%;border:0px;border-radius:10px; height: 50%;width: 30%;-webkit-transform: translateX(-50%) translateY(-50%);-moz-transform: translateX(-50%) translateY(-50%);-ms-transform: translateX(-50%) translateY(-50%);transform: translateX(-50%) translateY(-50%);">
        <form method="POST" id="updateForm">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label mb-3">Update Category Name : </label>
                        <input type="text" class="form-control" name="updateCategoryName" id="updateName">
                        <input type="hidden" class="form-control" name="updateId" id="id">
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Submit</button>
                </div>
            </div>
        </form>
    </dialog>
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
    <script>
        function showInsertModal() {
            insertCategoryModal.showModal();
        }

        function showUpdateModal(id, categoryName) {
            updateCategoryModal.showModal();
            $("#id").val(id);
            $("#updateName").val(categoryName);
        }

        //inserting category
        function insertCategory(event) {
            
            event.preventDefault();

            let data = {
                categoryName: $("#categoryName").val(),
            }

            $.ajax({
                url: "../../api/category/addCategory.php",
                method: "POST",
                data: data,
                success: function(response) {
                    if (response.success) {
                        alert("Category Inserted Successfully !");
                        window.location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        $("#insertForm").on("submit", insertCategory);

         //inserting category
         function updateCategory(event) {
            
            event.preventDefault();

            let data = {
                updateName: $("#updateName").val(),
                id: $("#id").val(),
            }

            $.ajax({
                url: "../../api/category/updateCategory.php",
                method: "POST",
                data: data,
                success: function(response) {
                    if (response.success) {
                        alert("Category Updated Successfully !");
                        window.location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        $("#updateForm").on("submit", updateCategory);
    </script>

<?php

include pathOf('admin/assets/includes/footer.php');

?>