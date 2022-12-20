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
                    <h4 class=" card-header"><i class="mdi mdi-account"></i> &nbsp; Client</h4>
                    <div class="card-body">
                        <form action="<?= base_url('master_client/create_client') ?>" class="needs-validation <?= $retVal = (set_value('name') != null) ?  'was-validated' : null; ?> " novalidate method="POST">
                            <div class="row">
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="validationTooltip01" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" title="Only Name is allowed" id="validationTooltip01" required placeholder="Client Name" name="name" value="<?php echo set_value('name'); ?>">
                                    <div class="invalid-feedback small">
                                    </div>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('name')) ? strip_tags(form_error('name')) : 'Please enter first name.'; ?> </div>
                                </div>
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputEmail4" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control " value="<?php echo set_value('email'); ?>" id="inputEmail4" required placeholder="Email" name="email">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('name')) ? strip_tags(form_error('email')) : 'Please enter email.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputPhone" class="form-label">Phone<span class="text-danger">*</span></label>
                                    <input type="text" data-toggle="input-mask" required data-mask-format="0000000000" maxlength="14" class="form-control" id="inputPhone" placeholder="0912345678" name="phone" value="<?php echo set_value('phone'); ?>">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('phone')) ? strip_tags(form_error('phone')) : 'Please enter Phone.'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputAddress" class="form-label">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputAddress" pattern="^[a-zA-Z0-9\s,'-]*$" required placeholder="1234 Main St" name="address" value="<?php echo set_value('address'); ?>">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('address')) ? strip_tags(form_error('address')) : 'Please enter Address.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input type="text" class="form-control" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" id="inputCity" name="city" value="<?php echo set_value('city'); ?>">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        Please enter City.
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('city')) ? strip_tags(form_error('city')) : 'Please enter City.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputCity" class="form-label">State</label>
                                    <input type="text" class="form-control" id="inputCity" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" name="state" value="<?php echo set_value('state'); ?>">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('state')) ? strip_tags(form_error('state')) : 'Please enter State.'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputCity" class="form-label">Country</label>
                                    <input type="text" class="form-control" pattern="[a-zA-Z]{3,}" id="inputCity" name="country" value="<?php echo set_value('country'); ?>">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('country')) ? strip_tags(form_error('country')) : 'Please enter Country.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative mb-4 col-md-4">
                                    <label for="inputState" class="form-label">Client Type <span class="text-danger">*</span></label>
                                    <select id="inputState" class="form-select" required name="type">
                                        <option value="" disabled selected hidden>Select your option</option>
                                    </select>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('type')) ? strip_tags(form_error('type')) : 'Please Select Client Type.'; ?>
                                    </div>
                                </div>
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputPassword4" class="form-label">Fax</label>
                                    <input type="text" data-toggle="input-mask" data-mask-format="0000000000" maxlength="14" class="form-control" id="inputPassword4" placeholder="0912345678" name="fax" value="<?php echo set_value('fax'); ?>">
                                    <div class="invalid-tooltip">
                                        <?= (form_error('fax')) ? strip_tags(form_error('fax')) : 'Please Fax Number.'; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="position-relative col-md-4 mb-4">
                                    <label for="inputname" class="form-label">Contact Person<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" id="inputname" required placeholder="Contact person Name" name="c_person" value="<?php echo set_value('c_person'); ?>">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
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
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
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
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        <?= (form_error('cp_number')) ? strip_tags(form_error('cp_number')) : "Please Enter Contact Person's phone."; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="example-textarea" class="form-label">Comments</label>
                                <textarea class="form-control" id="example-textarea" rows="5" name="comments"><?= set_value('comment'); ?></textarea>
                                <div class="invalid-tooltip">
                                    <?= (form_error('comment')) ? strip_tags(form_error('comment')) : "Please Enter Comment."; ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
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
        var spinner = $('#preloader');
        var load = $("#status");
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
        // $('.needs-validation').submit(function(e) {
        //     // e.preventDefault();
        //     spinner.show();
        //     laod.show();
        //     console.log('show')
        // }).done(() => {
        //     spinner.hide()
        //     load.hide()
        // })
    });
</script>