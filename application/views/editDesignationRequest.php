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
                <li class="breadcrumb-item active">Add New Designation request</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Edit Request Form</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="<?php echo base_url();?>adminController/addRequest" method="POST">
                                <div class="form-group row">
                                    <label for="requestedid" class="col-sm-4 col-form-label">Request ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" name="reqid" id="requestedid" value="<?php echo $this->session->userdata('id'); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="userrequest" class="col-sm-4 col-form-label">User Requested Designation</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" name="userreqdesignation" id="userrequest" value="<?php echo $this->session->userdata('designation'); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="adminrequest" class="col-sm-4 col-form-label">Change Requested Designation</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="adminreqdesignation" id="adminrequest" placeholder="If you want to change User Requested Designation Change here" onkeyup="check_designation();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-4">
                            <div id="result"></div>
                        </div>
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
<script>
    function check_designation() {


        var designation = $("#adminrequest").val();

        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url(); ?>index.php/adminController/getDesignations",
                data:{ designation:designation},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
    }
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




