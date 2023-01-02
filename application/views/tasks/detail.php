<?php $this->load->view('shared/header');
$this->load->view('shared/sidebar'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $data['title'] = 'Task Update'; ?>

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <?php $this->load->view('shared/breadcrumb'); ?>
            <!-- end page title -->
            <div class="mt-1">
                <div class="card">
                    <h4 class=" card-header"><i class="mdi mdi-clipboard-outline"></i> &nbsp;Update Task</h4>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="<?= base_url('task/update/') . $task->task_id ?>" class="needs-validation <?= $retVal = (set_value('title') != null) ?  'was-validated' : null; ?> " novalidate method="POST" id="create_client">
                            <div class="row">
                                <div class="position-relative col-md mb-4">
                                    <label for="validationTooltip01" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " pattern="[a-zA-Z ][a-zA-Z ]+[a-zA-Z]$" title="Only Title is allowed" id="validationTooltip01" required placeholder="Task Title" name="title" value="<?= $retVal = (set_value('title') == null) ? $task->task_title : set_value('title'); ?>">
                                    <div class="invalid-feedback small">
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('title')) ? strip_tags(form_error('title')) : 'Please enter title.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md">
                                    <label for="inputproject" class="form-label">Projects <span class="text-danger">*</span></label>
                                    <select id="inputproject" class="form-select" required name="project">
                                        <option value="" disabled selected hidden>Select your option</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('project')) ? strip_tags(form_error('project')) : 'Please Select project.'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputtext" class="form-label">Start Date<span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control " value="<?= $retVal = (set_value('s_date') == null) ? $task->task_start_day : set_value('s_date'); ?>" id="inputtext" required placeholder="Start date" name="s_date">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('s_date')) ? strip_tags(form_error('s_date')) : 'Please enter Start date.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputtext2" class="form-label">End Date<span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control " value="<?= $retVal = (set_value('e_date') == null) ? $task->task_end_day : set_value('e_date'); ?>" id="inputtext2" required placeholder="End Date" name="e_date">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('e_date')) ? strip_tags(form_error('e_date')) : 'Please enter End date.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputduration" class="form-label">Duration</label>
                                    <input type="text" id="inputduration" class="form-control" readonly="" name="duration" value="<?= $retVal = (set_value('duration') == null) ? $task->task_duration : set_value('duration'); ?>">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('duration')) ? strip_tags(form_error('duration')) : 'Please select duration.'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="example-textarea" class="form-label">Description</label>
                                    <textarea class="form-control" id="example-textarea" rows="5" name="description"><?= $retVal = (set_value('description') == null) ? $task->task_description : set_value('description'); ?></textarea>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('description')) ? strip_tags(form_error('description')) : "Please Enter description."; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputrescource" class="form-label">Resources <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="inputrescource" multiple="" name="files[]">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('resources')) ? strip_tags(form_error('resources')) : 'Please enter resources.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputstatus" class="form-label">Task Status<span class="text-danger">*</span></label>
                                    <select class="form-control form-select" id="inputstatus" name="status" required>
                                        <option selected="" value="" disabled>Open this select menu</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('status')) ? strip_tags(form_error('status')) : 'Please select status.'; ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ml-4 btn btn-primary waves-effect waves-light">Update</button>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
        </div> <!-- content -->
    </div>
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
        var today = new Date().toISOString().slice(0, 16);
        // console.log(today)
        // document.getElementById("inputtext").min = today;
        // $('#inputtext').attr('min',today)
        $('#inputtext').on('change', function() {
            $('#inputtext2').attr('min', $('#inputtext').val())
            // document.getElementById("inputtext2").min = $('#inputtext').val();
            $("#inputtext2").removeAttr('disabled');
        })
        $('#inputtext2').on('change', function() {
            data = {
                'e_date': "" + $('#inputtext2').val() + "",
                's_date': "" + $('#inputtext').val() + ""
            }
            // console.log($('#inputtext2').val())
            $.ajax({
                type: "get",
                url: "<?= base_url('task/validate_date') ?>",
                data: data,
                success: function(response) {
                    console.log(response)
                    $('#inputduration').val(response);
                }
            });
        })
        $.ajax({
            type: "get",
            url: "<?= base_url('project') ?>",
            data: "data",
            dataType: "json",
            success: function(response) {
                // console.log(response)
                var $dropdown = $("#inputproject");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.title));
                });
            }
        });
        $("#inputproject").val('<?= $task->task_project; ?>').change();
        $.ajax({
            type: "get",
            url: "<?= base_url('task/get_status') ?>",
            data: "data",
            dataType: "json",
            success: function(response) {
                console.log(response)
                var $dropdown = $("#inputstatus");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.m_status));
                });
            }
        });
        $("#inputstatus").val('<?= $task->task_status; ?>').change();
        //toaster
        <?php if ($this->session->flashdata('error')) : ?>
            $.toast({
                heading: "Error",
                hideAfter: 3000,
                icon: "error",
                loaderBg: "#1ea69a",
                position: "top-right",
                stack: 1,
                text: '<?= $this->session->flashdata('error');?>'
            });
        <?php endif; ?>
        var spinner = $('#preloader');
        var load = $("#status");
        var form = $("#create_client");
        form.submit(function(e) {
            // e.preventDefault()
            console.log(e)
            // if (e.result) {
            //     spinner.show();
            //     load.show();
            // }
        })
    });
</script>