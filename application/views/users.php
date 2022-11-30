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

            <div class="container-fluid mt-1">
                <div class="card">

                    <div class="card-body">
                        <div class="row justify-content-between m-2">
                            <h4 class="col-4 header-title">Users Data Table</h4>
                            <button class="col-lg-1 col-sm-auto btn btn-success mt-md-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Insert</button>
                        </div>
                        <div class="container-fluid">
                            <?php $data['error'] = $this->session->flashdata('error');
                            $data['message'] = $this->session->flashdata('message');
                            (empty($data['error'])) ? ((empty($data['message'])) ?:  $this->load->view('components/success_toster', $data)) : $this->load->view('components/error_toster', $data); ?>
                        </div>

                        <table id="demo-foo-addrow" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Role</th>
                                    <th>Regesterd Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->

            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->


</div>
<?php $data['title'] = 'User';
$this->load->view('components/delete_modal.php', $data); ?>
<?php $this->load->view('components/user_canvas.php'); ?>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php $this->load->view('shared/rightsidebar'); ?>
<!-- Right bar overlay-->
<?php $this->load->view('shared/footer'); ?>
<script>
    usertable = $('#demo-foo-addrow').DataTable({
        ajax: {
            url: '<?= base_url('Usermanagment/get_users') ?>',
            dataSrc: ''
        },
        columns: [
            // {
            //     "data": "id"
            // },
            {
                "data": "full_name"
            },
            {
                "data": "email"
            },
            {
                "data": "phone_num"
            },
            {
                "data": "gender"
            },
            {
                "data": "dob"
            },
            {
                "data": "role_type"
            },
            {
                "data": "register_date"
            },
            {
                "data": "user_status",
                render: function(data, type, row) {
                    // console.log(data)
                    color = '';
                    if (data == 'active') {
                        color = 'success'
                    } else {
                        color = 'danger';
                    }
                    return '<span class="float-center"><span class="badge bg-' + color + '">' + data + '</span></span>'
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    disabled = '';
                    if (row.user_status = 'active') {
                        disabled = ''
                    } else {
                        disabled = 'disabled';
                    }
                    return '<button type="button" data-id="' + row.id + '" class="btn btn-warning btn-xs waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-alert"></i></span>Edit</button> &nbsp;<button type="button" ' + disabled + ' data-id="' + row.id + '" class="btn-xs waves-effect waves-light btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger-alert-modal">Delete<span class="btn-label-right"><i class="mdi mdi-close-circle-outline"></i></span></button>'
                }
            }
        ]
    });
    $('.btn-warning').click(function(e) {
        e.preventDefault();
        id = $(this).data('id');
        console.log('id')
        $("#danger-alert-modal").modal('show');
        $.ajax({
            type: "get",
            url: '<?= base_url("Usermanagment/update_user/"); ?>' + id,
            dataType: "JSON",
            success: function(response) {
                $(".modal-title").text("Update");
                $(".btn-info").text("Update changes");
                $('#role_edit').attr('action', "<?= base_url('Usermanagment/update_user/'); ?>" + id)
                $("#field-1").val(response.role_type);
                $("p").removeAttr("hidden");
            }
        });
    });
    $.ajax({
        type: "get",
        url: "<?= base_url('Usermanagment/get_roles') ?>",
        dataType: "json",
        success: function(response) {
            console.log(response[0].role_type)
            var $dropdown = $("#floatingSelect");
            $.each(response, function() {
                $dropdown.append($("<option />").val(this.id).text(this.role_type));
            });
        }
    });

   
    //     setInterval( function () {
    //     usertable.ajax.reload();
    // }, 3000 );
    $('#danger-alert-modal').on('show.bs.modal', function(e) { // when the delete modal opens
        var id = $(e.relatedTarget).data('id'); // get the id
        $(e.currentTarget).find('#role_del').attr('data-delete-id', id); // and put it in the delete button that calls the AJAX
        $("#role_del").click(function(e) {
            e.preventDefault();
            id = $(this).attr('data-delete-id');
            console.log(id)
            $("#danger-alert-modal").modal('show');
            $.ajax({
                type: "post",
                url: '<?= base_url("Usermanagment/del_user/"); ?>' + id,
                dataType: "JSON",
                success: function(response) {
                    usertable.clear();
                    usertable.ajax.reload();
                    $('#sa-success').trigger('click');
                }
            });
            // $(document).ajaxStop(function() {
            //     // window.location.reload();

            // });
        });
    });
</script>
<!-- Script -->