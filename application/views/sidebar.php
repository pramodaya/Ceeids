<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>users/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <?php if ($this->session->userdata('type') == 'Admin'): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>adminController/userRegistration">
                <i class="fas fa-id-card"></i>
                <span>User Registration</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>adminController/userView">
                <i class="fas fa-edit"></i>
                <span>Manage Users</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>adminController/importUsers">
                <i class="fas fa-compact-disc"></i>
                <span>Import Students </span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>adminController/assignUsers">
                <i class="fas fa-pencil-ruler"></i>
                <span>Assign User Role</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>adminController/createSchoolDesignation">
                <i class="fas fa-ruble-sign"></i>
                <span>Create New School Designation</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>adminController/createNewSchool">
                <i class="fas fa-building"></i>
                <span>Create a New School</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>adminController/allocateSchool">
                <i class="fas fa-magic"></i>
                <span>Assign Schools to Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>AssignSchools/index/">
                <i class="fas fa-fw fa-university"></i>
                <span>Manage Schools</span>
            </a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>schoolContacts/addUsers?sid=1">
                <i class="fas fa-adjust"></i>
                <span>Add School Users</span></a>
        </li>
<!-- -------------------------------------------------------------------------------------------------------------------- -->

    <?php endif; ?>
   
	<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

    <?php if ($this->session->userdata('type') == 'School Admin'): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>schoolContacts/index/">
                <i class="fas fa-fw fa-university"></i>
                <span>Manage Schools</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>schoolContacts/sendFiletoAdmin?sid=<?php echo $this->session->userdata('sid');?>">
                <i class="fas fa-file-excel"></i>
                <span>Send File to Admin </span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>schoolContacts/assignStudentsToEvent">
                <i class="fas fa-file-signature"></i>
                <span>Assign Students to an Event </span></a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>schoolContacts/addUsers?sid=<?php echo $this->session->userdata('sid');?>">
                <i class="fas fa-adjust"></i>
                <span>Add School Users</span></a>
        </li>
    <?php endif; ?>

	<!-- ------------------------------------------------------------------------------------------------ -->

    <?php if ($this->session->userdata('type') == 'Coordinator'): ?>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>posts/">
                <i class="fas fa-id-card"></i>
                <span>View Log</span></a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>schoolContacts/index/">
                <i class="fas fa-fw fa-university"></i>
                <span>Manage Schools</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>events?sid=<?php echo $this->session->userdata('sid');?>">
                <i class="fas fa-id-card"></i>
                <span>Create Event</span></a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>schoolContacts/addUsers?sid=<?php echo $this->session->userdata('sid');?>">
                <i class="fas fa-adjust"></i>
                <span>Add School Users</span></a>
        </li>


    <?php endif; ?>



</ul>
