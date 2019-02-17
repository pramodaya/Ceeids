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
                <li class="breadcrumb-item active">Allocatate Schools</li>
            </ol>



            
            <div class="card mb-3">
                <div class="card-body">
                    <?php

                    foreach ($cor_det as $row) 
                    {
                    $fullName = $row->firstName.' '.$row->lastName;
                    $email = $row->email;
                    $contactno = $row->contactNumber;
                    $uid = $row->uid;
                    $type = $row->userType;
                    }

                    ?>

                    <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <p align="right">Full Name: </p>
                        <p align="right">email: </p>
                        <p align="right">contact number: </p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <p align="left"><?php echo $fullName?></p>
                        <p align="left"><?php echo $email?></p>
                        <p align="left"><?php echo $contactno?></p>
                    </div>
                    </div>
                    <hr/>
                    <div class="row">
                    <div class="col-6">
                        <div class="card mb-3">
                            <?php
                            if($type == 'Coordinator')
                            {
                                echo "
                                <div class=\"card-header\">
                                <button type=\"button\" name=\"filter\" class=\"btn btn-light btn-block\"  data-toggle=\"modal\" data-target=\".bd-example-modal-lg\">Apply Filters</button>
                                </div>";
                            }
                            ?>
                            <div class="card-body">
                                <div class="form-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">Search</span>
                                        <input type="text" name="search_text" id="search_text" placeholder="Search by school details" class="form-control" />
                                    </div>
                                    <div id="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- filter modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Select Filters</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo base_url();?>adminController/filterSchools?coordinator_id=<?php echo $uid?>" method="POST">
                                    <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <select id="public_type" name="public_type" class="form-control" onchange="choice1(this)">
                                                            <option selected>Select</option>
                                                            <option value="public">Public</option>
                                                            <option value="private">Private</option>
                                                            <option value="semi">Semi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <select id="gender_type" name="gender_type" class="form-control">
                                                            <option selected>Select</option>
                                                            <option >Boys</option>
                                                            <option>Girls</option>
                                                            <option>Mixed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <select id="national_type" name="national_type" class="form-control">
                                                            <option selected>Select</option>
                                                            <option>National</option>
                                                            <option>Provincial</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label-group">
                                                        <select id="ab_type" name="ab_type" class="form-control">
                                                            <option selected>Select</option>
                                                            <option>1AB</option>
                                                            <option>1C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <div class="form-label-group">
                                                            <select id="province_type" name="province_type" class="form-control" onchange="choiceProvince(this)">
                                                                <option selected>Select Province</option>
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
                                                                <option selected>Select District</option>
                                                                <option>Colombo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-label-group">
                                                            <select id="zone_type" name="zone_type" class="form-control" onchange="choiceDivision(this)">
                                                                <option selected>Select Zone</option>


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-label-group">
                                                            <select id="division_type" name="division_type" class="form-control">
                                                                <option selected>Select Division</option>

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
                                                    <label class="custom-control-label" for="customRadioInline2">Only up to O/L</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline3" name="acadamic" value="Up to A/L" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline3">Up to A/L</label>
                                                </div>
                                            </div>
                                            <hr>

                                            <!-- <div class="row">
                                                <legend class="col-form-label col-sm-3 pt-0">Type of O/L's</legend>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck5" name="localol" value="Local O/L">
                                                        <label class="custom-control-label" for="customCheck5">Local O/L</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck6" name="edexcelol" value="Edexcel O/L">
                                                        <label class="custom-control-label" for="customCheck6">Edexcel O/L</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck7" name="cambridgeol" value="Cambridge O/L">
                                                        <label class="custom-control-label" for="customCheck7">Cambridge O/L</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr> -->

                                            <!-- <div class="row">
                                                <legend class="col-form-label col-sm-3 pt-0">Type of A/L's</legend>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck8" name="localal" value="Local A/L">
                                                        <label class="custom-control-label" for="customCheck8">Local A/L</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck9" name="edexcelal" value="Edexcel A/L">
                                                        <label class="custom-control-label" for="customCheck9">Edexcel A/L</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck10" name="cambridgeal" value="Cambridge A/L">
                                                        <label class="custom-control-label" for="customCheck10">Cambridge A/L</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr> -->
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-block">Apply</button>
                                    </div>
                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>
                    </div>

                        <?php
                        if($type == 'Coordinator')
                        {
                            echo "
                            <div class=\"col-6\">
                            <div class=\"col-12\">
                                <h4 class=\"display-5\">
                                Already assigned schools
                                </h4>
                            </div>
                            ";
                        
                            if ($sch_det->num_rows()>0)
                            {
                                foreach ($sch_det->result() as $row)
                                {
                                    echo "
                                    <div class=\"row\">
                                        <div class=\"col-12\">
                                            <ul class=\"list-group\">
                                                <li class=\"list-group-item d-flex justify-content-between align-items-center\">$row->schoolName
                                                <p><a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=#d$row->sid><button class=\"btn btn-danger btn-xs\" data-title=#d$row->sid data-toggle=\"modal\" data-target=#d$row->sid data-placement=\"top\" rel=\"tooltip\"><i class=\"fas fa-trash-alt\"></i>
                                                </button></a></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>                   
                                    
                                    <div class=\"modal fade\" id='d$row->sid' tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                        <div class=\"modal-dialog\" role=\"document\">
                                            <div class=\"modal-content\">
                                                <div class=\"modal-header\">
                                                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Unallocate school?</h5>
                                                    <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                        <span aria-hidden=\"true\">×</span>
                                                    </button>
                                                </div>
                                                <div class=\"modal-body\">Are you sure you want to unallocate this school??</div>
                                                <div class=\"modal-footer\">
                                                    <button class=\"btn btn-secondary\" type=\"button\" data-dismiss=\"modal\">Cancel</button>
                                                    <a class=\"btn btn-primary\" href=\"undoAllocation?school_id=$row->sid&user_id=$uid\">Unallocate<?php endif;?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     

                                    ";
                                }

                            }
                            else
                            {
                                echo "
                                <div class=\"row\">
                                <div class=\"col-12\">
                                    <ul class=\"list-group\">
                                        <li class=\"list-group-item\">No Schools have been assigned yet</li>
                                    </ul>
                                </div>
                                </div>
                                ";
                            }
                        }
                        elseif($type == 'School Admin')
                        {

                            
                            echo "
                            <div class=\"col-6\">
                                <div class=\"card mb-3\">
                                    <div class=\"card-header\">
                                        Assigned School
                                    </div>
                                </div>
                            ";

                            if($sch_det->num_rows()>0)
                            {
                                foreach ($sch_det->result() as $row)
                                {
                                    $ssid = $row->sid;
                                    $sname = $row->schoolName;
                                    $scity = $row->city;
                                }

                                echo "
                                <div class=\"card-body\">
                                    <p align=\"centre\">$sname</p>
                                    <p align=\"centre\">$scity</p>
                                </div>
                                <div class=\"card-footer\">
                                <a  class=\"btn btn-info btn-block\" href=\"undoSchoolAdmin?school_id=$ssid&user_id=$uid\">Unassign this school?</a>
                                </div>
                                </div>";
                            }
                            
                            else
                            {
                                echo "
                                <div class=\"card-body\">
                                <div class=\"row\">
                                    <div class=\"col-12\">
                                    No school is assigned yet
                                    </div>
                                </div>
                                </div>
                                </div>
                                ";
                            }
                        }
                        ?>

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
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 10000);
</script>

<script>
$(document).ready(function(){

load_data();

function load_data(query)
{
 $.ajax({
  url:"<?php echo base_url(); ?>adminController/fetchSchools?op=<?php echo $uid ?>",
  method:"POST",
  data:{query:query},
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

<script>
// function choice1(select) {
//     if(select.options[select.selectedIndex].text == 'Public'){
//         document.getElementById("national_type").disabled=false;
//         document.getElementById("ab_type").disabled=false;
//         document.getElementById("1002_type").disabled=false;
//     }else{
//         document.getElementById("national_type").disabled=true;
//         document.getElementById("ab_type").disabled=true;
//         document.getElementById("1002_type").disabled=true;
//     }
// }

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




