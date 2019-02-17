<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Student Management System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>


    <!-- Navbar Search -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" style="color: white">
        <?php
        if($this->session->userdata('username')){
            echo "<p>You are logged in as ".$this->session->userdata('username')."<p>";

        }

        ?>
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <?php if ($this->session->userdata('type') == 'Admin'): ?>
        <li class="nav-item dropdown no-arrow mx-1">
            <a  class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span id="desingationreq" class="badge badge-danger">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>adminController/manageRequests"><i class="fas fa-edit fa-fw"></i> Manage Requests</a>
            </div>
        </li>
		<li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span id="admin_messages" class="badge badge-danger">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>adminController/manageMessages">Messages <span id="admin_messages" class="badge badge-danger">0</span></a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="calenderDrpDown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-calendar-alt fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="eventsDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>adminController/createOrganizationalEvent"><i class="fas fa-pen fa-fw"></i> Create Organizational Event</a>
                <a class="dropdown-item" href="<?php echo base_url();?>adminController/selectSchoolEvent"><i class="fas fa-edit fa-fw"></i> Manage Organizational Events</a>
            </div>
        </li>
        <?php endif; ?>
        
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img style="border-radius: 50%;height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;" src="<?php echo base_url();?>assets/img/profileImages/<?php echo $this->session->userdata('imgUrl');?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/users/editProfile">Edit Profile</a>
                <a class="dropdown-item" href="#"><?php echo $this->session->userdata('fullname');?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

