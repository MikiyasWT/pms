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
                                    <i class="mdi mdi-account-group mdi-24px"></i> Clients
                                </h4>
                            </div>
                            <!-- <button type="button" class="btn btn-success waves-effect waves-light btn-sm" id="toastr-five">Click me</button> -->
                            <div class="col-6" style="text-align: right">
                                <a class="col-2 col-sm-auto btn btn-info" href="<?= base_url('dashboard/client_create'); ?>"><i class="mdi mdi-account-multiple-plus-outline mdi-18px"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <!-- <div class="container-fluid">
                            <?php $data['error'] = $this->session->flashdata('error');
                            $data['message'] = $this->session->flashdata('message');
                            (empty($data['error'])) ? ((empty($data['message'])) ?:  $this->load->view('components/success_toster', $data)) : $this->load->view('components/error_toster', $data); ?>
                        </div> -->

                        <table id="demo-foo-addrow" class="table table-dark table-striped dt-responsive nowrap w-100 ">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Type</th>
                                    <th>Fax</th>
                                    <th>Contact person</th>
                                    <th>contact person number</th>
                                    <th>Contact person email</th>
                                    <th>Comments</th>
                                    <th>Created</th>
                                    <th>Created by</th>
                                    <th>Modified</th>
                                    <th>Modified by</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div> <!-- end card body-->
                    <!-- end card -->
                </div><!-- end col-->

                <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->


    </div>
    <?php $data['title'] = 'Clients'; ?>

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

        //data table populating
        usertable = $('#demo-foo-addrow').DataTable({
            processing: false,
            serverSide: true,
            serverMethod: 'get',
            ajax: {
                url: '<?= base_url('Master_client/get_clients') ?>',
                dataSrc: 'data'
            },
            columns: [{
                    "data": null,
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "phone"
                },
                {
                    "data": "address"
                },
                {
                    "data": "state"
                },
                {
                    "data": "city"
                },
                {
                    "data": "country"
                },
                {
                    "data": "client_type"
                },
                {
                    "data": "fax"
                },
                {
                    "data": "contact_person"
                },
                {
                    "data": "contact_person_number"
                },
                {
                    "data": "contact_person_email"
                },
                {
                    "data": "comments"
                },
                {
                    "data": "created"
                },
                {
                    "data": "created_by"
                },
                {
                    "data": "modified"
                },
                {
                    "data": "modified_by"
                },
                {
                    "data": "status",
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
                        return '<a href="<?= base_url("dashboard/client_detail"); ?>/' + row.id + '" class="btn btn-warning btn-xs waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-alert" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i></span>Edit</a>'
                    }
                }
            ]
        });
        setInterval(function() {
            usertable.ajax.reload(null, false);
        }, 10000);
        //toaster
        <?php if ($this->session->flashdata('error')) : ?>
            $.toast({
                heading: "Error",
                hideAfter: 3000,
                icon: "error",
                loaderBg: "#1ea69a",
                position: "top-right",
                stack: 1,
                text: "<?= $this->session->flashdata('message'); ?>"
            });
        <?php $this->session->unset_userdata('error');
            $this->session->unset_userdata('message');
        endif; ?>
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
        <?php $this->session->unset_userdata('success');
            $this->session->unset_userdata('message');
        endif; ?>
    });
</script>
<!-- Script -->