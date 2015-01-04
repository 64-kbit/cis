<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="panel panel-default" >
    <div class="panel-heading">
        <div class="panel-title">
            <span class="glyphicon glyphicon-th"></span>
           Edit Account
        </div>



    </div>

    <div class="panel-body">
        <form class="form-horizontal ng-pristine ng-valid" role="form" method="POST" action="login">
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
                    if(isset($login_error) && $login_error){
                        echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>$login_error</div>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="email" bbb class="col-sm-3 control-label">User name</label>
                    <div class="col-sm-6">
                        <?php echo form_input('username',filter_input(INPUT_POST,'username'),'class="form-control" required aria-required="true" placeholder="Login ID" autocapitalize="off"') ?>                             <?php
                        if(form_error('username','<span>','</span>')){
                            echo "<span class='' role=''>".
                                form_error('username','<span>','</span>')
                                ."</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="first name" bbb class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-6">
                        <?php echo form_input('fname',filter_input(INPUT_POST,'fname'),'class="form-control" required aria-required="true" placeholder="First name" autocapitalize="off"') ?>
                        <?php
                        if(form_error('fname','<span>','</span>')){
                            echo "<span class='' role=''>".
                                form_error('fname','<span>','</span>')
                                ."</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle name" bbb class="col-sm-3 control-label">Middle Name</label>
                    <div class="col-sm-6">
                        <?php echo form_input('mname',filter_input(INPUT_POST,'mname'),'class="form-control" required aria-required="true" placeholder="Middle name" autocapitalize="off"') ?>                             <?php
                        if(form_error('mname','<span>','</span>')){
                            echo "<span class='' role=''>".
                                form_error('mname','<span>','</span>')
                                ."</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Last name" bbb class="col-sm-3 control-label">Last name</label>
                    <div class="col-sm-6">
                        <?php echo form_input('lname',filter_input(INPUT_POST,'lname'),'class="form-control" required aria-required="true" placeholder="Last name" autocapitalize="off"') ?>                             <?php
                        if(form_error('lname','<span>','</span>')){
                            echo "<span class='' role=''>".
                                form_error('lname','<span>','</span>')
                                ."</span>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <?php echo form_password('password',set_value('password',''),'class="form-control" required aria-required="true" placeholder="Password"') ?>
                    <?php
                    if(form_error('password','<span>','</span>')){
                        echo "<span class='sm-danger text-danger'>".
                            form_error('password','<span>','</span>')
                            ."</span>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="role" class="col-sm-3 control-label">Role</label>
                <div class="col-sm-6">
                    <?php echo form_dropdown('role',$role=array('','administrator','user','treasurer','secretary','chairman'),$role[0],'class="form-control" required aria-required="true"')?>
                    <?php
                    if(form_error('role','<span>','</span>')){
                        echo "<span class='sm-danger text-danger'>".
                            form_error('role','<span>','</span>')
                            ."</span>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="dt_registered" class="col-sm-3 control-label">Date Registered</label>
                <div class="col-sm-6">
                    <?php echo form_input('dt_registered',filter_input (INPUT_POST,'dt_registered'),'class="form-control" required aria-required="true" placeholder="Date registered" autocapitalize="off"') ?>
                    <?php
                    if(form_error('dt_registered','<span>','</span>')){
                        echo "<span class='sm-danger text-danger'>".
                            form_error('dt_registered','<span>','</span>')
                            ."</span>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="submit button" class="col-sm-3 control-label"></label>
                <div class="col-sm-6" >
                   <button type="submit" class="btn btn-primary btn-lg active">Submit</button>

                                 <?php
                    if(form_error('submit','<span>','</span>')){
                        echo "<span class='sm-danger text-danger'>".
                            form_error('submit','<span>','</span>')
                            ."</span>";
                    }
                    ?>
                </div>
            </div>

            </div>
        </form>
    </div>
</div>

