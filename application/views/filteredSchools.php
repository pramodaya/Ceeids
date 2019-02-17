<!--Header Start-->
<?php
$this->load->view('header');
?>
<!--Header End-->


<body id="page-top">

<!--Nav Bar Start-->
<?php
$this->load->view('navbar');
?>
<!--Nav Bar End-->

<div id="wrapper">
    <!--Side Bar Start-->
    <?php
    $this->load->view('sidebar');
    ?>
    <!--Side Bar End-->

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Filtered Schools list</li>
            </ol>
            
            <?php

            foreach ($cor_det as $row) 
            {
              $uid = $row->uid;
            }

            ?>

                <div class="card mb-3">

                <div class="card-body">
                    <div class="container">
                        <div class="col-12">
                        <form action="school?coordinator_id=<?php echo $uid?>" method="POST" class="form-inline my-2 my-lg-0">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Allocate selected schools</button>
                        <hr>
                        </div>
                        <div class="col-12">
                        <ul class="list-group">

                          <?php

                          if ($school_data->num_rows() > 0)
                          {
                            foreach ($school_data->result() as $row)
                            {
                              if ($row->assigned == 0)
                              {
                                echo "
                                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">$row->schoolName<span class=\"text-muted\">$row->city</span>
                                            <label>
                                            <input type=\"checkbox\" name=\"school_id[]\" value=\"$row->sid\">
                                            <span class=\"checkmark\"></span>Select
                                            </label>
                                            </li>
                                          ";
                              }
                              else
                              {
                                echo "
                                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">$row->schoolName<span class=\"text-muted\">$row->city</span>
                                            <span class=\"badge badge-warning\">Coordinator: $row->firstName</span>
                                            </li>
                                          ";
                              }
                            }
                          }
                          else
                          {
                                echo "
                                    <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                    <span class=\"text-muted\">No matching results found!</span>
                                    </li>
                                ";
                          }
                          
                          ?>

                        </ul>
                        </div>
                        </form>
                        
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer Start-->
    <?php
    $this->load->view('footer');
    ?>
    <!--Sticky Footer Ens-->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url();?>users/logout"><?php if($this->session->userdata('logged_in')):?>Logout<?php endif;?></a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/jquery/jquery.min.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 10000);
</script>



<script src="<?php echo base_url();?>assets/assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>assets/assets1/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/assets1/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url();?>assets/assets1/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url();?>assets/assets1/js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url();?>assets/assets1/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url();?>assets/assets1/js/demo/image.js"></script>

</body>

</html>




