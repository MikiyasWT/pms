<?php $this->load->view('shared/header');
$this->load->view('shared/sidebar'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $data['title'] = 'Clients'; ?>

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <?php $this->load->view('shared/breadcrumb'); ?>
            <!-- end page title -->
            <div class="mt-1">
                <div class="card">
                    <h4 class=" card-header"><i class="mdi mdi-clipboard-check"></i> &nbsp; Task</h4>
                    <div class="card-body">
                        <form action="<?= base_url('master_client/create_client') ?>" class="needs-validation <?= $retVal = (set_value('Title') != null) ?  'was-validated' : null; ?> " novalidate method="POST" id="create_client">
                            <div class="row">
                                <div class="position-relative col-md mb-4">
                                    <label for="validationTooltip01" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" title="Only Title is allowed" id="validationTooltip01" required placeholder="Task Title" name="title" value="<?php echo set_value('title'); ?>">
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
                                        <?= (form_error('type')) ? strip_tags(form_error('type')) : 'Please Select Client Type.'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputtext" class="form-label">Start Date<span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control " value="<?php echo set_value('s_date'); ?>" id="inputtext" required placeholder="Start date" name="s_date">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('s_date')) ? strip_tags(form_error('s_date')) : 'Please enter Start date.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputtext2" class="form-label">End Date<span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control " value="<?php echo set_value('e_date'); ?>" id="inputtext2" required placeholder="End Date" name="e_date">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('e_date')) ? strip_tags(form_error('e_date')) : 'Please enter End date.'; ?>
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
                            <div class="row">
                                <div class="position-relative mb-4 col-md-6">
                                    <label for="inputrescource" class="form-label">Resources <span class="text-danger">*</span></label>
                                    <div class="dropify-wrapper" style="height: 314px;">
                                        <div class="dropify-message"><span class="file-icon">
                                                <p>Drag and drop a file here or click</p>
                                            </span>
                                            <p class="dropify-error">Ooops, something wrong appended.</p>
                                        </div>
                                        <div class="dropify-loader"></div>
                                        <div class="dropify-errors-container">
                                            <ul></ul>
                                        </div><input type="file" multiple data-plugins="dropify"><button type="button" class="dropify-clear">Remove</button>
                                        <div class="dropify-preview"><span class="dropify-render"></span>
                                            <div class="dropify-infos">
                                                <div class="dropify-infos-inner">
                                                    <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>
                                                    <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('resources')) ? strip_tags(form_error('resources')) : 'Please enter resources.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md-6">
                                    <label for="example-textarea" class="form-label">Description</label>
                                    <textarea class="form-control" id="example-textarea" rows="5" name="description"><?= set_value('comment'); ?></textarea>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('comment')) ? strip_tags(form_error('comment')) : "Please Enter Comment."; ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ml-4 btn btn-primary waves-effect waves-light align-self-end">Create</button>
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
        $.ajax({
            type: "get",
            url: "<?= base_url('projects') ?>",
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
        var spinner = $('#preloader');
        var load = $("#status");
        var form = $("#create_client");
        form.submit(function(e) {
            console.log(e.result)
            if (e.result) {
                spinner.show();
                load.show();
            }
        })
    });
</script>