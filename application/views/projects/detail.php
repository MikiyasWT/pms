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
                    <form action="<?= base_url('Project/update_project/' . $project->id) ?>" method="POST" class="needs-validation <?= $retVal = (set_value('name') != null) ?  'was-validated' : null; ?> " novalidate >
                        
                            <div class="row">



                                

                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputTitle" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="inputTitle" placeholder="Project title" name="title" pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" value="<?= $retVal = ($project->title) ? $project->title : "N/A"; ?>">
                                    <div class="invalid-feedback small">
                                    </div>

                                    <div class="invalid-tooltip">
                                        <?= (form_error('title')) ? strip_tags(form_error('title')) : 'Please enter Project Title.'; ?> </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <?php (form_error('client')) ? $this->load->view('components/error_toster', ['error' => form_error('client')]) : null; ?>
                                    <label for="inputClient" class="form-label">Client</label>
                                    <select id="inputClient" class="form-select" name="client" value="<?= $retVal = ($client->id) ? $client->id : "N/A"; ?>">
                                        <option value='' disabled selected>select Option</option>

                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <?php (form_error('project_category')) ? $this->load->view('components/error_toster', ['error' => form_error('project_category')]) : null; ?>
                                    <label for="inputProjectCategory" class="form-label">Project Category</label>
                                    <select id="inputProjectCategory" class="form-select" name="project_category" value="<?= $retVal = ($category->id) ? $category->id : ""; ?>">
                                        <option value='' disabled selected>select Option</option>


                                    </select>
                                </div>




                                <div class="col-md-4 mb-3">
                                    <?php (form_error('start_date')) ? $this->load->view('components/error_toster', ['error' => form_error('start_date')]) : null; ?>
                                    <label for="inputStart_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="inputStart_date" name="start_date" value="<?= $retVal = ($project->start_date) ? $project->start_date : "N/A"; ?>">
                                </div>

                                

                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputEnd_date" class="form-label">End Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control flatpickr-input active" id="inputEnd_date" required name="end_date" value="<?= $retVal = ($project->end_date) ? $project->end_date : "N/A"; ?>" disabled>
                                    <div class="invalid-feedback small">
                                    </div>

                                    <div class="invalid-tooltip">
                                        <?= (form_error('end_date')) ? strip_tags(form_error('end_date')) : 'Please enter valid end date .'; ?> </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <?php (form_error('status')) ? $this->load->view('components/error_toster', ['error' => form_error('status')]) : null; ?>
                                    <label for="inputStatus" class="form-label">Status</label>
                                    <select id="inputStatus" class="form-select" name="status" value="<?= $retVal = ($project->status) ? $project->status : "N/A"; ?>">

                                        <option value="active" selected>Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
                                </div>

                               

                                <div class="row mx-1 mb-5">

                                    <label for="inputDescription" class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="inputDescription" rows="5" pattern="[A-Za-z0-9]{1,500}" required placeholder="Project Description" name="description" value="<?php echo set_value('description'); ?>"><?= $retVal = ($project->description) ? $project->description : "N/A"; ?></textarea>



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
    $(function() {

        $.ajax({
            type: "get",
            url: "<?= base_url('Master_client/getListOfClientsId') ?>",
            data: "data",
            dataType: "json",
            success: function(response) {
                console.log(response[0].id)
                var $dropdown = $("#inputClient");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.name));
                });
                $("#inputClient").val(<?= $project->client; ?>).change();
            }
        });
    });

    $(function() {

        $.ajax({
            type: "get",
            url: "<?= base_url('Project/getProjectCategories') ?>",
            data: "data",
            dataType: "json",
            success: function(response) {
                console.log(response)
                var $dropdown = $("#inputProjectCategory");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.categories));
                });
                $("#inputProjectCategory").val(<?= $project->project_category; ?>).change();
            }
        });
    });



    $(function() {
        var spinner = $('#preloader');
        var load = $("#status");
        var form = $("needs-validation");
        form.submit(function(e) {
            console.log(e.result)
            if (e.result) {
                spinner.show();
                load.show();
            }
        })
        var start = $('#inputStart_date').val();
        var end = $('#inputEnd_date').val();
        let today = new Date().toISOString().split('T')[0]
        let tomorrow = new Date(today + 86400000);
        // $( "#inputStart_datse" ).attr('min',today);

        document.getElementById('inputStart_date').setAttribute('min', today);

    })


    $("#inputStart_date").on('change', function() {
        //alert( this.value ); 
        //let startdate = this.value
        //$('#inputStart_date').val().min = today  


        //   let start =  new Date(this.val);
        //   console.log(start)
        var checkInDate = $(this).val();
        var split = checkInDate.split('-');
        var tomorrow = new Date(split[0], split[1] - 1, parseInt(split[2]) + 2, 0, 0, 0, 0).toISOString().split('T')[0];
        //   var nextdate = new Date(next)
        //   $('#inputEnd_date').min =  nextdate;
        $('#inputEnd_date').removeAttr('disabled');
        console.log(tomorrow)
        document.getElementById('inputEnd_date').setAttribute('min', tomorrow);


    });


    $("#inputEnd_date").on('change', function() {


        data = {
            'start_date': "" + $('#inputStart_date').val() + "",
            'end_date': "" + $('#inputEnd_date').val() + ""
        }
        $.ajax({
            type: "get",
            url: "<?= base_url('Project/check_project_end_date') ?>",
            data: data,
            success: function(response) {

                if (response == false) {
                    //var start = $('#inputStart_date').val();

                    //style.borderColor = "red";
                    $('#inputEnd_date').css("borderColor", "red");


                }
            }
        });
    });
</script>