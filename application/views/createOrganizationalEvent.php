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
                <li class="breadcrumb-item active">Organizational Event</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Create Event</div>
                <div class="card-body">
                    <form action="<?php echo base_url();?>adminController/MakeOrganizationalEvent" method="POST">

                        <?php if($this->session->flashdata('success')):  ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success');?>
                            </div>
                        <?php endif;?>

                        <?php if($this->session->flashdata('failed')):  ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('failed');?>
                            </div>
                        <?php endif;?>
                        <div class="form-group row">
                            <label for="orgname" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="orgname" placeholder="Type Event Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="orgdescription" class="col-sm-2 col-form-label">Event Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" id="orgdescription" placeholder="Type Description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="orgdate" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" id="orgdate" placeholder="Choose Date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="orgname" class="col-sm-2 col-form-label">Time</label>
                            <div class="col-sm-10">
                                <input type="time" name="time" class="form-control" id="orgtime" placeholder="Choose Time">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="orgplace" class="col-sm-2 col-form-label">Venue</label>
                            <div class="col-sm-10">
                                <input type="text" name="place" class="form-control" id="orgplace" placeholder="Type Venue">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Create Event</button>
                            </div>
                        </div>
                    </form>

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

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
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







