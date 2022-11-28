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
                        <div class="container md-8">
                            <?php $data['error'] = $this->session->flashdata('error');
                            $data['message'] = $this->session->flashdata('message');
                            (empty($data['error'])) ? ((empty($data['message'])) ?:  $this->load->view('components/success_toster', $data)) : $this->load->view('components/error_toster', $data); ?>
                        </div>
                        <p class="sub-header justify-content-end">
                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">Insert</button>
                        </p>
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
                                            <td><button data-id = "<?= $role['id']; ?>" type="button" class="btn btn-warning btn-xs waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-alert"></i></span>Edit
                                    </button> &nbsp;
                                                <button type="button" data-id = "<?= $role['id']; ?>" class="btn-xs waves-effect waves-light btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger-alert-modal">
                                                    Delete<span class="btn-label-right"><i class="mdi mdi-close-circle-outline"></i></span>
                                                </button>
                                            </td>
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
<?php $this->load->view('components/delete_modal.php'); ?>
<?php $this->load->view('components/role_modal.php'); ?>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php $this->load->view('shared/rightsidebar'); ?>
<!-- Right bar overlay-->
<?php $this->load->view('shared/footer'); ?>
<script>
   $(".btn-warning").click(function (e) {
        e.preventDefault();
        id = $(this).data('id');
        // console.log(id)
        $("#con-close-modal").modal('show');
        $.ajax({
            type: "get",
            url: '<?= base_url("Usermanagment/update_role/");?>'+ id,
            dataType: "JSON",
            success: function (response) {
                $(".modal-title").text("Update");
                $(".btn-info").text("Update changes");
                $("#field-1").val(response.role_type);
                $('#role_edit').attr('action', "<?= base_url('Usermanagment/update_role/');?>" +id)
            }
        });
    });
    // $("#role_del").click(function (e) { 
    //     e.preventDefault();
    //     id = $(this).data('id');
    //     $("#danger-alert-modal").modal('show');
    //     $.ajax({
    //         type: "delete",
    //         url: '<?= base_url("Usermanagment/del_role/");?>'+ id,
    //         dataType: "JSON",
    //         success: function (response) {
    //             $(".modal-title").text("Update");
    //             $(".btn-info").text("Update changes");
    //             $("#field-1").val(response.role_type);
    //             $('#role_edit').attr('action', "<?= base_url('Usermanagment/update_role/');?>" +id)
    //         }
    //     });
    // });
</script>