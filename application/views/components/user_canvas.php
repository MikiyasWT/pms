<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h4 id="offcanvasRightLabel">Add User</h4>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div> <!-- end offcanvas-header-->

    <div class="offcanvas-body">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('Usermanagment/insert_user') ?>" method="post" id="user_edit">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" title="Only Name is allowed" class="form-control" id="floatingPassword" placeholder="Adam Sandler" name="name" required>
                            <label for="floatingPassword">Full Name<span class="text-danger">*</span></label>
                            <input type="hidden" name="user_update" value="true" aria-required="">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" required placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address<span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" data-toggle="input-mask" data-mask-format="0000000000" required maxlength="14" class="form-control" id="floatingTextarea2" placeholder="0912345678" name="phone">
                            <label for="floatingTextarea2">Phone Number<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" required name="dob" id="dob" data-provide="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <div class="form-check">
                                    <input type="radio" id="customRadio1"required name="gender" value="male" class="form-check-input">
                                    <label class="form-check-label" for="customRadio1">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="customRadio2" required name="gender" value="female" class="form-check-input">
                                    <label class="form-check-label" for="customRadio2">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-floating mb-3">
                            <select class="form-select" id="floatingSelect" required aria-label="Floating label select example" name="role_type">
                                <option selected=""></option>
                            </select>
                            <label for="floatingSelect">Roles<span class="text-danger">*</span></label>
                        </div>
                        <div hidden class="col form-floating mb-3 user_sts">
                            <select class="form-select" id="user_sts" aria-label="Floating label select example" name="user_status">
                                <option selected="" value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                            <label for="user_sts">user status</label>
                        </div>
                    </div>



                    <div class="row justify-content-end">
                        <div class="col">
                            <button class="ladda-button ladda-button-demo btn btn-success" dir="ltr" data-style="zoom-in"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span>
                                <div class="ladda-progress" style="width: 75px;"></div>
                            </button>
                        </div>
                        <div class="col-3 justify-self-end">
                            <button type="reset" class="btn btn-secondary waves-effect">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end offcanvas-body-->
</div> <!-- end offcanvas-->