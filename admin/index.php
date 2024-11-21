<?php

require "../assets/includes/config.php";

if (!isset($_SESSION['admin_id'])) {
  header("Location: ./pages/login.php");
  exit;
}

include pathOf('admin/assets/includes/sidebar.php');
include pathOf('admin/assets/includes/header.php');


$id = $_SESSION['admin_id'];
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
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Assigned</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Priority</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Budget</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">1</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                    <span class="fw-normal">Web Designer</span>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">Elite Admin</p>
                  </td>
                  <td class="border-bottom-0">
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-primary rounded-3 fw-semibold">Low</span>
                    </div>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">$3.9</h6>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">2</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                    <span class="fw-normal">Project Manager</span>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">Real Homes WP Theme</p>
                  </td>
                  <td class="border-bottom-0">
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-secondary rounded-3 fw-semibold">Medium</span>
                    </div>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">$24.5k</h6>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">3</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Christopher Jamil</h6>
                    <span class="fw-normal">Project Manager</span>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">MedicalPro WP Theme</p>
                  </td>
                  <td class="border-bottom-0">
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-danger rounded-3 fw-semibold">High</span>
                    </div>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">$12.8k</h6>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">4</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                    <span class="fw-normal">Frontend Engineer</span>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">Hosting Press HTML</p>
                  </td>
                  <td class="border-bottom-0">
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-success rounded-3 fw-semibold">Critical</span>
                    </div>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">$2.4k</h6>
                  </td>
                </tr>
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