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

		





<?php echo form_open_multipart('schoolContacts/saveSingleUser');?>
<?php
	if(isset($singleSchoolUser)){
		foreach($singleSchoolUser as $item){
?>


			<div class="card" style="width: 100%; ">
				<div class="card-body bg-img">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-home"></i>
					</div> 

				<div class="row">
					<!-- <div class="form-group col-2">
									User Type
									<select class="form-control" id="studentOrTeacher" onchange="run()">
									<option value="1" selected="selected">Student</option>
									<option value="2">Teacher</option>
									</select>
							</div>		 -->
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
							<input type="text" name="firstName" class="form-control" value="<?php echo $item->firstName;?>"   required  placeholder="First Name" title="User's First Name">													
						</div> 
						<div class="form-group col-4">
						<i class="fas fa-user-tie"></i>
							Last Name
							<input type="text" name="lastName" class="form-control" value="<?php echo $item->lastName;?>" required  placeholder="Last Name" title="User's Last Name">													
						</div> 
					</div>	

					<hr>

					<div class="form-group">
						<i class="fas fa-envelope"></i>
						Email
						<input type="email" name="email" class="form-control" value="<?php echo $item->email;?>"  required placeholder="Email" title="Email Address">												
					</div>

					<hr>

					<div class="row">
						<div class="form-group col-6">
							<i class="fas fa-fw fa-mobile-alt"></i>
							Mobile
							<input type="text" name="mobile" class="form-control" value="<?php echo $item->mobile;?>"  required placeholder="Mobile" title="Phone number only using numbers without spaces">
						</div>
						<div class="form-group col-6">
						<i class="fas fa-fw fa-mobile-alt"></i>
							Mobile-Optional
							<input type="text" name="mobileOptional" class="form-control" value="<?php echo $item->mobileOptional;?>" placeholder="Optional Mobile No" pattern="[0-9]{1}[0-9]{9}"   title="Phone number only using numbers without spaces">
						</div>
					</div>

					<hr>

						<div class="row">
						<div class="form-group col-6">
						<i class="fas fa-fw fa-phone"></i>
							Residence No
							<input type="text" name="residence" class="form-control" value="<?php echo $item->residenceNo;?>" pattern="[0-9]{1}[0-9]{9}" required  placeholder="Residence" title="Phone number only using numbers without spaces">
						</div>
						<div class="form-group col-6">
							<i class="fas fa-fw fa-phone"></i>
							Residence Optional
							<input type="text" name="residenceOptional" class="form-control" value="<?php echo $item->residenceNoOptional;?>" pattern="[0-9]{1}[0-9]{9}"  placeholder="Optional Residence No" title="Phone number only using numbers without spaces">
						</div>
					</div>

					<hr>


					<div class="row">
						<div class="form-group col-6">
							<i class="fas fa-fw fa-id-card"></i>
							NIC No
							<input type="text" name="nic" class="form-control" value="<?php echo $item->nic;?>" placeholder="NIC"   title="NIC number only using numbers without spaces">
						</div>
						<div class="form-group col-6">
							<i class="fas fa-fw fa-passport"></i>
							Passport No
							<input type="text" name="passportNo" class="form-control" value="<?php echo $item->passportNo;?>"    placeholder="Passport" title="passport number only using numbers without spaces">
						</div>
					</div>
					
					<hr>

					<div class="row">
						<div class="form-group col-4">
							<i class="fas fa-fw fa-address-book"></i>
							Address Line 1
							<input type="text" name="address1" class="form-control" value="<?php echo $item->address1;?>"  placeholder="Address Line 1"  title="Enter Address Line 1">
						</div>
						<div class="form-group col-4">
							<i class="fas fa-fw fa-address-book"></i>
							Address Line 2
							<input type="text" name="address2" class="form-control" value="<?php echo $item->address2;?>" placeholder="Address Line 2"   title="Enter Address Line 2">
						</div>
						<div class="form-group col-4">
							<i class="fas fa-fw fa-address-book"></i>
							Address Line 3
							<input type="text" name="address3" class="form-control" value="<?php echo $item->address3;?>"  placeholder="Address Line 3"  title="Enter Address Line 3">
						</div>
					</div>
				
					<div class="row">
						<div class="form-group col-6">
							<i class="fas fa-fw fa-city"></i>
							City
							<input type="text" name="city" class="form-control" value="<?php echo $item->city;?>"  placeholder="City Name"    title="City Name">
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
						 <select id="district_type" name="district" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option value="colombo" <?php if(!empty($item->district) && $item->district == 'colombo') echo 'selected = "selected"'; ?>>Colombo</option>
													<option value="Kalutara" <?php if(!empty($item->district) && $item->district == 'Kalutara') echo 'selected = "selected"'; ?>>Kalutara</option>
													<option value="Gampaha" <?php if(!empty($item->district) && $item->district == 'Gampaha') echo 'selected = "selected"'; ?>>Gampaha</option>
													<option value="Galle" <?php if(!empty($item->district) && $item->district == 'Galle') echo 'selected = "selected"'; ?>>Galle</option>
													<option value="Matara"  <?php if(!empty($item->district) && $item->district == 'Matara') echo 'selected = "selected"'; ?>>Matara</option>
													<option value="Matale"  <?php if(!empty($item->district) && $item->district == 'Matale') echo 'selected = "selected"'; ?>>Matale</option>
													<option value="Kandy"  <?php if(!empty($item->district) && $item->district == 'Kandy') echo 'selected = "selected"'; ?>>Kandy</option>
													<option value="NuwaraEliya"  <?php if(!empty($item->district) && $item->district == 'NuwaraEliya') echo 'selected = "selected"'; ?>>Nuwara Eliya</option>
													<option value="Kegalle"  <?php if(!empty($item->district) && $item->district == 'Kegalle') echo 'selected = "selected"'; ?>>Kegalle</option>
													<option value="Ratnapura"   <?php if(!empty($item->district) && $item->district == 'Ratnapura') echo 'selected = "selected"'; ?><?php if(!empty($item->district) && $item->district == 'southern') echo 'selected = "selected"'; ?>>Ratnapura</option>
													<option value="Hambantota"  <?php if(!empty($item->district) && $item->district == 'Hambantota') echo 'selected = "selected"'; ?>>Hambantota</option>
													<option value="Badulla"  <?php if(!empty($item->district) && $item->district == 'Badulla') echo 'selected = "selected"'; ?>>Badulla</option>
													<option value="Monaragala"  <?php if(!empty($item->district) && $item->district == 'Monaragala') echo 'selected = "selected"'; ?>>Monaragala</option>
													<option value="Ampara"  <?php if(!empty($item->district) && $item->district == 'Ampara') echo 'selected = "selected"'; ?>>Ampara</option>
													<option value="Batticaloa"  <?php if(!empty($item->district) && $item->district == 'Batticaloa') echo 'selected = "selected"'; ?>>Batticaloa</option>
													<option value="Trincomalee"  <?php if(!empty($item->district) && $item->district == 'Trincomalee') echo 'selected = "selected"'; ?>>Trincomalee</option>
													<option value="Anuradhapura"  <?php if(!empty($item->district) && $item->district == 'Anuradhapura') echo 'selected = "selected"'; ?>>Anuradhapura</option>
													<option value="Polonnaruwa"  <?php if(!empty($item->district) && $item->district == 'Polonnaruwa') echo 'selected = "selected"'; ?>>Polonnaruwa</option>
													<option value="Puttalam"  <?php if(!empty($item->district) && $item->district == 'Puttalam') echo 'selected = "selected"'; ?>>Puttalam</option>
													<option value="Kurunegala" <?php if(!empty($item->district) && $item->district == 'Kurunegala') echo 'selected = "selected"'; ?>>Kurunegala</option>
													<option value="Jaffna"  <?php if(!empty($item->district) && $item->district == 'Jaffna') echo 'selected = "selected"'; ?>>Jaffna</option>
													<option value="Kilinochchi"  <?php if(!empty($item->district) && $item->district == 'Kilinochchi') echo 'selected = "selected"'; ?>>Kilinochchi</option>
													<option value="Mannar"  <?php if(!empty($item->district) && $item->district == 'Mannar') echo 'selected = "selected"'; ?>>Mannar</option>
													<option value="Mullaitivu"  <?php if(!empty($item->district) && $item->district == 'Mullaitivu') echo 'selected = "selected"'; ?>>Mullaitivu</option>
													<option value="Vavuniya"  <?php if(!empty($item->district) && $item->district == 'Vavuniya') echo 'selected = "selected"'; ?>>Vavuniya</option>
											
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
									<option value="<?php echo $desig->did;?>" <?php if( $item->did ==$desig->did) echo 'selected = "selected"'; ?>><?php echo $desig->designation;?><span class="caret"></span></option>
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


					
					<div>
					
					</div>


				

				<div class="row" id="ifYes" style="visibility:visible">
						<div class="form-group col-6">
							<i class="fas fa-fw fa-calendar-alt"></i>
							A/L Year
							<input type="text" name="alYear" class="form-control" value="<?php echo $item->alYear;?>" placeholder="A/L Year"   title="Enter A/L Year">
						</div>
						<div class="form-group col-6">
							<i class="fas fa-fw fa-stream"></i>
							A/L Stream
							<input type="text" name="stream" class="form-control" value="<?php echo $item->alStream;?>"  placeholder="A/L Stream"  title="Enter A/L Subject Stream">
						</div>
					</div>




						<input type="hidden" name="cid" value="<?php echo $item->cid;?>">
						<input type="hidden" name="sid" value="<?php echo $item->sid;?>">
						
					<div class="form-group">
						<mat-form-field>
							<input matInput placeholder="Save" value="SAVE" type="submit" class="btn btn-primary">
						</mat-form-field>
					</div>


<?php
		}
	}
?>
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


<script type="text/javascript">
	function rock(){
			
			var x= document.getElementById("desi").value;
			console.log(x);
				if(x=='other'){
				document.getElementById('other1').style.visibility = 'visible';
				}

		console.log('sone');
	}

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

