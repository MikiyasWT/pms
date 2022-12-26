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
                    <h4 class=" card-header"><i class="mdi mdi-briefcase-check-outline"></i> &nbsp; Project</h4>
                    <div class="card-body">
                        <form action="<?= base_url('Project/create_project') ?>" class="needs-validation <?= $retVal = (set_value('name') != null) ?  'was-validated' : null; ?> " novalidate method="POST">

                            <div class="row">

                                <!-- <div class="col-md-4 mb-3">
                                    <?php (form_error('title')) ? $this->load->view('components/error_toster', ['message' => form_error('title')]) : null; ?>
                                    <label for="inputTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control " id="inputTitle" placeholder="Project title" name="title">
                                </div> -->

                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputTitle" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" title="Only title is allowed" id="inputTitle" required placeholder="Project TItle" name="title" value="<?php echo set_value('title'); ?>">
                                    <div class="invalid-feedback small">
                                    </div>

                                    <div class="invalid-tooltip">
                                        <?= (form_error('title')) ? strip_tags(form_error('title')) : 'Please enter Project Title.'; ?> </div>
                                </div>

                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputClient" class="form-label">Client <span class="text-danger">*</span></label>
                                    <select id="inputClient" class="form-select" required name="client">
                                        <option value="" disabled selected hidden>Select client</option>
                                    </select>

                                    <div class="invalid-tooltip">
                                        <?= (form_error('client')) ? strip_tags(form_error('client')) : 'Please Select Client.'; ?>
                                    </div>
                                </div>

                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputProjectCategory" class="form-label">project Category<span class="text-danger">*</span></label>
                                    <select id="inputProjectCategory" class="form-select" required name="project_category">
                                        <option value="" disabled selected hidden>Select project category</option>
                                    </select>

                                    <div class="invalid-tooltip">
                                        <?= (form_error('project_category')) ? strip_tags(form_error('project_category')) : 'Please Select project category.'; ?>
                                    </div>
                                </div>

                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputStart_date" class="form-label">Start Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control flatpickr-input active" id="inputStart_date" required name="start_date">

                                    <div class="invalid-feedback small">
                                    </div>

                                    <div class="invalid-tooltip">
                                        <?= (form_error('start_date')) ? strip_tags(form_error('start_date')) : 'Please enter valid start date .'; ?> </div>
                                </div>

                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputEnd_date" class="form-label">End Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control flatpickr-input active" id="inputEnd_date" required name="end_date" disabled>
                                    <div class="invalid-feedback small">
                                    </div>

                                    <div class="invalid-tooltip">
                                        <?= (form_error('end_date')) ? strip_tags(form_error('end_date')) : 'Please enter valid end date .'; ?> </div>
                                </div>


                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputStatus" class="form-label">Status<span class="text-danger">*</span></label>
                                    <select id="inputStatus" class="form-select" id="inputStatus" required name="status" value="<?php echo set_value('status'); ?>">

                                        <option value="active" selected>Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
                                    <div class="invalid-feedback small">
                                    </div>

                                    <div class="invalid-tooltip">
                                        <?= (form_error('status')) ? strip_tags(form_error('status')) : 'Please select project status .'; ?> </div>
                                </div>





                            </div>

                            <div class="row mx-1 mb-5">

                                <label for="inputDescription" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="inputDescription" rows="5" pattern="[A-Za-z0-9]{1,5}" required placeholder="Project Description" name="description" value="<?php echo set_value('description'); ?>"></textarea>



                            </div>



                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Create</button>

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
    // function populateEndDate(){
    //     var start = $('#inputStart_date').val();
    //     var end = $('#inputEnd_date').val(); 

    //     if((new Date(start).getTime() < new Date(end).getTime())){


    //           return $( "#inputEnd_date" ).datepicker({dateFormat:"yy/mm/dd"}).datepicker("setDate",approximateEndDate);

    //         }
    //     }


    $(function() {

        $.ajax({
            type: "get",
            url: "<?= base_url('Master_client/getListOfClientsId') ?>",
            data: "data",
            dataType: "json",
            success: function(response) {
                console.log(response)
                var $dropdown = $("#inputClient");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.name));
                });
            }
        });
    });



    ////getProjectCategories
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
            }
        });
    });

    // $(function() {
    //                     $("#inputStart_date").datepicker({});
    //                 });

    //                 $(function() {
    //                     $("#inputEnd_date").datepicker({});
    //                 });

    // $('#inputStart_date').change(function() {
    //                     startDate = $(this).datepicker('getDate');
    //                     console.log(startDate)
    //                     $("#inputEnd_date").datepicker("option", "minDate", startDate);
    //                 })

    //                 $('#inputEnd_date').change(function() {
    //                     endDate = $(this).datepicker('getDate');
    //                     console.log(endDate)
    //                     $("#inputStart_date").datepicker("option", "maxDate", endDate);
    //                 })
    //$( "#inputStart_date" ).defaultValue=new Date();
    $(function() {
        var start = $('#inputStart_date').val();
        var end = $('#inputEnd_date').val();
        let today = new Date().toISOString().split('T')[0]
        let tomorrow = new Date(today + 86400000);
        // $( "#inputStart_datse" ).attr('min',today);

        document.getElementById('inputStart_date').setAttribute('min', today);
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