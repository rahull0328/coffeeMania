<?php

require "../../assets/includes/config.php";

include pathOf('admin/assets/includes/sidebar.php');
include pathOf('admin/assets/includes/header.php');

$categoryList = "SELECT * FROM categories";
$result = mysqli_query($con, $categoryList);
$data = mysqli_fetch_all($result);

$productList = "SELECT products.name, products.price, products.description, products.image, categories.cat_name AS categoryName FROM products INNER JOIN categories ON categories.id = products.id";
$response = mysqli_query($con, $productList);
$productData = mysqli_fetch_all($response);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="row">
                        <h5 class="card-title fw-semibold mb-4 col">Products&nbsp;&nbsp;&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" class="col icon icon-tabler icon-tabler-plus" onclick="showInsertModal()" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="cursor: pointer;">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                        </h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle bg-dark">
                            <thead class="text-dark fs-4 align-middle">
                                <tr>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Sr No.</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Name</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Description</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Price</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Image</h6>
                                    </th>
                                    <th class="border-bottom-0 align-middle">
                                        <h6 class="fw-semibold mb-0 align-middle text-white">Category</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($productData); $i++) { ?>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 text-white"><?= $i + 1 ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white"><?= $productData[$i][0] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white"><?= $productData[$i][2] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white"><?= $productData[$i][1] ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <img src="<?= urlOf('admin//assets/uploads/') . $productData[$i][3] ?>" class="card-img-top" style="border-radius: 50%;height: 70px;width: 70px;object-fit: cover;object-position: center" alt="<?= $data[$i][3] ?>">
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1 text-white"><?= $productData[$i][4] ?></h6>
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

    <!-- Insert Modal -->
    <dialog id="insertTableModal" style="top: 50%;left: 50%;border:0px;border-radius:10px; height: 80%;width: 30%;-webkit-transform: translateX(-50%) translateY(-50%);-moz-transform: translateX(-50%) translateY(-50%);-ms-transform: translateX(-50%) translateY(-50%);transform: translateX(-50%) translateY(-50%);">
        <form method="POST" id="insertForm" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label mb-3">Product Name : </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name : " required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label mb-3">Product Description : </label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Product Description : " required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label mb-3">Product Price : </label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price : " required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label mb-3">Select Category : </label>
                        <select class="form-select" name="category" id="category">
                            <?php for ($i = 0; $i < count($data); $i++) { ?>
                                <option value="<?= $data[$i][0] ?>"><?= $data[$i][1] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label mb-3">Product Image : </label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </dialog>

    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
    <script>
        function showInsertModal() {
            insertTableModal.showModal();
        }

        //inserting data
        function insertProduct(event) {
            event.preventDefault();

            //handling images
            var fileInput = document.getElementById('image');
            var file = fileInput.files[0];

            var formData = new FormData();
            formData.append('file', file);
            formData.append('name', $("#name").val());
            formData.append('description', $("#description").val());
            formData.append('price', $("#price").val());
            formData.append('category', $("#category").val());

            //ajax call
            $.ajax({
                url: "../../api/product/insertProduct.php",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert("Product Added !");
                        window.location.reload();
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function(error) {
                    console.log(error);
                    alert("Error: Unable to insert product.");
                }
            })
        }
        $("#insertForm").on("submit", insertProduct);
    </script>

    <?php
    include pathOf('admin/assets/includes/footer.php');
    ?>