<?php $this->load->view('shared/header');
$this->load->view('shared/sidebar'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
<div class="container-fluid">
<div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Project Details</h4>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-xl-12 col-lg-8">
                                <!-- project card -->
                                <div class="card d-block">
                                    <div class="card-body">
                                      
                                        <!-- project title-->
                                        <h3 class="mt-0 font-20">
                                        <?php echo $project_view->title?>
                                        </h3>
                                        <div class="badge bg-success text-light mb-3"><?php echo $project_view->status?></div>

                                        <h5>Project Overview:</h5>

                                        <p class="text-muted mb-4">
                                         <?php echo $project_view->description?>
                                        </p>

                                       

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>Start Date</h5>
                                                    <p><?php echo $project_view->start_date?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>End Date</h5>
                                                    <p><?php echo $project_view->end_date?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>Modified</h5>
                                                    <p><?php echo $project_view->modified?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                <h5>Created By</h5>
                                            <p><?php echo $project_view->created_by?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>Modified By</h5>
                                                    <p><?php echo $project_view->modified_by?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>Project Category</h5>
                                                    <p><?php echo $project_view->project_category?></p>
                                                </div>
                                            </div>
                                        </div>
                                        

                                    </div> <!-- end card-body-->
                                    
                                </div> <!-- end card-->
                             
                              
                                <!-- end card-->
                            </div> <!-- end col -->

                            
                        </div>
    <?php $data['title'] = 'Projects'; ?>

 
    
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php $this->load->view('shared/rightsidebar'); ?>
<!-- Right bar overlay-->
<?php $this->load->view('shared/footer'); ?>

<!-- Script -->