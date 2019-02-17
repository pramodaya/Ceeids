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
                <li class="breadcrumb-item active">Create New School</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Create School Form</div>
                <div class="card-body">
                    <form action="<?php echo base_url();?>adminController/createSchool" method="POST">

                        <?php if($this->session->flashdata('register_success')):  ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('register_success');?>
                            </div>
                        <?php endif;?>

                        <?php if($this->session->flashdata('register_failed')):  ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('register_failed');?>
                            </div>
                        <?php endif;?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="schoolName" name="schoolname" class="form-control" placeholder="Type School Name" required="required" autofocus="autofocus">
                                                <label for="schoolName">School Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="email" id="schoolemail" name="schoolemail" class="form-control" placeholder="Type Email Address" required="required">
                                                <label for="schoolemail">School Email Address</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="schoolcontactnumber" name="schoolcontactnumber" class="form-control" placeholder="Type School Contact Number" required="required" autofocus="autofocus">
                                                <label for="schoolcontactnumber">General Contact Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="schoolfax" name="schoolfax" class="form-control" placeholder="Type School Fax Number" required="required">
                                                <label for="schoolfax">Fax</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                                <input type="text" id="schoolWebURL" name="schoolweburl" class="form-control" placeholder="Type School web URL" required="required" autofocus="autofocus">
                                                <label for="schoolWebURL">Web URL</label>
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
                                                        <input type="text" id="address1" name="address1" class="form-control" placeholder="Address 1" required="required">
                                                        <label for="address1">Address 1</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <input type="text" id="address2" name="address2" class="form-control" placeholder="Address 2" required="required">
                                                        <label for="address2">Address 2</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <input type="text" id="address3" name="address3" class="form-control" placeholder="Address 3">
                                                        <label for="address3">Address 3</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <input type="text" id="schoolcity" name="schoolcity" class="form-control" placeholder="School City" required="required">
                                                        <label for="schoolcity">City</label>
                                                        <select id="citytype" class="form-control" onchange="choiceCity(this)">
                                                            <option>Select Filtered City here...</option>
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
                                                <option>School</option>
                                                <option>Hotel</option>
                                                <option>Bank</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="public_type" name="public_type" class="form-control" onchange="choice1(this)">
                                                <option selected>Select...</option>
                                                <option value="public">Public</option>
                                                <option value="private">Private</option>
                                                <option value="semi">Semi</option>



                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="gender_type" name="gender_type" class="form-control">
                                                <option selected>Select...</option>
                                                <option>Boys</option>
                                                <option>Girls</option>
                                                <option>Mixed</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="national_type" name="national_type" class="form-control">
                                                <option selected>Select...</option>
                                                <option>National</option>
                                                <option>Provincial</option>

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="ab_type" name="ab_type" class="form-control">
                                                <option selected>Select...</option>
                                                <option>1AB</option>
                                                <option>1C</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-label-group">
                                            <select id="1002_type" name="1002_type" class="form-control">
                                                <option selected>Is this 1002 School</option>
                                                <option>Yes</option>
                                                <option>No</option>

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
                                                    <option value="nothern">Northern</option>
                                                    <option value="nothernwestern">North Western</option>
                                                    <option value="western">Western</option>
                                                    <option value="northcentral">North Central</option>
                                                    <option value="central">Central</option>
                                                    <option value="sabaragamuwa">Sabaragamuwa</option>
                                                    <option value="eastern">Eastern</option>
                                                    <option value="uva">Uva</option>
                                                    <option value="southern">Southern</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-label-group">
                                                <select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Colombo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-label-group">
                                                <select id="zone_type" name="zone_type" class="form-control" onchange="choiceDivision(this)">
                                                    <option selected>Select Zone...</option>


                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-label-group">
                                                <select id="division_type" name="division_type" class="form-control">
                                                    <option selected>Select Division...</option>

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
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="sinhala" value="Sinhala">
                                                <label class="custom-control-label" for="customCheck1">Sinhala</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="english" value="English">
                                                <label class="custom-control-label" for="customCheck2">English</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3" name="tamil" value="Tamil">
                                                <label class="custom-control-label" for="customCheck3">Tamil</label>
                                            </div>
                                        </div>
                                    </div>
                                <hr>
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Academic Progression </legend>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="acadamic" value="Only up to Primary" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Only up to Primary</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="acadamic" value="Only up to O/L" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Only up to O/L's</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline3" name="acadamic" value="Up to A/L" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline3">Up to A/L's </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Type of O/L's</legend>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="localol" value="Local O/L">
                                            <label class="custom-control-label" for="customCheck5">Local O/L's</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="edexcelol" value="Edexcel O/L">
                                            <label class="custom-control-label" for="customCheck6">Edexcel O/L's</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="cambridgeol" value="Cambridge O/L">
                                            <label class="custom-control-label" for="customCheck7">Cambridge O/L's</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Type of A/L's</legend>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8" name="localal" value="Local A/L">
                                            <label class="custom-control-label" for="customCheck8">Local A/L's</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck9" name="edexcelal" value="Edexcel A/L">
                                            <label class="custom-control-label" for="customCheck9">Edexcel A/L's</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck10" name="cambridgeal" value="Cambridge A/L">
                                            <label class="custom-control-label" for="customCheck10">Cambridge A/L's</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="totalstudents" name="totalstudents" class="form-control" placeholder="Enter Number of Students in the School"  autofocus="autofocus">
                                                <label for="totalstudents">Total Number of Students in the School</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="totalteachers" name="totalteachers" class="form-control" placeholder="Enter Number of Teachers in the School">
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
                                                        <input type="text" id="albiosinhala" name="albiosinhala" class="form-control" placeholder="Type School Contact Number" autofocus="autofocus">
                                                        <label for="albiosinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="albioenglish" name="albioenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="albioenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="albiotamil" name="albiotamil" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="albiotamil">Sinhala Medium Students</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <h4 class="card-title">Physical Science</h4>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="alpssinhala" name="alpssinhala" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="alpssinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="alpsenglish" name="alpsenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alpsenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="alpstamil" name="alpstamil" class="form-control" placeholder="Type School Fax Number" >
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
                                                        <input type="text" id="alcomsinhala" name="alcomsinhala" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="alcomsinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="alcomenglish" name="alcomenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alcomenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="alcomtamil" name="alcomtamil" class="form-control" placeholder="Type School Fax Number" >
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
                                                        <input type="text" id="alartssinhala" name="alartssinhala" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="alartssinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="alartsenglish" name="alartsenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="alartsenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="alartstamil" name="alartstamil" class="form-control" placeholder="Type School Fax Number" >
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
                                                        <input type="text" id="altecsinhala" name="altecsinhala" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="altecsinhala">Sinhala Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="altecenglish" name="altecenglish" class="form-control" placeholder="Type School Fax Number" >
                                                        <label for="altecenglish">English Medium Students</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-label-group">
                                                        <input type="text" id="altectamil" name="altectamil" class="form-control" placeholder="Type School Fax Number" >
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
                                                        <input type="text" id="allonbio" name="allonbio" class="form-control" placeholder="Type School Contact Number" autofocus="autofocus">
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
                                                        <input type="text" id="allonps" name="allonps" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
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
                                                        <input type="text" id="alloncom" name="alloncom" class="form-control" placeholder="Type School Contact Number" autofocus="autofocus">
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
                                                        <input type="text" id="allonarts" name="allonarts" class="form-control" placeholder="Type School Contact Number" autofocus="autofocus">
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
                                                        <input type="text" id="allontec" name="allontec" class="form-control" placeholder="Type School Contact Number"  autofocus="autofocus">
                                                        <label for="allontec">Number of English Medium Students</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <button class="btn btn-primary btn-block" type="submit" value="upload">Add School</button>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <img style="max-width: 80%" src="<?php echo base_url();?>assets/img/profileImages/school.png">

                                </div>
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
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 10000);
</script>

<!--If User Select Public options this will run-->
<script>
    function choice1(select) {
        if(select.options[select.selectedIndex].text == 'Public'){
            document.getElementById("national_type").disabled=false;
            document.getElementById("ab_type").disabled=false;
            document.getElementById("1002_type").disabled=false;
        }else{
            document.getElementById("national_type").disabled=true;
            document.getElementById("ab_type").disabled=true;
            document.getElementById("1002_type").disabled=true;
        }

    }
    function choiceProvince(select){
        var province = select.options[select.selectedIndex].text;
        $.ajax(
            {
                url: "<?php echo base_url(); ?>adminController/getDistricts",
                method:"post",
                data:{data1:province},
                success:function(response)
                {
                    $("#district_type").html(response);

                }
            });

    }
    function choiceZone(select) {
        var district = select.options[select.selectedIndex].text;
        $.ajax(
            {
                url: "<?php echo base_url(); ?>adminController/getZones",
                method:"post",
                data:{data1:district},
                success:function(response)
                {
                    $("#zone_type").html(response);

                }
            });
    }
    function choiceDivision(select) {
        var zone = select.options[select.selectedIndex].text;
        $.ajax(
            {
                url: "<?php echo base_url(); ?>adminController/getDivisions",
                method:"post",
                data:{data1:zone},
                success:function(response)
                {
                    $("#division_type").html(response);

                }
            });
    }
    function choiceCity(select) {
        var city = select.options[select.selectedIndex].text;
        document.getElementById("schoolcity").value = city;
    }
    var search_city ='';
    function load_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>adminController/getCity",
            method:"POST",
            data:{data1:search_city},
            success:function(data){
                $('#citytype').html(data);
            }
        })
    }
    $('#schoolcity').keyup(function(){
        search_city = $(this).val();
        load_data();
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




