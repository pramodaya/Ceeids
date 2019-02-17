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

       
			<div class="card" style="width: 100%; ">
				<div class="card-body bg-img">
				
					<h3 class="card-title">Select a School </h3>
					
			<?php foreach($school as $item){?>
				<?php echo form_open_multipart("schoolContacts/index?sid=".$item->sid."");?>
					<div class="row">					
						
						<div class="form-group col-4">							
							<input type="text" name="scname" value="<?php echo $item->schoolName;?>" class="form-control" disabled  >
						
						<?php
					
							$this->session->set_userdata('my_sid',$item->sid);
						?>	
						</div>	
							<input type="text" value="<?php echo $item->sid;?>"  name="sid" hidden>
						<div class="form-group col-2">
							
							<input type="submit" value="Enter" class="form-control btn btn-primary">
						</div>	
						
				</div>
				<?php echo form_close();?>
			<?php }?>
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

