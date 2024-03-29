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
                    <div class="card-header p-2">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <h4>
                                    <i class="mdi mdi-account-multiple"></i> Users
                                </h4>
                            </div>
                            <div class="col-6" style="text-align: right">
                                <button class="btn btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="mdi mdi-account-plus-outline mdi-18px"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <table id="demo-foo-addrow" class="table table-dark table-striped dt-responsive nowrap w-100 ">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
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
    $(function() {
        //when edit button clicked
        myOffcanvas = document.getElementById('offcanvasRight')
        bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
        $('.btn-info').click(function(e) {
            e.preventDefault();
            $("#offcanvasRightLabel").text("Insert User");
            $(".btn-success").text("Insert changes");
            $('#user_edit').attr('action', "<?= base_url('Usermanagment/insert_user'); ?>")
            $("#floatingPassword").val(null);
            $("#floatingInput").val(null);
            $("#floatingTextarea2").val(null);
            $("#dob").val(null);
            $('#customRadio1').prop('checked', false)
            $('#customRadio2').prop('checked', false)
            $("#floatingSelect").val('').change();
            $("#user_sts").val('').change();
            // $('lable').hide();
            $(".user_sts").attr("hidden", true);
        });
        usertable = $('#demo-foo-addrow').DataTable({
            processing: false,
            serverSide: true,
            serverMethod: 'get',
            ajax: {
                url: '<?= base_url('Usermanagment/get_users') ?>',
                dataSrc: 'data'
            },
            columns: [{
                    "data": null,
                    render: (data, type, row, meta) => meta.row + 1
                },
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
                        if (row.user_status !== 'active') disabled = 'disabled';
                        return '<button onclick="offcanvas_edit(' + row.id + ')" type="button" data-id="' + row.id + '" class="btn btn-warning btn-xs waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-alert" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i></span>Edit</button> &nbsp;<button type="button" ' + disabled + ' data-id="' + row.id + '" class="btn-xs waves-effect waves-light btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger-alert-modal">Delete<span class="btn-label-right"><i class="mdi mdi-close-circle-outline"></i></span></button>'
                    }
                }
            ],
            columnDefs: [{
                    responsivePriority: 2,
                    targets: 8
                },
                {
                    responsivePriority: 1,
                    targets: 1
                },
            ],
        });
        setInterval(function() {
            usertable.ajax.reload(null, false);
        }, 10000);
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



        $('#danger-alert-modal').on('show.bs.modal', function(e) { // when the delete modal opens
            var id = $(e.relatedTarget).data('id'); // get the id
            $(e.currentTarget).find('#role_del').attr('data-delete-id', id); // and put it in the delete button that calls the AJAX
        });
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
                    <?php $this->session->set_flashdata('message', strip_tags(validation_errors())); ?>
                    usertable.destroy(true)
                    usertable.ajax.reload();
                    // window.location.reload();
                    $(document).ajaxStop(function() {
                        // window.location.reload();

                    });
                }
            });
        });
        //toaster
        <?php if ($this->session->flashdata('error')) : ?>
            $.toast({
                heading: "Error",
                hideAfter: 3000,
                icon: "info",
                loaderBg: "#1ea69a",
                position: "top-right",
                stack: 1,
                text: "<?= $this->session->flashdata('message'); ?>" || 'Form error'
            });
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            $.toast({
                heading: "Well Done!",
                hideAfter: 3000,
                icon: "success",
                loaderBg: "#5ba035",
                position: "top-right",
                stack: 1,
                text: "<?= $this->session->flashdata('message'); ?>"
            });
        <?php endif; ?>
    });
    //retriving user for ready to be edited
    function offcanvas_edit(id) {
        console.log(id)
        // console.log('id')
        // $("#offcanvasRight").modal('show');
        bsOffcanvas.show()
        $.ajax({
            type: "get",
            url: '<?= base_url("Usermanagment/update_user/"); ?>' + id,
            dataType: "JSON",
            success: function(response) {
                $("#offcanvasRightLabel").text("Update User");
                $(".btn-success").text("Update changes");
                $('#user_edit').attr('action', "<?= base_url('Usermanagment/update_user/'); ?>" + id)
                $("#floatingPassword").val(response.full_name);
                $("#floatingInput").val(response.email);
                $("#floatingTextarea2").val(response.phone_num);
                $("#dob").val(response.dob);
                (response.gender == 'male') ? $('#customRadio1').prop('checked', true): $('#customRadio2').prop('checked', true)
                $("#floatingSelect").val(response.role).change();
                $("#user_sts").val(response.user_status).change();
                $('lable').hide();
                $(".user_sts").removeAttr("hidden");
                console.log(response)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }
</script>
<!-- Script -->