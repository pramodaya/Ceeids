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
                <li class="breadcrumb-item active">Event Calendar</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Event Calendar</div>
                <div class="card-body">
                    <div class="container mt-5 mb-5">
                    
                        <div class="row">
                        
                            <div class="col-md-6 offset-md-3">

                                <u><h2>Event Calendar</h2></u>
                                <br>
                                <a href="<?php echo base_url()?>events/create?sid=<?php echo $_GET["sid"];?>" style="font-size:22px;"><i class="fas fa-plus"></i>  Add Events</a>
                                <br>
                                <br>
                                <ul class="timeline">
                                    <?php foreach($events as $event) : ?>
                                        <li>
                                            <label style="color:#3399ff;" ><?php echo $event['date']; ?></label>
                                            <label style="color:#3399ff;" class="float-right"><?php echo $event['startTime']; ?> - <?php echo $event['endTime']; ?></label>

                                            <br>
                                            <label style="color:#44443c;font-size:18px;"><strong><?php echo $event['title']; ?></strong></label>
                                            <a href="<?php echo base_url(); ?>events/edit/<?php echo $event['slug']; ?>?sid=<?php echo $_GET["sid"];?>"><i class="fas fa-edit"></i></a>
                                            <p><?php echo word_limiter($event['body'],50); ?></p>

                                            
                                            <?php echo form_open('/events/delete?sid='.$_GET["sid"]); ?>
                                            <input type="text" name="id" value="<?php echo $event['id']; ?>" hidden >
                                            <!-- <input type="submit" value="delete" class="btn btn-danger">  -->
                                            <button type="submit" style="float:right;" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            
                                        </li>
                                        <?php echo form_close(); ?>
                                        
                                        <br>
                                        <hr>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
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








