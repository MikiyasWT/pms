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
                                    <i class="mdi mdi-clipboard-multiple mdi-24px"></i> Tasks
                                </h4>
                            </div>
                            <!-- <button type="button" class="btn btn-success waves-effect waves-light btn-sm" id="toastr-five">Click me</button> -->
                            <div class="col-6" style="text-align: right">
                                <a class="col-2 col-sm-auto btn btn-info py-1 m-0" href="<?= base_url('dashboard/create_tasks'); ?>"><i class="mdi mdi-book-plus-outline mdi-18px"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <table id="demo-foo-addrow" class="table table-dark table-striped dt-responsive nowrap w-100 ">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Project</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Duraiton</th>
                                    <th>Description</th>
                                    <th>Resources</th>
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
            processing: true,
            serverSide: true,
            serverMethod: 'get',
            ajax: {
                url: '<?= base_url('Task/get_tasks') ?>',
                dataSrc: 'data'
            },
            columns: [{
                    "data": null,
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    "data": "task_title"
                },
                {
                    "data": "task_project"
                },
                {
                    "data": "task_start_day"
                },
                {
                    "data": "task_end_day"
                },
                {
                    "data": "task_duration"
                },
                {
                    "data": "task_description"
                },
                {
                    "data": "task_resources",
                    render: function(data, type, row) {
                        var sanitized = '[' + data.replace(/}{/g, '},{') + ']';
                        var res = JSON.parse(sanitized);
                        var file = ''
                        res[0].map((element, i) => {
                            file += '<a href="<?= base_url() ?>/' + element + '" download class="btn btn-info btn-sm waves-effect waves-light">Resource ' + (i + 1) + '<span class="btn-label-right"><i class="mdi mdi-download"></i></span></a>&nbsp'
                        })
                        return file;
                    }
                },
                {
                    "data": "task_status",
                    render: function(data, type, row) {
                        // console.log(data)
                        color = '';
                        switch (data) {
                            case 'Active':
                                color = 'success';
                                break;
                            case 'Inactive':
                                color = 'secondary';
                                break;
                            case 'Running':
                                color = 'info';
                                break;
                            case 'Completed':
                                color = 'success';
                                break;
                            case 'Pending':
                                color = 'warning';
                                break;
                            case 'Rejected':
                                color = 'danger';
                                break;
                            case 'Approved':
                                color = 'success';
                                break;
                            case 'Confirmed':
                                color = 'primary';
                                break;
                            default:
                            color = 'primary';
                                break;
                        }
                        return '<span class="float-center"><span class="badge bg-' + color + '">' + data + '</span></span>'
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<a href="<?= base_url("dashboard/tasks_detail"); ?>/' + row.task_id + '" class="btn btn-warning btn-xs waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-alert" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i></span>Edit</a>'
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