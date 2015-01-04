<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="table-responsive" >
    <table class="table  table-condensed table-bordered" >
        <thead>
        <tr class="thead">
            <th>#</th>
            <th>Login ID</th>
            <th>User Name</th>
            <th>Role</th>
            <th>Date Created</th>
            <th>last Active</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 1;
        if($userslist['list']){
            foreach($userslist['list'] as $id => $usr){
                $onlineStatus = $usr['status'];
                $bl = base_url()."admin/user_edit";
                echo "<tr class='warning'>
                                <td>{$count}</td>
                                <td>{$usr['login_id']} </td>
                                <td> " . name_format($usr['fname'],$usr['mname'],$usr['lname'],0). "</td>
                                <td>{$usr['role_title']} </td>
                                <td>{$usr['dt_registered']} </td>
                                <td>{$usr['last_active']} </td>
                                <td>"
                ;
                echo $onlineStatus;

                echo "</td>
                                <td>
                                <a href='$bl?act=remove&wt=user&wh={$usr['login_id']}' title='Remove this {$usr['login_id']}'>
                                <span class='glyphicon glyphicon-trash'></span>
                                Remove</a>   <a data-toggle='modal' data-target='#edit_user' href='$bl?act=edit&wt=user&wh={$usr['login_id']}' title='Edit this {$usr['login_id']}'>
                                 <span class='glyphicon glyphicon-edit' ></span>
                                Edit</a> </td>
                                <tr>
                            </tr>";
                $count++;
            }
        }else{
            echo "<tr class='info'><td colspan='6'>No Users Added So Far!</td></tr>";
        }

        //var_dump($userslist);
        ?>
        </tbody>
    </table>
</div>
