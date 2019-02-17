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
                <li class="breadcrumb-item active">Event Details</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Student List</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Title</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Email</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /* first we will make sure we have data to display. $users variable is actually the $data['users'] that we sent from the controller to the view... */

                                    echo "
<div class=\"form-group row\">
    <label for=\"staticEmail\" class=\"col-sm-2 col-form-label\">Event Name</label>
    <div class=\"col-sm-10\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value='$event_name'>
    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"staticEmail\" class=\"col-sm-2 col-form-label\">School</label>
    <div class=\"col-sm-10\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value='$event_school'>
    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"staticEmail\" class=\"col-sm-2 col-form-label\">Description</label>
    <div class=\"col-sm-10\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value='$event_description'>
    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"staticEmail\" class=\"col-sm-2 col-form-label\">Date</label>
    <div class=\"col-sm-10\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value='$event_date'>
    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"staticEmail\" class=\"col-sm-2 col-form-label\">Student Count</label>
    <div class=\"col-sm-10\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value='$count_student'>
    </div>
  </div>
    <div class='row'>
    <div class='col-md-6 text-center'>
    <a class='btn btn-outline-danger' href=print_item?event_name=$event_id&description=$event_description>Export PDF</a>
</div>
<form method=\"post\" action='action'>
     <input type=\"submit\" name=\"export\" class=\"btn btn-outline-success\" value=\"Export Excel\" />
    </form>

</div>
    <hr>

";
                            if($student_list){
                                foreach ($student_list as $perreq)
                                {
                                    echo"

                                                    <tr class=\"text-center\">

                        
                                <td>$perreq->title</td>
                                <td>$perreq->fname</td>
                                <td>$perreq->lname</td>
                                <td>$perreq->mobile</td>
                                <td>$perreq->email</td>
                                </tr>
                           

                        
                        ";

                                }
                            }


                            ?>

                            </tbody>
                        </table>
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



