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
                    <h4 class=" card-header"><i class="mdi mdi-account"></i> &nbsp;Update Client</h4>
                    <div class="card-body">
                        <form action="<?= base_url('master_client/update_client/' . $mc->id) ?>" method="POST">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <?php (form_error('name')) ? $this->load->view('components/error_toster', ['error' => form_error('name')]) : null; ?>
                                    <label for="inputEmail4" class="form-label">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " pattern="/^[a-zA-Z ]*$/" title="Only Name is allowed" id="inputEmail4" placeholder="Client Name" name="name" value="<?= $retVal = ($mc->name) ? $mc->name : "N/A"; ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?php (form_error('email')) ? $this->load->view('components/error_toster', ['error' => form_error('email')]) : null; ?>
                                    <label for="inputEmail4" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input value="<?= $retVal = ($mc->email) ? $mc->email : "N/A"; ?>" type="email" class="form-control " id="inputEmail4" placeholder="Email" name="email">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?php (form_error('phone')) ? $this->load->view('components/error_toster', ['error' => form_error('phone')]) : null; ?>
                                    <label for="inputPassword4" class="form-label">Phone<span class="text-danger">*</span></label>
                                    <input value="<?= $retVal = ($mc->phone) ? $mc->phone : "N/A"; ?>" type="text" data-toggle="input-mask" data-mask-format="0000000000" maxlength="14" class="form-control" id="inputPassword4" placeholder="0912345678" name="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <?php (form_error('city')) ? $this->load->view('components/error_toster', ['error' => form_error('city')]) : null; ?>
                                    <label for="inputCity" class="form-label">City</label>
                                    <input value="<?= $retVal = ($mc->city) ? $mc->city : "N/A"; ?>" type="text" class="form-control" id="inputCity" name="city">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <?php (form_error('state')) ? $this->load->view('components/error_toster', ['error' => form_error('state')]) : null; ?>
                                    <label for="inputCity" class="form-label">State</label>
                                    <input value="<?= $retVal = ($mc->state) ? $mc->state : "N/A"; ?>" type="text" class="form-control" id="inputCity" name="state">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <?php (form_error('address')) ? $this->load->view('components/error_toster', ['error' => form_error('address')]) : null; ?>
                                    <label for="inputAddress" class="form-label">Address<span class="text-danger">*</span></label>
                                    <input value="<?= $retVal = ($mc->address) ? $mc->address : "N/A"; ?>" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <?php (form_error('country')) ? $this->load->view('components/error_toster', ['error' => form_error('country')]) : null; ?>
                                    <label for="inputCity" class="form-label">Country</label>
                                    <input value="<?= $retVal = ($mc->country) ? $mc->country : "N/A"; ?>" type="text" class="form-control" id="inputCity" name="country">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <?php (form_error('type')) ? $this->load->view('components/error_toster', ['error' => form_error('type')]) : null; ?>
                                    <label for="inputState" class="form-label">Client Type<span class="text-danger">*</span></label>
                                    <select id="inputState" class="form-select" name="type">
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?php (form_error('fax')) ? $this->load->view('components/error_toster', ['error' => form_error('fax')]) : null; ?>
                                    <label for="inputPassword4" class="form-label">Fax</label>
                                    <input value="<?= $retVal = ($mc->fax) ? $mc->fax : "N/A"; ?>" type="text" data-toggle="input-mask" data-mask-format="0000000000" maxlength="14" class="form-control" id="inputPassword4" placeholder="0912345678" name="fax">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <?php (form_error('c_person')) ? $this->load->view('components/error_toster', ['error' => form_error('c_person')]) : null; ?>
                                    <label for="inputEmail4" class="form-label">Contact Person<span class="text-danger">*</span></label>
                                    <input value="<?= $retVal = ($mc->contact_person) ? $mc->contact_person : "N/A"; ?>" type="text" class="form-control " id="inputEmail4" placeholder="Contact person Name" name="c_person">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?php (form_error('cp_email')) ? $this->load->view('components/error_toster', ['error' => form_error('cp_email')]) : null; ?>
                                    <label for="inputEmail4" class="form-label">Contact Person Email<span class="text-danger">*</span></label>
                                    <input value="<?= $retVal = ($mc->contact_person_email) ? $mc->contact_person_email : "N/A"; ?>" type="email" class="form-control " id="inputEmail4" name="cp_email" placeholder="email">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?php (form_error('cp_number')) ? $this->load->view('components/error_toster', ['error' => form_error('cp_number')]) : null; ?>
                                    <label for="inputPassword4" class="form-label">Contact Person Phone<span class="text-danger">*</span></label>
                                    <input value="<?= $retVal = ($mc->contact_person_number) ? $mc->contact_person_number : "N/A"; ?>" type="text" data-toggle="input-mask" data-mask-format="0000000000" maxlength="14" class="form-control" id="inputPassword4" placeholder="0912345678" name="cp_number">
                                </div>
                            </div>
                            <div class="mb-3">
                                <?php (form_error('comment')) ? $this->load->view('components/error_toster', ['error' => form_error('comment')]) : null; ?>
                                <label for="example-textarea" class="form-label">Comments</label>
                                <textarea class="form-control" id="example-textarea" rows="5" name="comment"><?= $retVal = ($mc->comments) ? $mc->comments : "N/A"; ?></textarea>
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
        $("#inputState").val(<?= $mc->type; ?>).change();
    });
</script>