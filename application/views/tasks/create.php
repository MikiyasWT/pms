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
                                    <label for="inputState" class="form-label">Projects <span class="text-danger">*</span></label>
                                    <select id="inputState" class="form-select" required name="project">
                                        <option value="" disabled selected hidden>Select your option</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('type')) ? strip_tags(form_error('type')) : 'Please Select Client Type.'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="position-relative mb-4 col-md">
                                    <label for="inputAddress" class="form-label">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputAddress" pattern="^[a-zA-Z0-9\s,'-]*$" required placeholder="1234 Main St" name="address" value="<?php echo set_value('address'); ?>">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('address')) ? strip_tags(form_error('address')) : 'Please enter Address.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md">
                                    <label for="inputCity" class="form-label">State</label>
                                    <input type="text" class="form-control" id="inputCity" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" name="state" value="<?php echo set_value('state'); ?>">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('state')) ? strip_tags(form_error('state')) : 'Please enter State.'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="example-textarea" class="form-label">Description</label>
                                <textarea class="form-control" id="example-textarea" rows="5" name="description"><?= set_value('comment'); ?></textarea>
                                <div class="invalid-tooltip">
                                    <?= (form_error('comment')) ? strip_tags(form_error('comment')) : "Please Enter Comment."; ?>
                                </div>
                            </div>
                                <button type="submit" class="ml-4 btn btn-primary waves-effect waves-light">Create</button>
                            
                            <!-- <div class="row">
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputCity" class="form-label">Country</label>
                                    <input type="text" class="form-control" pattern="[a-zA-Z]{3,}" id="inputCity" name="country" required value="<?php echo set_value('country'); ?>">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('country')) ? strip_tags(form_error('country')) : 'Please enter Country.'; ?>
                                    </div>
                                </div>
                                
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputPassword4" class="form-label">Fax</label>
                                    <input type="text" data-toggle="input-mask" data-mask-format="0000000000" maxlength="14" class="form-control" id="inputPassword4" placeholder="0912345678" name="fax" value="<?php echo set_value('fax'); ?>">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('fax')) ? strip_tags(form_error('fax')) : 'Please Fax Number.'; ?>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="row">
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputname" class="form-label">Contact Person<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" id="inputname" required placeholder="Contact person Name" name="c_person" value="<?php echo set_value('c_person'); ?>">
                                    <div class="invalid-tooltip">
                                        Please Enter Contact Person's name.
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('c_person')) ? strip_tags(form_error('c_person')) : "Please Enter Contact Person's name."; ?>
                                    </div>
                                </div>
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputEmail" class="form-label">Contact Person Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control " id="inputEmail" required name="cp_email" placeholder="email" value="<?php echo set_value('cp_email'); ?>">
                                    <div class="invalid-tooltip">
                                        Please Enter Contact Person's email.
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('cp_email')) ? strip_tags(form_error('cp_email')) : "Please Enter Contact Person's email."; ?>
                                    </div>
                                </div>
                                <div class="position-relative col-md-4 mb-4">
                                    <?php (form_error('cp_number')) ? $this->load->view('components/error_toster', ['error' => form_error('cp_number')]) : null; ?>
                                    <label for="inputPassword4" class="form-label">Contact Person Phone<span class="text-danger">*</span></label>
                                    <input type="text" data-toggle="input-mask" data-mask-format="0000000000" required maxlength="14" class="form-control" id="inputPassword4" placeholder="0912345678" name="cp_number" value="<?php echo set_value('cp_number'); ?>">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('cp_number')) ? strip_tags(form_error('cp_number')) : "Please Enter Contact Person's phone."; ?>
                                    </div>
                                </div>
                            </div> -->
                            
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
            url: "<?= base_url('usermanagment/get_clients') ?>",
            data: "data",
            dataType: "json",
            success: function(response) {
                console.log(response)
                var $dropdown = $("#inputState");
                $.each(response, function() {
                    $dropdown.append($("<option />").val(this.id).text(this.client_type));
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