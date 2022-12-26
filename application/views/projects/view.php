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
                                <i class="mdi mdi-briefcase-check-outline"></i> Projects
                                </h4>
                            </div>
                            <div class="col-6" style="text-align: right">
                                <a class="col-2 col-sm-auto btn btn-info py-1 m-0" href="<?= base_url('dashboard/create_project'); ?>"><i class="mdi mdi-briefcase-check-outline">+</i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="container-fluid">
                            <?php $data['error'] = $this->session->flashdata('error');
                            $data['message'] = $this->session->flashdata('message');
                            (empty($data['error'])) ? ((empty($data['message'])) ?:  $this->load->view('components/success_toster', $data)) : $this->load->view('components/error_toster', $data); ?>
                        </div>

                        <table id="demo-foo-addrow" class="table table-dark table-striped dt-responsive nowrap w-100 ">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Client</th>
                                    <th>Project Category</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
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
    <?php $data['title'] = 'Projects'; ?>

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
        usertable = $('#demo-foo-addrow').DataTable({
            processing: true,
            serverSide: true,
            serverMethod: 'get',
            ajax: {
                url: '<?= base_url('Project/get_projects') ?>',
                dataSrc: 'data'
            },
            columns: [{
                    "data": null,
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    "data": "title"
                },
                {
                    "data": "description"
                },
                {
                    "data": "name"
                },
                {
                    "data": "categories"
                },
                {
                    "data": "start_date"
                },
                {
                    "data": "end_date"
                },
                {
                    "data": "created"
                },
                {
                    "data": "full_name"
                },
                {
                    "data": "modified"
                },
                {
                    "data": "full_name"
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
                        return '<a href="<?= base_url("dashboard/project_detail"); ?>/'+row.id+'" class="btn btn-warning btn-xs waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-alert" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i></span>Edit</a>'
                    }
                }
            ]
        });
        setInterval(function() {
            usertable.ajax.reload(null, false);
        }, 10000);


    });
</script>
<!-- Script -->