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

	<!-- show success msg if new person is added -->
	<?php if($this->session->flashdata('added')):  ?>
			<div class="alert alert-success">
			<?php echo $this->session->flashdata('added');?>
			</div>					
	<?php endif;?>
	
	<!-- show error msg if not new person is added -->
	<?php if($this->session->flashdata('notAdded')):  ?>
			<div class="alert alert-success">
			<?php echo $this->session->flashdata('notAdded');?>
			</div>					
	<?php endif;?>




        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

		




<?php echo form_open_multipart('schoolContacts/saveNewUsers');?>


			<div class="card" style="width: 100%; ">
				<div class="card-body bg-img">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-home"></i>
					</div> 
					<h3 class="card-title">Add A <span id="heading">Student</span> </h3>
					


					<div class="row">
						<div class="form-group col-2">
								User Type
								<select class="form-control" id="studentOrTeacher" onchange="run()">
								<option value="1" selected="selected">Student</option>
								<option value="2">Teacher</option>
								</select>
						</div>	
						<div class="form-group col-2">
							Title
							<select class="form-control" id="sel1" name="title">
								<option value="mr">Mr</option>
								<option value="mrs">Mrs</option>
								<option value="rev">Rev</option>
							</select>
						</div>	
						<div class="form-group col-4">
							<i class="fas fa-user-tie"></i>
							First Name
							<input type="text" name="firstName" class="form-control" placeholder="Enter First Name"  placeholder="Full Name" required   title="User's First Name">													
						</div> 
						<div class="form-group col-4">
						<i class="fas fa-user-tie"></i>
							Last Name
							<input type="text" name="lastName" class="form-control" placeholder="Enter Last Name"  placeholder="Full Name" required   title="User's Last Name">													
						</div> 
					</div>	

					<hr>

					<div class="form-group">
						<i class="fas fa-envelope"></i>
						Email
						<input type="email" name="email" class="form-control" placeholder="Enter Email"  placeholder="Email"  required  title="Email Address">												
					</div>

					<hr>

					<div class="row">
						<div class="form-group col-6">
							<i class="fas fa-fw fa-mobile-alt"></i>
							Mobile
							<input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number"  placeholder="Mobile Number" pattern="[0-9]{1}[0-9]{9}" required  title="Phone number only using numbers without spaces">
						</div>
						<div class="form-group col-6">
						<i class="fas fa-fw fa-mobile-alt"></i>
							Mobile-Optional
							<input type="text" name="mobileOptional" class="form-control" placeholder="Enter Optional Mobile Number"  placeholder="Optional Mobile Number" pattern="[0-9]{1}[0-9]{9}"   title="Phone number only using numbers without spaces">
						</div>
					</div>

					<hr>

						<div class="row">
						<div class="form-group col-6">
						<i class="fas fa-fw fa-phone"></i>
							Residence No
							<input type="text" name="residence" class="form-control" placeholder="Enter Resicence Number"  placeholder="Mobile Number" pattern="[0-9]{1}[0-9]{9}" required  title="Phone number only using numbers without spaces">
						</div>
						<div class="form-group col-6">
							<i class="fas fa-fw fa-phone"></i>
							Residence Optional
							<input type="text" name="residenceOptional" class="form-control" placeholder="Enter Optional Resicence Number"  placeholder="Optional Residence Number" pattern="[0-9]{1}[0-9]{9}"   title="Phone number only using numbers without spaces">
						</div>
					</div>

					<hr>


					<div class="row">
						<div class="form-group col-6">
							<i class="fas fa-fw fa-id-card"></i>
							NIC No
							<input type="text" name="nic" class="form-control" placeholder="Enter NIC Number"  placeholder="NIC Number"    title="NIC number only using numbers without spaces">
						</div>
						<div class="form-group col-6">
							<i class="fas fa-fw fa-passport"></i>
							Passport No
							<input type="text" name="passportNo" class="form-control" placeholder="Enter Passport Number"  placeholder="Passport Number"    title="passport number only using numbers without spaces">
						</div>
					</div>
					
					<hr>

					<div class="row">
						<div class="form-group col-4">
							<i class="fas fa-fw fa-address-book"></i>
							Address Line 1
							<input type="text" name="address1" class="form-control" placeholder="Enter Address Line 1"  placeholder="Enter Address Line 1"    title="Enter Address Line 1">
						</div>
						<div class="form-group col-4">
							<i class="fas fa-fw fa-address-book"></i>
							Address Line 2
							<input type="text" name="address2" class="form-control" placeholder="Enter Address Line 2"  placeholder="Enter Address Line 2"    title="Enter Address Line 2">
						</div>
						<div class="form-group col-4">
							<i class="fas fa-fw fa-address-book"></i>
							Address Line 3
							<input type="text" name="address3" class="form-control" placeholder="Enter Address Line 3"  placeholder="Enter Address Line 3"    title="Enter Address Line 3">
						</div>
					</div>
				
					<div class="row">
						<div class="form-group col-6">
							<i class="fas fa-fw fa-city"></i>
							City
							<input type="text" name="city" class="form-control" placeholder="Enter City Name"  placeholder="City Name"    title="City Name">
							<!-- <select class="form-control" name="city">
								<option value="Colombo" selected="Colombo">Colombo</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Moratuwa">Moratuwa</option>
								<option value="Sri Jayawardenapura Kotte">Sri Jayawardenapura Kotte</option>
								<option value="Negombo">Negombo</option>
								<option value="Kandy">Kandy</option>
								<option value="Kalmunai">Kalmunai</option>
								<option value="Vavuniya">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
								<option value="Dehiwala-Mount Lavinia">Dehiwala-Mount Lavinia</option>
							</select> -->
						
						</div>
						<div class="form-group col-6">
							<i class="fas fa-fw fa-map"></i>
							District
							<!-- <input type="text" name="district" class="form-control" placeholder="Enter District Name"  placeholder="District Name"    title="District Name"> -->
							<select id="district_type" name="district" class="form-control" ">
                                                    <option selected>Select District...</option>
                                                    <option value="colombo" >Colombo</option>
													<option value="Kalutara" >Kalutara</option>
													<option value="Gampaha">Gampaha</option>
													<option value="Galle">Galle</option>
													<option value="Matara" >Matara</option>
													<option value="Matale" >Matale</option>
													<option value="Kandy" >Kandy</option>
													<option value="NuwaraEliya"  >Nuwara Eliya</option>
													<option value="Kegalle" >Kegalle</option>
													<option value="Ratnapura"  <?php if(!empty($schoolData->district) && $schoolData->district == 'southern') echo 'selected = "selected"'; ?>>Ratnapura</option>
													<option value="Hambantota" >Hambantota</option>
													<option value="Badulla"  >Badulla</option>
													<option value="Monaragala" >Monaragala</option>
													<option value="Ampara" >Ampara</option>
													<option value="Batticaloa" >Batticaloa</option>
													<option value="Trincomalee" >Trincomalee</option>
													<option value="Anuradhapura"  >Anuradhapura</option>
													<option value="Polonnaruwa" >Polonnaruwa</option>
													<option value="Puttalam"  >Puttalam</option>
													<option value="Kurunegala" >Kurunegala</option>
													<option value="Jaffna" >Jaffna</option>
													<option value="Kilinochchi"  >Kilinochchi</option>
													<option value="Mannar"  >Mannar</option>
													<option value="Mullaitivu"  >Mullaitivu</option>
													<option value="Vavuniya" ></option>Vavuniya</option>
											
                                                </select>
						
						
						</div>
					</div>

					
				
					<div class="row">
						
					 
						<div class="form-group col-6">
						<i class="fas fa-address-card"></i>
							Designation
							<select  id="desi" name="designation" class="form-control col-4" onchange="rock()">                      
							
								<?php if($designations){ ?>
									
									<?php foreach($designations as $desig){ ?>
									<?php  $dname = $desig->designation; ?>  
									<?php if(!($dname=="other")){?>
									<option value="<?php echo $desig->did;?>"><?php echo $desig->designation;?><span class="caret"></span></option>
									<?php }else{?>
										<option id="other" value="other">Other<span class="caret"></span></option>
									<?php }?>
									<?php 
									}
									?>
									
								<?php	
								
								}else{ ?>
										<option id="other" value="No data">No Designations<span class="caret"></span></option>
								<?php }?>
								?>

							</select>
						
					  	</div>
					

					<!-- designation req field -->
				
						<div class="form-group col-6" id="other1" style="visibility:hidden">
						<i class="fas fa-address-card"></i>
							New Designation Request
							<input type="text" name="designationReq" class="form-control" placeholder="New Designation Request"   title="Enter New Designation">
						</div>
						
					</div>
			
				

			


				

					<div class="row" id="ifYes" style="visibility:visible">
						<div class="form-group col-6">
							<i class="fas fa-fw fa-calendar-alt"></i>
							A/L Year
							<input type="text" name="alYear" class="form-control" placeholder="Enter A/L Year"   title="Enter A/L Year">
						</div>
						<div class="form-group col-6">
							<i class="fas fa-fw fa-stream"></i>
							A/L Stream
							<input type="text" name="stream" class="form-control" placeholder="Enter A/L Subject Stream"     title="Enter A/L Subject Stream">
						</div>
					</div>





					<div class="form-group">
						<mat-form-field>
							<input matInput placeholder="" value="SAVE" type="submit" class="btn btn-primary">
						</mat-form-field>
					</div>



				</div>
			</div>	

		</div>
	</div>  

	
	<?php echo form_close();?>



  <?php
        include_once("footer.php");
    ?>

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


								<!-- myscript -->
	<script type="text/javascript">
	
	function run() {
        var k = document.getElementById("studentOrTeacher").value;
		if(k==1){
			document.getElementById('ifYes').style.visibility = 'visible';
			document.getElementById("heading").textContent = "Student";
		}else if(k==2){
			document.getElementById('ifYes').style.visibility = 'hidden';
			document.getElementById("heading").textContent = "Teacher";
		}
		// var x = document.getElementById("al");
	

	}
	

	function rock(){
		
		 var x= document.getElementById("desi").value;
		 console.log(x);
		 	if(x=='other'){
				document.getElementById('other1').style.visibility = 'visible';
			 }

		console.log('sone');
	}

</script>

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

