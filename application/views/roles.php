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
                        <div class="row justify-content-between m-2">
                            <h2 class="col-1 header-title">Roles</h2>
                            <div class="col">
                                <?php $data['error'] = $this->session->flashdata('error');
                                $data['message'] = $this->session->flashdata('message');
                                (empty($data['error'])) ? ((empty($data['message'])) ?:  $this->load->view('components/success_toster', $data)) : $this->load->view('components/error_toster', $data); ?>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">Insert</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-2">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Status</th>
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
                                            <td><span class="float-center"><span class="badge bg-<?= ($role['role_status'] == 'active') ? 'success' : 'danger'; ?>"><?= $role['role_status']; ?></span></span></td>
                                            <td><?= $role['created_at']; ?></td>
                                            <td><button data-id="<?= $role['id']; ?>" type="button" class="btn btn-warning btn-xs waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-alert"></i></span>Edit
                                                </button> &nbsp;
                                                <button type="button" <?= ($role['role_status'] == 'active') ? '' : 'disabled'; ?>  data-id="<?= $role['id']; ?>" class="btn-xs waves-effect waves-light btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger-alert-modal">
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
    $(".btn-warning").click(function(e) {
        e.preventDefault();
        id = $(this).data('id');
        // console.log(id)
        $("#con-close-modal").modal('show');
        $.ajax({
            type: "get",
            url: '<?= base_url("Usermanagment/update_role/"); ?>' + id,
            dataType: "JSON",
            success: function(response) {
                $(".modal-title").text("Update");
                $(".btn-info").text("Update changes");
                $('#role_edit').attr('action', "<?= base_url('Usermanagment/update_role/'); ?>" + id)
                $("#field-1").val(response.role_type);
                $("p").removeAttr("hidden");
            }
        });
    });
    $('#danger-alert-modal').on('show.bs.modal', function(e) { // when the delete modal opens
        var id = $(e.relatedTarget).data('id'); // get the id
        $(e.currentTarget).find('#role_del').attr('data-delete-id', id); // and put it in the delete button that calls the AJAX
        $("#role_del").click(function(e) {
            e.preventDefault();
            id = $(this).attr('data-delete-id');
            // console.log(id)
            // $("#danger-alert-modal").modal('show');
            $.ajax({
                type: "post",
                url: '<?= base_url("Usermanagment/del_role/"); ?>' + id,
                dataType: "JSON",
                success: function(response) {}
            });
            $(document).ajaxStop(function() {
                window.location.reload();
            });
        });
    });
</script>