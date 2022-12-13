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
                    <h4 class=" card-header"><i class="mdi mdi-account"></i> &nbsp;Update Project</h4>
                    <div class="card-body">
                        <form action="<?= base_url('Project/update_project/' . $project->id) ?>" method="POST">
                            <div class="row">

                                

                                <div class="col-md-4 mb-3">
                                    <?php (form_error('title')) ? $this->load->view('components/error_toster', ['error'=>form_error('title')]) : null ; ?>
                                    <label for="inputTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control " id="inputTitle" placeholder="Project title" name="title" value="<?= $retVal = ($project->title) ? $project->title : "N/A"; ?>" >
                                </div>

                                <div class="mb-3 col-md-4">
                                <?php (form_error('client')) ? $this->load->view('components/error_toster', ['error'=>form_error('client')]) : null ; ?>
                                    <label for="inputClient" class="form-label">Client</label>
                                    <select id="inputClient" class="form-select" name="client" value="<?= $retVal = ($client->id) ? $client->id: "N/A"; ?>" >
                                        <option><?= $client->name ?></option>

                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                <?php (form_error('project_category')) ? $this->load->view('components/error_toster', ['error'=>form_error('project_category')]) : null ; ?>
                                    <label for="inputProjectCategory" class="form-label">Project Category</label>   
                                    <select id="inputProjectCategory" class="form-select" name="project_category" value="<?= $retVal = ($category->id) ? $category->id: "N/A"; ?>">
                                        <option><?= $category->categories ?></option> 
                                         
                                    </select>
                                </div>

    


                                <div class="col-md-4 mb-3">
                                <?php (form_error('start_date')) ? $this->load->view('components/error_toster', ['error'=>form_error('start_date')]) : null ; ?>
                                    <label for="inputStart_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="inputStart_date"  name="start_date" value="<?= $retVal = ($project->start_date) ? $project->start_date : "N/A"; ?>">
                                </div>

                                <div class="col-md-4 mb-3">
                                <?php (form_error('end_date')) ? $this->load->view('components/error_toster', ['error'=>form_error('end_date')]) : null ; ?>
                                    <label for="inputEnd_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="inputEnd_date"  name="end_date" value="<?= $retVal = ($project->end_date) ? $project->end_date : "N/A"; ?>">
                                </div>

                                <div class="mb-3 col-md-4">
                                <?php (form_error('status')) ? $this->load->view('components/error_toster', ['error'=>form_error('status')]) : null ; ?>
                                    <label for="inputStatus" class="form-label">Status</label>
                                    <select id="inputStatus" class="form-select" name="status" value="<?= $retVal = ($project->status) ? $project->status : "N/A"; ?>" >
                        
                                        <option value="active" selected>Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                <?php (form_error('description')) ? $this->load->view('components/error_toster', ['error'=>form_error('description')]) : null ; ?>
                                    <label for="inputDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="inputDescription" rows="5" name="description" value="<?= $retVal = ($project->description) ? $project->description : "N/A"; ?>"></textarea>
                                </div>

                                
                            </div>
                            
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>

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
        url: "<?= base_url('Master_client/getListOfClientsId')?>",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            var $dropdown = $("#inputClient");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.name));
                });
        }
    });
});

    $(function () {
        
        $.ajax({
            type: "get",
        url: "<?= base_url('Project/getProjectCategories')?>",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            var $dropdown = $("#inputProjectCategory");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.categories));
                });
        }
    });
});
</script>