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

		
					
			
			<?php
				if(isset($singleSchoolData)){
					foreach($singleSchoolData as $schoolData){

			?>	
				
			<button class="btn btn-warning" style="float:right" onclick="edit();">Edit</button> 
			<br><br>
			<?php echo form_open_multipart('schoolContacts/saveUpdatedData');?>
			<input type="text" name="sid" value="<?php echo $schoolData->sid;?>"  hidden>
			<div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Create School Form					
					</div>
					
                <div class="card-body">
                   
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="disable"  name="schoolname" class="form-control" placeholder="Type School Name" value="<?php echo $schoolData->schoolName;?>" required="required" autofocus="autofocus">
                                                <label for="schoolName">School Name</label>
												
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="email"value="<?php echo $schoolData->email;?>" id="schoolemail" name="schoolemail" Oxo_Company_School_Management_System class="form-control" placeholder="Type Email Address" required="required">
                                                <label for="schoolemail">School Email Address</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="schoolcontactnumber" name="contactNumber" value="<?php echo $schoolData->contactNumber;?>" class="form-control" placeholder="Type School Contact Number" required="required" autofocus="autofocus">
                                                <label for="contactNumber">General Contact Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="schoolfax" name="contactNumberOptional" value="<?php echo $schoolData->contactNumberOptional;?>" class="form-control" placeholder="Type School Optional Contact Number">
                                                <label for="contactNumberOptional">Optional Contact Number</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
								
								  <div class="form-group">
                                    <div class="form-row">
									<div class="col-md-6">
										<div class="form-label-group">
											<input type="text" id="address2" name="fax" value="<?php echo $schoolData->fax;?>" class="form-control" placeholder="Fax">
											<label for="fax">Fax</label>
                                         </div>
									</div>  
									<div class="col-md-6">
										<div class="form-label-group">
											<input type="text" id="address2" name="faxOptional" value="<?php echo $schoolData->faxOptional;?>" class="form-control" placeholder="Fax Optional" >
											<label for="faxOptional">Fax Optional</label>
										</div>
									</div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                                <input type="text" id="schoolWebURL" value="<?php echo $schoolData->webUrl;?>" name="schoolweburl" class="form-control" placeholder="Type School web URL"  autofocus="autofocus">
                                                <label for="schoolWebURL">Web URL</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                                <input type="text" id="schoolWebURL" value="<?php echo $schoolData->webUrlOptional;?>" name="schoolweburlOptional" class="form-control" placeholder="Type School Optional web URL" autofocus="autofocus">
                                                <label for="schoolWebURL">Web URL Optional</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="card border-primary mb-12">
                                        <div class="card-header">Address Details</div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <input type="text" id="address1" name="address1" value="<?php echo $schoolData->address1;?>" class="form-control" placeholder="Address 1" required="required">
                                                        <label for="address1">Address 1</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <input type="text" id="address2" name="address2" value="<?php echo $schoolData->address2;?>" class="form-control" placeholder="Address 2" required="required">
                                                        <label for="address2">Address 2</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <input type="text" id="address3" name="address3" value="<?php echo $schoolData->address3;?>" class="form-control" placeholder="Address 3">
                                                        <label for="address3">Address 3</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <input type="text" id="schoolcity" name="schoolcity" class="form-control" placeholder="School City" >
                                                        <label for="schoolcity">City</label>
                                                        <select id="citytype" class="form-control" onchange="choiceCity(this)">
                                                            <option>Select Filtered City here...</option>
															<option value="colombo" <?php if (!empty($schoolData->city) && $schoolData->city == 'sfsd')  echo 'selected = "selected"'; ?>>colombo</option>
															
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="organizational_type" name="organizational_type" class="form-control">
                                                <option selected>Select Organizational Type...</option>
                                                <option value='school' <?php if (!empty($schoolData->orgType) && $schoolData->orgType == 'school')  echo 'selected = "selected"'; ?>>School</option>
                                                <option value='hotel' <?php if (!empty($schoolData->orgType) && $schoolData->orgType == 'hotel')  echo 'selected = "selected"'; ?>>Hotel</option>
                                                <option value='bank' <?php if (!empty($schoolData->orgType) && $schoolData->orgType == 'bank')  echo 'selected = "selected"'; ?>>Bank</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="public_type" name="public_type" class="form-control" >
                                                <option selected>Select...</option>
                                                <option value="public" <?php if (!empty($schoolData->schoolType1) && $schoolData->schoolType1 == 'public')  echo 'selected = "selected"'; ?>>Public</option>
                                                <option value="private" <?php if (!empty($schoolData->schoolType1) && $schoolData->schoolType1 == 'private')  echo 'selected = "selected"'; ?>>Private</option>
                                                <option value="semi" <?php if (!empty($schoolData->schoolType1) && $schoolData->schoolType1 == 'semi')  echo 'selected = "selected"'; ?>>Semi</option>



                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="gender_type" name="gender_type" class="form-control">
                                                <option selected>Select...</option>
                                                <option value="boys" <?php if (!empty($schoolData->schoolType2) && $schoolData->schoolType2 == 'boys')  echo 'selected = "selected"'; ?>>Boys</option>
                                                <option value="girls"<?php if (!empty($schoolData->schoolType2) && $schoolData->schoolType2 == 'girls')  echo 'selected = "selected"'; ?>> Girls</option>
                                                <option value="mix" <?php if (!empty($schoolData->schoolType2) && $schoolData->schoolType2 == 'mix')  echo 'selected = "selected"'; ?>>Mixed</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="national_type" name="national_type" class="form-control">
                                                <option selected>Select...</option>
                                                <option  value="national" <?php if (!empty($schoolData->schoolType3) && $schoolData->schoolType3 == 'national')  echo 'selected = "selected"'; ?>>National</option>
                                                <option value="provincial" <?php if (!empty($schoolData->schoolType4) && $schoolData->schoolType3 == 'provincial')  echo 'selected = "selected"'; ?>>Provincial</option>

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="ab_type" name="ab_type" class="form-control">
                                                <option selected>Select...</option>
                                                <option value="ab1" <?php if (!empty($schoolData->schoolType4) && $schoolData->schoolType4 == 'ab1')  echo 'selected = "selected"'; ?>>1AB</option>
                                                <option value="c1" <?php if (!empty($schoolData->schoolType4) && $schoolData->schoolType4 == 'c1')  echo 'selected = "selected"'; ?>>1C</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="1002_type" name="1002_type" class="form-control">
                                                <option selected>Is this 1002 School</option>
                                                <option value="yes" <?php if (!empty($schoolData->school1002) && $schoolData->school1002 == 'yes')  echo 'selected = "selected"'; ?>>Yes</option>
                                                <option value="no" <?php if (!empty($schoolData->school1002) && $schoolData->school1002 == 'no')  echo 'selected = "selected"'; ?>>No</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="form-label-group">
                                                <select id="province_type" name="province_type" class="form-control" onchange="choiceProvince(this)">
                                                    <option selected>Select Province...</option>
                                                    <option value="nothern" <?php if (!empty($schoolData->province) && $schoolData->province == 'nothern')  echo 'selected = "selected"'; ?> >Northern</option>
                                                    <option value="nothernwestern" <?php if (!empty($schoolData->province) && $schoolData->province == 'nothernwestern') echo 'selected = "selected"'; ?>>North Western</option>
                                                    <option value="western" <?php if (!empty($schoolData->province) && $schoolData->province == 'western')  echo 'selected = "selected"'; ?>>Western</option>
                                                    <option value="northcentral" <?php if (!empty($schoolData->province) && $schoolData->province == 'northcentral')  echo 'selected = "selected"'; ?>>North Central</option>
                                                    <option value="central" <?php if(!empty($schoolData->province) && $schoolData->province == 'central')  echo 'selected = "selected"'; ?>>Central</option>
                                                    <option value="sabaragamuwa" <?php if (!empty($schoolData->province) && $schoolData->province == 'sabaragamuwa') echo 'selected = "selected"'; ?>>Sabaragamuwa</option>
                                                    <option value="eastern" <?php if (!empty($schoolData->province) && $schoolData->province == 'eastern')  echo 'selected = "selected"'; ?>>Eastern</option>
                                                    <option value="uva" <?php if (!empty($schoolData->province) && $schoolData->province == 'uva') echo 'selected = "selected"'; ?>>Uva</option>
                                                    <option value="southern" <?php if(!empty($schoolData->province) && $schoolData->province == 'southern') echo 'selected = "selected"'; ?>>Southern</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-label-group">
                                                <select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option value="colombo" <?php if(!empty($schoolData->district) && $schoolData->district == 'colombo') echo 'selected = "selected"'; ?>>Colombo</option>
													<option value="Kalutara" <?php if(!empty($schoolData->district) && $schoolData->district == 'Kalutara') echo 'selected = "selected"'; ?>>Kalutara</option>
													<option value="Gampaha" <?php if(!empty($schoolData->district) && $schoolData->district == 'Gampaha') echo 'selected = "selected"'; ?>>Gampaha</option>
													<option value="Galle" <?php if(!empty($schoolData->district) && $schoolData->district == 'Galle') echo 'selected = "selected"'; ?>>Galle</option>
													<option value="Matara"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Matara') echo 'selected = "selected"'; ?>>Matara</option>
													<option value="Matale"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Matale') echo 'selected = "selected"'; ?>>Matale</option>
													<option value="Kandy"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Kandy') echo 'selected = "selected"'; ?>>Kandy</option>
													<option value="NuwaraEliya"  <?php if(!empty($schoolData->district) && $schoolData->district == 'NuwaraEliya') echo 'selected = "selected"'; ?>>Nuwara Eliya</option>
													<option value="Kegalle"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Kegalle') echo 'selected = "selected"'; ?>>Kegalle</option>
													<option value="Ratnapura"   <?php if(!empty($schoolData->district) && $schoolData->district == 'Ratnapura') echo 'selected = "selected"'; ?><?php if(!empty($schoolData->district) && $schoolData->district == 'southern') echo 'selected = "selected"'; ?>>Ratnapura</option>
													<option value="Hambantota"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Hambantota') echo 'selected = "selected"'; ?>>Hambantota</option>
													<option value="Badulla"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Badulla') echo 'selected = "selected"'; ?>>Badulla</option>
													<option value="Monaragala"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Monaragala') echo 'selected = "selected"'; ?>>Monaragala</option>
													<option value="Ampara"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Ampara') echo 'selected = "selected"'; ?>>Ampara</option>
													<option value="Batticaloa"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Batticaloa') echo 'selected = "selected"'; ?>>Batticaloa</option>
													<option value="Trincomalee"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Trincomalee') echo 'selected = "selected"'; ?>>Trincomalee</option>
													<option value="Anuradhapura"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Anuradhapura') echo 'selected = "selected"'; ?>>Anuradhapura</option>
													<option value="Polonnaruwa"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Polonnaruwa') echo 'selected = "selected"'; ?>>Polonnaruwa</option>
													<option value="Puttalam"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Puttalam') echo 'selected = "selected"'; ?>>Puttalam</option>
													<option value="Kurunegala" <?php if(!empty($schoolData->district) && $schoolData->district == 'Kurunegala') echo 'selected = "selected"'; ?>>Kurunegala</option>
													<option value="Jaffna"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Jaffna') echo 'selected = "selected"'; ?>>Jaffna</option>
													<option value="Kilinochchi"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Kilinochchi') echo 'selected = "selected"'; ?>>Kilinochchi</option>
													<option value="Mannar"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Mannar') echo 'selected = "selected"'; ?>>Mannar</option>
													<option value="Mullaitivu"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Mullaitivu') echo 'selected = "selected"'; ?>>Mullaitivu</option>
													<option value="Vavuniya"  <?php if(!empty($schoolData->district) && $schoolData->district == 'Vavuniya') echo 'selected = "selected"'; ?>>Vavuniya</option>
											
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-label-group">
                                                <select id="zone_type" name="zone_type" class="form-control" onchange="choiceDivision(this)">
                                                    <option selected>Select Zone...</option>
													<option value="colombo" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'colombo') echo 'selected = "selected"'; ?>>Colombo</option>
													<option value="homagama" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'homagama') echo 'selected = "selected"'; ?>>Homagama</option>
													<option value="Jayawardenapura" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Jayawardenapura') echo 'selected = "selected"'; ?>>Jayawardenapura</option>
													<option value="Piliyandala" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Piliyandala') echo 'selected = "selected"'; ?>>Piliyandala</option>
													<option value="Gampaha" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Gampaha') echo 'selected = "selected"'; ?>>Gampaha</option>
													<option value="Kelaniya" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Kelaniya') echo 'selected = "selected"'; ?>>Kelaniya</option>
													<option value="Minuwangoda" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Minuwangoda') echo 'selected = "selected"'; ?>>Minuwangoda</option>
													<option value="Negombo" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Negombo') echo 'selected = "selected"'; ?>>Negombo</option>
													<option value="Horana" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Horana') echo 'selected = "selected"'; ?>>Horana</option>
													<option value="Kalutara" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Kalutara') echo 'selected = "selected"'; ?>>Kalutara</option>
													<option value="Matugama" <?php if(!empty($schoolData->zone) && $schoolData->zone == 'Matugama') echo 'selected = "selected"'; ?>>Matugama</option>
								
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-label-group">
                                                <select id="division_type" name="division_type" class="form-control">
                                                    <option selected>Select Division...</option>
													<option value="Borella" <?php if(!empty($schoolData->division) && $schoolData->division == 'ColomboCentral') echo 'selected = "selected"'; ?>>Colombo Central</option>
													<option value="ColomboCentral" <?php if(!empty($schoolData->division) && $schoolData->division == 'Borella') echo 'selected = "selected"'; ?>>Borella</option>
													<option value="colomboNorth" <?php if(!empty($schoolData->division) && $schoolData->division == 'colomboNorth') echo 'selected = "selected"'; ?>>Colombo North</option>
													<option value="colombosouth" <?php if(!empty($schoolData->division) && $schoolData->division == 'colombosouth') echo 'selected = "selected"'; ?>>Colombo South</option>
													<option value="Homagama" <?php if(!empty($schoolData->division) && $schoolData->division == 'Homagama') echo 'selected = "selected"'; ?>>Homagama</option>
													<option value="Padukka" <?php if(!empty($schoolData->division) && $schoolData->division == 'Padukka') echo 'selected = "selected"'; ?>>Padukka</option>
													<option value="Seethawaka" <?php if(!empty($schoolData->division) && $schoolData->division == 'Seethawaka') echo 'selected = "selected"'; ?>>Seethawaka</option>
													<option value="Kaduwela" <?php if(!empty($schoolData->division) && $schoolData->division == 'Kaduwela') echo 'selected = "selected"'; ?>>Kaduwela</option>
													<option value="Kolonnawa" <?php if(!empty($schoolData->division) && $schoolData->division == 'Kolonnawa') echo 'selected = "selected"'; ?>>Kolonnawa</option>
													<option value="Maharagama" <?php if(!empty($schoolData->division) && $schoolData->division == 'Maharagama') echo 'selected = "selected"'; ?>>Maharagama</option>
													<option value="Nugegoda" <?php if(!empty($schoolData->division) && $schoolData->division == 'Nugegoda') echo 'selected = "selected"'; ?>>Nugegoda</option>
													<option value="Dehiwala" <?php if(!empty($schoolData->division) && $schoolData->division == 'Dehiwala') echo 'selected = "selected"'; ?>>Dehiwala</option>
													<option value="Kesbewa" <?php if(!empty($schoolData->division) && $schoolData->division == 'Kesbewa') echo 'selected = "selected"'; ?>>Kesbewa</option>
													<option value="Moratuwa" <?php if(!empty($schoolData->division) && $schoolData->division == 'Moratuwa') echo 'selected = "selected"'; ?>>Moratuwa</option>
													<option value="Attanagalla" <?php if(!empty($schoolData->division) && $schoolData->division == 'Attanagalla') echo 'selected = "selected"'; ?>>Attanagalla</option>
													<option value="Dompe" <?php if(!empty($schoolData->division) && $schoolData->division == 'Dompe') echo 'selected = "selected"'; ?>>Dompe</option>
													<option value="Gampaha" <?php if(!empty($schoolData->division) && $schoolData->division == 'Gampaha') echo 'selected = "selected"'; ?>>Gampaha</option>
													<option value="Biyagama" <?php if(!empty($schoolData->division) && $schoolData->division == 'Biyagama') echo 'selected = "selected"'; ?>>Biyagama</option>
													<option value="Kelaniya" <?php if(!empty($schoolData->division) && $schoolData->division == 'Kelaniya') echo 'selected = "selected"'; ?>>Kelaniya</option>
													<option value="Mahara" <?php if(!empty($schoolData->division) && $schoolData->division == 'Mahara') echo 'selected = "selected"'; ?>>Mahara</option>
													<option value="Wattala" <?php if(!empty($schoolData->division) && $schoolData->division == 'Wattala') echo 'selected = "selected"'; ?>>Wattala</option>
													<option value="Diulapitiya" <?php if(!empty($schoolData->division) && $schoolData->division == 'Diulapitiya') echo 'selected = "selected"'; ?>>Diulapitiya</option>
													<option value="Minuwangoda" <?php if(!empty($schoolData->division) && $schoolData->division == 'Minuwangoda') echo 'selected = "selected"'; ?>>Minuwangoda</option>
													<option value="Mirigama" <?php if(!empty($schoolData->division) && $schoolData->division == 'Mirigama') echo 'selected = "selected"'; ?>>Mirigama</option>
													<option value="Ja-Ela" <?php if(!empty($schoolData->division) && $schoolData->division == 'Ja-Ela') echo 'selected = "selected"'; ?>>Ja-Ela</option>
													<option value="Katana" <?php if(!empty($schoolData->division) && $schoolData->division == 'Katana') echo 'selected = "selected"'; ?>>Katana</option>
													<option value="Negombo" <?php if(!empty($schoolData->division) && $schoolData->division == 'Negombo') echo 'selected = "selected"'; ?>>Negombo</option>
													<option value="Bandaragama" <?php if(!empty($schoolData->division) && $schoolData->division == 'Bandaragama') echo 'selected = "selected"'; ?>>Bandaragama</option>
													<option value="Bulathsinhala" <?php if(!empty($schoolData->division) && $schoolData->division == 'Bulathsinhala') echo 'selected = "selected"'; ?>>Bulathsinhala</option>
													<option value="Horana" <?php if(!empty($schoolData->division) && $schoolData->division == 'Horana') echo 'selected = "selected"'; ?>>Horana</option>
													<option value="Beruwala" <?php if(!empty($schoolData->division) && $schoolData->division == 'Beruwala') echo 'selected = "selected"'; ?>>Beruwala</option>
													<option value="Dodangoda" <?php if(!empty($schoolData->division) && $schoolData->division == 'Dodangoda') echo 'selected = "selected"'; ?>>Dodangoda</option>
													<option value="Kalutara" <?php if(!empty($schoolData->division) && $schoolData->division == 'Kalutara') echo 'selected = "selected"'; ?>>Kalutara</option>
													<option value="Panadura" <?php if(!empty($schoolData->division) && $schoolData->division == 'Panadura') echo 'selected = "selected"'; ?>>Panadura</option>
													<option value="Agalawattha-1" <?php if(!empty($schoolData->division) && $schoolData->division == 'Agalawattha-1') echo 'selected = "selected"'; ?>>Agalawattha I</option>
													<option value="Agalawattha-2" <?php if(!empty($schoolData->division) && $schoolData->division == 'Agalawattha-2') echo 'selected = "selected"'; ?>>Agalawattha II</option>
													<option value="Matugama" <?php if(!empty($schoolData->division) && $schoolData->division == 'Matugama') echo 'selected = "selected"'; ?>>Matugama</option><option value="colombo" <?php if(!empty($schoolData->division) && $schoolData->division == 'colombo') echo 'selected = "selected"'; ?>>Colombo</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                    <div class="row">
                                        <legend class="col-form-label col-sm-3 pt-0">Medium of Studies</legend>
                                        <div class="col-md-3">
                                            <div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" 
													<?php
														$mediumOfStudies = $schoolData->mediumOfStudies;
														if (strpos($mediumOfStudies, 'Sinhala') !== false) {
															echo "checked='checked'";
														} 
													?> 
													
												 
												  id="customCheck1" name="sinhala" value="Sinhala">
                                                <label class="custom-control-label" for="customCheck1">Sinhala</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="english" value="English" <?php
														$mediumOfStudies = $schoolData->mediumOfStudies;
														if (strpos($mediumOfStudies, 'English') !== false) {
															echo "checked='checked'";
														} 
													?> >
                                                <label class="custom-control-label" for="customCheck2">English</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3" name="tamil" value="Tamil" 
												<?php
														$mediumOfStudies = $schoolData->mediumOfStudies;
														if (strpos($mediumOfStudies, 'Tamil') !== false) {
															echo "checked='checked'";
														} 
													?> >
                                                <label class="custom-control-label" for="customCheck3">Tamil</label>
                                            </div>
                                        </div>
                                    </div>
                                <hr>
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Academic Progression </legend>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="acadamic" value="Only up to Primary" class="custom-control-input" 
													<?php
														$mediumOfStudies = $schoolData->academicProgression;
														if (strpos($mediumOfStudies, 'Only up to Primary') !== false) {
															echo "checked='checked'";
														} 
													?> > 
                                        <label class="custom-control-label" for="customRadioInline1">Only up to Primary</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="acadamic" value="Only up to O/L's" class="custom-control-input" 
										<?php
														$mediumOfStudies = $schoolData->academicProgression;
														if (strpos($mediumOfStudies, "Only up to O/L's") !== false) {
															echo "checked='checked'";
														} 
													?> > 
                                        <label class="custom-control-label" for="customRadioInline2">Only up to O/L's</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline3" name="acadamic" value="Up to A/L's" class="custom-control-input"
										<?php
														$mediumOfStudies = $schoolData->academicProgression;
														if (strpos($mediumOfStudies, "Up to A/L's") !== false) {
															echo "checked='checked'";
														} 
													?> > 
                                        <label class="custom-control-label" for="customRadioInline3">Up to A/L's </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Type of O/L's</legend>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="localol" value="Local O/L's" <?php
														$mediumOfStudies = $schoolData->typeOfOLs;
														if (strpos($mediumOfStudies, "Local O/L") !== false) {
															echo "checked='checked'";
														} 
													?> 
													>
                                            <label class="custom-control-label" for="customCheck5">Local O/L's</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="edexcelol" value="Edexcel O/L's" <?php
														$mediumOfStudies = $schoolData->typeOfOLs;
														if (strpos($mediumOfStudies, "Edexcel O/L's") !== false) {
															echo "checked='checked'";
														} 
													?> >
                                            <label class="custom-control-label" for="customCheck6">Edexcel O/L's</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="cambridgeol" value="Cambridge O/L's" <?php
														$mediumOfStudies = $schoolData->typeOfOLs;
														if (strpos($mediumOfStudies, "Cambridge O/L's") !== false) {
															echo "checked='checked'";
														} 
													?> >
                                            <label class="custom-control-label" for="customCheck7">Cambridge O/L's</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Type of A/L's</legend>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8" name="localal" value="Local A/L's" <?php
														$mediumOfStudies = $schoolData->typeOfALs;
														if (strpos($mediumOfStudies, "Local A/L's") !== false) {
															echo "checked='checked'";
														} 
													?> >
                                            <label class="custom-control-label" for="customCheck8">Local A/L's</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck9" name="edexcelal" value="Edexcel A/L's"  <?php
														$mediumOfStudies = $schoolData->typeOfALs;
														if (strpos($mediumOfStudies, "Edexcel A/L's") !== false) {
															echo "checked='checked'";
														} 
													?>>
                                            <label class="custom-control-label" for="customCheck9">Edexcel A/L's</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck10" name="cambridgeal" value="Cambridge A/L's" <?php
											$mediumOfStudies = $schoolData->typeOfALs;
											if (strpos($mediumOfStudies, "Cambridge A/L's") !== false) {
												echo "checked='checked'";
											} 
										?> >
                                            <label class="custom-control-label" for="customCheck10">Cambridge A/L's</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="totalstudents" value="<?php echo $schoolData->totalNumberOfStudents;?>"  name="totalstudents" class="form-control" placeholder="Enter Number of Students in the School"  autofocus="autofocus">
                                                <label for="totalstudents">Total Number of Students in the School</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="totalteachers"value="<?php echo $schoolData->totalNumberOfTeachers;?>" name="totalteachers" class="form-control" placeholder="Enter Number of Teachers in the School">
                                                <label for="totalteachers">Total No of Teachers in the School</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="card border-primary mb-3">
                                    <div class="card-header">No of students in A/L's (Local Syllabus)</div>
                                    <div class="card-body">
                                        <h4 class="card-title">Biology</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localBioSinhala;?>" id="albiosinhala" name="albiosinhala" class="form-control" placeholder="Type School Contact Number" autofocus="autofocus">
                                                        <label for="albiosinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text"value="<?php echo $schoolData->localBioEnglish;?>"  id="albioenglish" name="albioenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="albioenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localBioTamil;?>"  id="albiotamil" name="albiotamil" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="albiotamil">Tamil Medium Students</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <h4 class="card-title">Physical Science</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localPhysicalSinhala;?>"   id="alpssinhala" name="alpssinhala" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="alpssinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localPhysicalEnglish;?>" id="alpsenglish" name="alpsenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alpsenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localPhysicalTamil;?>"id="alpstamil" name="alpstamil" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alpstamil">Tamil Medium Students</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <h4 class="card-title">Commerce</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localCommerceSinhala;?>" id="alcomsinhala" name="alcomsinhala" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="alcomsinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localCommerceEnglish;?>" id="alcomenglish" name="alcomenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alcomenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text"  value="<?php echo $schoolData->localCommerceTamil;?>" id="alcomtamil" name="alcomtamil" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alcomtamil">Tamil Medium Students</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <h4 class="card-title">Arts</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text"  value="<?php echo $schoolData->localArtsSinhala;?>" id="alartssinhala" name="alartssinhala" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="alartssinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localArtsEnglish;?>"id="alartsenglish" name="alartsenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alartsenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text"value="<?php echo $schoolData->localArtsTamil;?>" id="alartstamil" name="alartstamil" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alartstamil">Tamil Medium Students</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <h4 class="card-title">Technology</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localTechSinhala;?>" id="altecsinhala" name="altecsinhala" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="altecsinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localTechEnglish;?>"id="altecenglish" name="altecenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="altecenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->localTechTamil;?>" id="altectamil" name="altectamil" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="altectamil">Tamil Medium Students</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                    <div class="card-header">No of students in A/L's (London Syllabus)</div>
                                    <div class="card-body">
                                        <h4 class="card-title">Biology</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->londonBioEng;?>" id="allonbio" name="allonbio" class="form-control" placeholder="Type School Contact Number" autofocus="autofocus">
                                                        <label for="allonbio">Number of English Medium Students</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <h4 class="card-title">Physical Science</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->londonPhysicalEng;?>"id="allonps" name="allonps" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="allonps">Number of English Medium Students</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <h4 class="card-title">Commerce</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-label-group">
                                                        <input type="text"value="<?php echo $schoolData->londonCommerceEng;?>" id="alloncom" name="alloncom" class="form-control" placeholder="Type School Contact Number" autofocus="autofocus">
                                                        <label for="alloncom">Number of English Medium Students</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <h4 class="card-title">Arts</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->londonArtsEng;?>"  id="allonarts" name="allonarts" class="form-control" placeholder="Type School Contact Number" autofocus="autofocus">
                                                        <label for="allonarts">Number of English Medium Students</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <h4 class="card-title">Technology</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-label-group">
                                                        <input type="text" value="<?php echo $schoolData->londonTechEng;?>" id="allontec" name="allontec" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="allontec">Number of English Medium Students</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>



							

                               
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <img style="max-width: 80%" src="<?php echo base_url();?>assets/<?php echo $schoolData->schoolImg?>">
									<input type="file" class="btn btn-default" name="file_name" />
                                </div>
                            </div>
							<button class="btn btn-primary btn-block"  id="save" type="submit" value="upload">SAVE</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
	</div>
					<?php }}; ?>
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
	function edit(){
		var inputs=document.getElementsByTagName('input');
		for(i=0;i<inputs.length;i++){
		inputs[i].disabled=false;
		}   
		document.getElementById("save").disabled = false;
	}
	
	function dis(){
		var inputs=document.getElementsByTagName('input');
		for(i=0;i<inputs.length;i++){
		inputs[i].disabled=true;
		} 
		document.getElementById("save").disabled = true;
		
		
	}
	dis();
	
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

