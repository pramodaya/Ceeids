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
                <li class="breadcrumb-item active">Edit Event</li>
            </ol>



            <!-- Area Chart Example-->
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-chart-area"></i>
                            <h2><?= $title; ?></h2></div>
                        <div class="card-body">

                            <?php echo validation_errors(); ?>

                            <?php echo form_open('events/update'); ?>
                            <input type="text" name="sid" value="<?php echo $_GET['sid'];?>" hidden>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $event['id'];?>">
                                

                                <label><h6>Event Name</h6></label>
                                <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $event['title'];?>">
                            </div>
                            <div class="form-group">
                                <label><h6>Description</h6></label>
                                <textarea id="editor" class="form-control" name="body" placeholder="Add Body">
                      <?php echo $event['body'];?></textarea>
                            </div>
                            <div>
                                <label for="start"><h6>Date:</h6></label>
                                <input type="date" id="start" name="date" value="<?php echo $event['date'];?>"
                                       value="2018-07-22"
                                       min="2018-01-01" max="2018-12-31" />
                            </div>
                            <div class="control">
                                <label for="appt-time"><h6>Start Time:</h6></label>
                                <input type="time" id="appt-time" name="start" value="<?php echo $event['startTime'];?>"
                                       min="9:00" max="18:00" required />

                            </div>
                            <div class="control">
                                <label for="appt-time"><h6>End Time   :</h6></label>
                                <input type="time" id="appt-time" name="end" value="<?php echo $event['endTime'];?>"
                                       min="9:00" max="18:00" required />

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                            </form>
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
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
        console.error( error );
    } );
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









