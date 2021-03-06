<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Employees</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Employees</a></li>
                <li class="active">Add Employee</li>
            </ol>                        
            <?php $this->load->view('admin/assets/menu_e'); ?>
            <hr>
            <?php echo $this->session->flashdata('msg'); ?>
            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Employee
                    </div>
                    <div class="panel-body">
                        <?php echo form_open_multipart('admin/add_employee'); ?>
                        <div class="form-group col-lg-6">                                    
                            <label>First Name</label>
                            <?php
                            $fname = array('id' => 'fname',
                                'name' => 'fname',
                                'class' => 'form-control'
                            );
                            echo form_input($fname);
                            ?><?php echo form_error('fname'); ?>
                        </div>
                        <div class="form-group col-lg-6">                                    
                            <label>Last Name</label>
                            <?php
                            $lname = array('id' => 'lname',
                                'name' => 'lname',
                                'class' => 'form-control'
                            );
                            echo form_input($lname);
                            ?>
                            <?php echo form_error('lname'); ?>
                        </div>
                        <div class="form-group col-lg-8">
                            <label>Email</label>
                            <?php
                            $email = array('id' => 'email',
                                'name' => 'email',
                                'class' => 'form-control'
                            );
                            echo form_input($email);
                            ?>
                            <?php echo form_error('email'); ?>
                        </div>                        
                        <div class="form-group col-lg-4">
                            <label> @ Leidos</label>
                            <div class="form-div form-control">@leidos.com</div>
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Username</label>
                            <?php
                            $uname = array('id' => 'username',
                                'name' => 'username',
                                'class' => 'form-control'
                            );
                            echo form_input($uname);
                            ?>
                            <?php echo form_error('username'); ?>
                        </div>

                        <div class="form-group col-md-6" style="margin-bottom: 0px;">
                            <label>Password</label>
                            <?php
                            $pass = array('id' => 'password',
                                'name' => 'password',
                                'class' => 'form-control'
                            );
                            echo form_password($pass);
                            ?>
                        </div>
                        <div class="form-group col-md-6" style="margin-bottom: 0px;">
                            <label>Repeat Password</label>
                            <input type="password" name="passconf" class="form-control" placeholder="Repeat Password" id="" value="">                                        
                        </div> 
                        <div class="col-md-12" style="margin-bottom: 20px;"> 
                            <?php echo form_error('password'); ?>
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Role</label>
                            <?php
                            $role = array(
                                'Employee' => 'Employee',
                                'Project Manager' => 'Project Manager',
                                'Admin' => 'Admin',
                            );
                            echo form_dropdown('role', $role, 'employee', 'class = "form-control"');
                            ?>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Designation</label>
                            <?php
                            $designation = array('id' => 'designation',
                                'name' => 'designation',
                                'class' => 'form-control'
                            );

                            echo form_input($designation);
                            ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Category</label>
                            <?php
                            $category = array(
                                'Developer' => 'Developer',
                                'Designer' => 'Designer',
                                'Quality' => 'Quality Assurance',
                                'Sales' => 'Sales and Marketing',
                                'Management' => 'Management'
                            );
                            echo form_dropdown('category', $category, 'developer', 'class = "form-control"');
                            ?>
                            <?php echo form_error('role'); ?>
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Department</label>
                            <?php
                            $sector = array(
                                'Civil' => 'Civil',
                                'Defense' => 'Defense',
                                'Security' => 'Intelligence & Homeland Security',
                                'Health' => 'Health',
                                'Advance Solutions' => 'Advance Solutions',
                            );

                            echo form_dropdown('sector', $sector, 'civil', 'class = "form-control"');
                            ?>
                            <?php echo form_error('role'); ?>
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Location</label>
                            <?php
                            $location = array(
                                'United Arab Emirates' => 'United Arab Emirates',
                                'United Kingdom' => 'United Kingdom',
                                'South Korea' => 'South Korea',
                                'Spain' => 'Spain',
                                'Canada' => 'Canada',
                                'United States' => 'United States',
                            );
                            echo form_dropdown('location', $location, 'United Arab Emirates', 'class = "form-control"');
                            ?>
                        </div>
                        <input type="hidden" name="userfile" id="imgInp">
                    </div>
                    <div class="panel-footer">
                        <?php echo form_submit(array('id' => 'success-btn', 'value' => 'Register', 'class' => 'btn', 'name' => 'submit')); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/assets/footer');
