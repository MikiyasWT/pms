<?php $this->load->view('shared/header');
$this->load->view('shared/sidebar'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <?php $this->load->view('shared/breadcrumb'); ?>
            <!-- end page title -->
            <div class="col-lg mt-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Roles</h4>
                        <p class="sub-header justify-content-end">
                        <button  type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">Insert</button> </p>
                        <div class="table-responsive">
                            <table class="table mb-2">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo (count($roles) <= 0) ? '<tr><td colspan="4">No Data Found</td></tr>' : '';
                                    foreach ($roles as $role) : ?>
                                        <tr>
                                            <th scope="row"><?= $role['id']; ?></th>
                                            <td><?= $role['role_type']; ?></td>
                                            <td><?= $role['created_at']; ?></td>
                                            <td><button type="button" class="btn btn-warning rounded-pill waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-alert"></i></span>Warning
                                                </button> &nbsp; <button type="button" class="btn btn-danger rounded-pill waves-effect waves-light">
                                                    Danger<span class="btn-label-right"><i class="mdi mdi-close-circle-outline"></i></span>
                                                </button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->
                    </div>
                </div> <!-- end card -->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->


</div>
<?php $this->load->view('components/role_modal.php');?>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php $this->load->view('shared/rightsidebar'); ?>
<!-- Right bar overlay-->
<?php $this->load->view('shared/footer'); ?>