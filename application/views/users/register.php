<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Register & Signup </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url();?>assets/images/favicon.ico">

		<!-- Bootstrap css -->
		<link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
		<!-- icons -->
		<link href="<?= base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- Head js -->
		<script src="<?= base_url();?>assets/js/head.js"></script>

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                             <img src="<?= base_url();?>assets/images/logo-dark.png" alt="" height="42">
                                            </span>
                                        </a>
                    
                                        <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                            <img src="<?= base_url();?>assets/images/logo-dark.png" alt="" height="42">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="text-muted mb-2 mt-2">Create your account</p>
                                </div>

                                <?php echo form_open('users/register'); ?>

                                    <div class="mb-2">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Enter your name" required>
                                    </div>

                                    <div class="mb-2">
                                        <label for="fullname" class="form-label">User Name</label>
                                        <input class="form-control" type="text" id="userName" name="userName"  placeholder="Enter your user name" required>
                                    </div>

                                    <div class="mb-2">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" id="email" name="email"  required placeholder="Enter your email">
                                    </div>

                                    <!-- <div class="mb-2">
                                          <select class="form-select" name="role">Role
                                                    Open this select menu
                                                    <option  selected="" value="3">Guest</option>
                                                    <option value="2">User</option>
                                                    <option value="1">Admin</option>
                                            </select>
                                    </div> -->
                                    

                                    <div class="mb-2">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" title = ' Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters ' class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>

                                        <label for="password" class="form-label mt-2">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="confirmPassword" name="password2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" title = ' Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters ' class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="text-center d-grid">
                                        <button class="btn btn-success" type="submit"> Sign Up </button>
                                    </div>

                                <?php echo form_close(); ?>

                               

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-1">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Already have account?  <a href="" class="text-white ms-1"><b>Sign In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>

        <!-- Vendor js -->
        <script src="<?= base_url();?>assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="<?= base_url();?>assets/js/app.min.js"></script>
        
    </body>
</html>