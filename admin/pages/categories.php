<?php


require "../../assets/includes/config.php";
include pathOf('admin/assets/includes/sidebar.php');
include pathOf('admin/assets/includes/header.php');

if(!isset($_SESSION['admin_id'])){
    header("Location: ./login.php");
}

$sql = "SELECT * FROM categories";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_all($result);

?>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">All categories
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
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Sr No.</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Category Name</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Update</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-o align-middle text-white">Delete</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($data); $i++) { ?>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 text-white"><?= $i + 1  ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white"><?= $data[$i][1] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a class="mb-0 fw-normal align-middle">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" onclick="showUpdateModal(<?= $data[$i][0] ?>, '<?= $data[$i][1] ?>')" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="cursor: pointer;">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a class="mb-0 fw-normal align-middle" href="<?= urlOf('api/category/removeCategory.php?id=') . $data[$i][0] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eraser" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="cursor: pointer;">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3"></path>
                                                    <path d="M18 13.3l-6.3 -6.3"></path>
                                                </svg>
                                            </a>
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