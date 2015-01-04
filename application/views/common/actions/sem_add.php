<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if(isset($permissions) && $permissions['add_sem'] || true): ?>

    <div class="btn-group">
        <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="fa fa-th"></i>&nbsp;<span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>ajax_load/form?name=academic_year&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#add-item-data"><i class="fa fa-plus"></i> New Academic Year&nbsp;</a></li>
        </ul>
    </div>
    <h4 class="widgettitle title-primary">Academic Years</h4>

<?php else : ?>

<h4 class="widgettitle title-primary">Academic Years</h4>

<?php endif ?>
