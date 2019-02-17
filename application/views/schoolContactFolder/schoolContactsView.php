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
                <li class="breadcrumb-item active">Overview</li>
            </ol>

		
			<!-- if school data is updated, show success msg -->
			<?php if($this->session->flashdata('school_data_updated')):  ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('school_data_updated');?>
				</div>					
			<?php endif;?>

				<!-- if user data is updated, show success msg	 -->
			<?php if($this->session->flashdata('user_data_updated')):  ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('user_data_updated');?>
				</div>					
			<?php endif;?>

	
			
            <div class="row"> 

			
			<?php if($result) { ?>
			

					<?php
					  foreach($result as $item){					
					 ?>  
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-img o-hidden h-100">
                        <div class="card-body">                            
						<img src="<?php echo base_url().'assets/'.$item->schoolImg?>" alt="" height="100%" width="100%">
                        </div>
                    </div>
                </div>
			
				<div class="card schoolProfile" style="width: 70%;">
  					<div class="card-body bg-img">
					  <div class="card-body-icon">
                         <i class="fas fa-fw fa-home"></i>
					  </div>     
					                   
						<h2 class="card-title"><?php echo $item->schoolName?></h2>
							<div>
								<i class="fas fa-fw fa-home"></i>
								<?php echo $item->address1." ";?> 	
								<?php echo $item->address2." "?>	
								<?php echo $item->address3." "?>
								<?php echo $item->city." "?>
								<?php echo $item->district." "?>	
							
							</div>
							<div>
								<i class="fas fa-fw fa-envelope"></i>
								<?php echo $item->email?>
							</div>
							<div>
								<i class="fas fa-fw fa-fax"></i>
								<?php echo $item->fax." ";?> 	
										
							</div>
							
							<div>
								<i class="fas fa-fw fa-phone"></i>
								<?php echo $item->contactNumber?>
							</div>
						<a href="<?php echo base_url() ?>events?sid=<?php echo $item->sid;?>" class="btn btn-warning editBtn">School Events</a>						
						<a href="<?php echo base_url() ?>schoolContacts/updateSchoolDetails?sid=<?php echo $item->sid;?>" class="btn btn-warning editBtn">View More</a>
						
					  <?php
					 }?>
 					</div>
				</div>				
            </div>     
		
			<?php }else{ ?>
				<h3>No School Data</h3>
			<?php }?>

<br>

  <div class="form-group">
  	<div class="card-body row no-gutters align-items-center">
		<div class="col-auto">
			<i class="fas fa-search h4 text-body"></i>
		</div>
		<!--end of col-->
		<div class="col">
			<input class="form-control form-control-lg form-control-borderless" type="search" name="search_text" id="search_text" placeholder="Search topics or keywords">
		</div>
		<!--end of col-->
		
    </div>
  </div>
 
   <br />
   <div id="result"></div>



	


   
        <!-- /.container-fluid -->

        <!-- Sticky Footer Start-->
        <?php
        include_once("footer.php");
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


<script type="text/javascript">
$(document).ready(function() {

 load_data();

 function load_data(query)
 {
	var sid = <?php echo  $sid;?>;
	
  $.ajax({
   url:"<?php echo base_url(); ?>ajaxsearch/fetch",
   method:"POST",
   data:{query:query, sid:sid},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
	 
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/jquery/jquery.min.js"></script>
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

</body>

</html>




	