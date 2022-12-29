<?php $this->load->view('shared/header');
$this->load->view('shared/sidebar'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $data['title'] = 'Projects'; ?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <?php $this->load->view('shared/breadcrumb'); ?>
            <!-- end page title -->
            <div class="mt-1">
                <div class="card">
                    <h4 class=" card-header"><i class="mdi mdi-briefcase-check-outline"></i> &nbsp; Project Category</h4>
                    <div class="card-body">
                        <form action="<?= base_url('Project/create_project_category')?>" method="POST">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <?php (form_error('category')) ? $this->load->view('components/error_toster', ['error'=>form_error('category')]) : null ; ?>
                                    <label for="inputCategory" class="form-label">Category</label>
                                    <input type="text" class="form-control " id="inputCategory" placeholder="Project category" name="category">
                                </div>

                                <div class="mb-3 col-md-4">
                                <?php (form_error('status')) ? $this->load->view('components/error_toster', ['error'=>form_error('status')]) : null ; ?>
                                    <label for="inputStatus" class="form-label">Status</label>
                                    <select id="inputStatus" class="form-select" name="status">
                        
                                        <option value="active" selected>Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
                                </div>

                            </div>
                            
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
        </div> <!-- content -->


    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php $this->load->view('shared/rightsidebar'); ?>
<!-- Right bar overlay-->
<?php $this->load->view('shared/footer'); ?>

<!-- Script -->
<script>
    $(function () {
        
        $.ajax({
            type: "get",
        url: "<?= base_url('usermanagment/get_clients')?>",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            var $dropdown = $("#inputState");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.client_type));
                });
        }
    });
});
</script>