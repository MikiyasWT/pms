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
                        <h4 class="header-title">Users Data Table</h4>
                        <p class="text-muted font-13 mb-4">
                        </p>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
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
<!-- Script -->
<script type="text/javascript">
     $(document).ready(function(){
        $('#datatable-buttons').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>Usermanagment/get_users/'
          },
          'columns': [
             { data: 'Name' },
             { data: 'Email' },
             { data: 'Phone' },
             { data: 'Gender' },
             { data: 'Date of Birth' },
             { data: 'Role' },
             { data: 'Regesterd Date' },
             { data: 'Status' },
             { data: 'Action' }
          ]
        });
     });
     </script>