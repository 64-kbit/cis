<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by oau.
 * User: admin :: This file holds the view required to display a single semester structure
 * Date: 9/12/14
 * Time: 3:52 PM
 */ 

   switch($viewtype) {
       case 'li-tabbed': ?>
           <li class="new"><a data-toggle="tab" href="<?= base_url()?>ajax_load/html_data?itemtype=semester_structure&itemid=<?= $Object->id ?>"><?= $Object->name ."(".$Object->code_name .")<span class='badge badge-inverse'>".$Object->count."</span>"?></a></li>
           <?php
       break;
       case 'list': ?>
<?php } ?>
