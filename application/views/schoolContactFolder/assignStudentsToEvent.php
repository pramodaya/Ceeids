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
                <li class="breadcrumb-item active">Organizational Event Handling</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">

                <div class="card-body">
                    <?php if($this->session->flashdata('success')):  ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success');?>
                        </div>
                    <?php endif;?>

                    <?php if($this->session->flashdata('fail')):  ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('fail');?>
                        </div>
                    <?php endif;?>
                    <form action="<?php echo base_url();?>schoolContacts/addStudents" method="POST">

                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Event Name</label>
                            <select name="eventid" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Select Event...</option>
                                <?php
                                if($event_details) {
                                    foreach ($event_details as $perreq) {
                                        echo "

                                <option value=$perreq->org_id >$perreq->name</option>

                        ";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control mr-sm-2" type="text" name="student_name" id="search_name" placeholder="Search by User Name" aria-label="Search">

                            </div>
                            <div class="col-md-6">
                                <input class="form-control mr-sm-2" type="text" name="search_email" id="search_email" placeholder="Search by User Email" aria-label="Search">

                            </div>
                            <br />
                            <div id="result"></div>


                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
    $(document).ready(function(){
        var search_name='';
        var search_email='';
        load_data();
        function load_data()
        {
            $.ajax({
                url:"<?php echo base_url(); ?>schoolContacts/getAllStudents",
                method:"POST",
                data:{data1:search_name,data2:search_email},
                success:function(data){
                    $('#result').html(data);
                }
            })
        }


        $('#search_name').keyup(function(){
            search_name = $(this).val();
            load_data()

        });
        $('#search_email').keyup(function(){
            search_email = $(this).val();
            load_data()
        });

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




