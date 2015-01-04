<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

$fees = new FeeStructure();
$feeItems = new FeeFigures();
$stcategory = new StudentCategory();
$stcategory->get();
$stCat = array();
foreach($stcategory->all as $ct){
    $stCat[$ct->id] = $ct->name;
}

$feeItemsList = $feeItems->get_list();
$feesList = $fees->get_list();

?>


<div class="span12" >
    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li>
                <a href="#tab-1">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp; Current Fee Structures</h4> </a>
            </li>

            <li>
                <a href="#tab-2">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp; Previous Fee Structures</h4> </a>
            </li>

            <li><a href="#tab-3">
                    <h4 class=""><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp; Payments Items</h4>
                </a>
            </li>
            <li><a href="#tab-4">
                    <h4 class=""><i class="glyphicon glyphicon-tag"></i>&nbsp;&nbsp;Fee Sponsors Categories</h4>
                </a>
            </li>
        </ul>

        <div id="tab-1">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=fee_structure&token=<?php echo $currenttoken ?>"><i class="fa fa-plus"></i>&nbsp;Add New Structure</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="alert('Not Implemented')"><i class="fa  fa-print"></i>&nbsp;Print List</a></li>
                    </ul>
                </div>
            </div>
            <div class="no-padding" style="min-height: 400px">
                <table class="table table-bordered responsive dataTable"  id="fee_structure-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1" style="width:30%">
                        <col class="con0" style="width:24%">
                        <col class="con1">
                        <col class="con0">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Structure Name</th>
                        <th>Amount</th>
                        <th>Year</th>
                        <th>Description</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                   <tbody count-indicator=".fee_structure-count-indicator" id="fee_structure-list-contents<?php //echo $dp_type; ?>">
                        <?php
                            if($feesList['count'] > 0 ){
                                foreach($feesList['list'] as $id => $item){
                                    if($item->is_enabled == 0){
                                        continue;
                                    }
                                    $feesurl  = base_url() . "ajax_load/form_edit?itype=fee_structure&itemid=".$item->id;
                                    $itemsurl = base_url() . "ajax_load/form_edit?itype=fee_structure_items&itemid=".$item->id;
                                    ?>
                               <tr>
                                   <td class="row-head"><?= $id + 1 ?> </td>

                                   <td><span class="item-title"><?= $item->name ?></span><br>
                                       <ul class="data-item-controls list-nostyle list-inline" item-type="">
                                           <li  title="Edit Fee This Fee Structure">
                                   <a class="text-info" data-toggle="modal" data-target="#add-item-data" href="<?= $feesurl ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
                                           <li  title="Edit Fee Structure Items">
                                           <a class="text-success" data-toggle="modal" data-target="#edit-item-data" href="<?= $itemsurl ?>"><i class="fa fa-list"></i>&nbsp;&nbsp;Items</a></li>
                                           </ul>
                                       </span>
                                   </td>
                                   <td><span class='text-success'>
                                           <?= number_format($item->amount,0)?> TZS</span> &nbsp;
                                       (<span> Min: <small class="text-info"> <?=  number_format($item->minimum_amount,0 )?>
                                           </small> TZS)</span>
                                           <br>
                                       <span class='text-info'>
                                           <?= number_format($item->amount_foreign,2 )?> USD</span> &nbsp;
                                       (<span> Min: <small class="text-warning"> <?=    number_format($item->minimum_foreign,2 )?>
                                           </small> USD)</span>
                                   </td>

                                   <td><?= $item->notation ?></td>
                                   <td><small class="text-primary"><?= $item->description ?></small></td>
                               </tr>
                           <?php     }
                            }
                        ?>
                    </tbody>
                    </table>
                <?php

                ?>
                </div>

        </div>

        <div id="tab-2">
            <div class="no-padding" style="min-height: 400px">
                <table class="table table-bordered responsive dataTable"  id="fee_structure-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1" style="width:30%">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Structure Name</th>
                        <th>Total Amount</th>
                        <th>Year</th>
                        <th>Description</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                    <tbody count-indicator=".fee_structure-count-indicator" id="fee_structure-list-contents<?php //echo $dp_type; ?>">
                    <?php
                    if($feesList['count'] > 0 ){
                        foreach($feesList['list'] as $id => $item){
                            if($item->is_enabled == 1){
                                continue;
                            }
                          //  $feesurl  = base_url() . "ajax_load/form_edit?itype=fee_structure&itemid=".$item->id;
                            $itemsurl = base_url() . "ajax_load/form_edit?itype=fee_items&itemid=".$item->id;
                            ?>
                            <tr>
                                <td class="row-head"><?= $id + 1 ?> </td>

                                <td><span class="item-title"><?= $item->name ?></span><br>
                                   <span class="data-item-controls">
                                   <button class="btn btn-primary" data-toggle="modal" data-target="#view-item-data" href="<?= $itemsurl ?>"><i class="glyphicon glyphicon-list"></i>&nbsp;Items</button>
                                       </span>
                                </td>
                                <td><span class='text-success'><?= number_format($item->total_pay_amount,2 )?></span><br>(Minimum:<small class="text-info"><?= empty($item->minimum_percentage)?"--":number_format((($item->minimum_percentage/100) * $item->total_pay_amount),2 )?></small>)</td>

                                <td><?= $item->notation ?></td>
                                <td><small class="text-primary"><?= $item->description ?></small></td>
                            </tr>
                        <?php     }
                    }
                    ?>
                    </tbody>
                </table>
                <?php

                ?>
            </div>

        </div>

        <div id="tab-3">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=fee_items&token=<?php echo $currenttoken ?>"><i class="fa fa-upload"></i>&nbsp;Add New Item</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="alert('Not Implemented')"><i class="fa  fa-print"></i>&nbsp;Print List</a></li>
                    </ul>
                </div>
            </div>
            <div class="widget no-padding" style="min-height: 400px">
                <table class="table table-bordered responsive dataTable"  id="fee_items-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1">
                        <col class="con0">

                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Who Pays/(Student Category)</th>
                        <th>Description</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                    <tbody count-indicator=".fee_items-count-indicator" id="fee_items-list-contents<?php //echo $dp_type; ?>">
                    <?php
                    if($feeItemsList['count'] > 0 ){
                        foreach($feeItemsList['list'] as $id => $item){ ?>
                            <tr>
                                <td><?= $id + 1 ?> </td>
                                <td><span class='item-title'><?= $item->name ?></span></td>
                                <td><?= $item->student_category_type?$item->stcat_dname ."-(" . $item->stcat_name . ")":"All or Any" ?> </td>
                                <td><span class="text-success"><?= $item->description ?></span></td>

                            </tr>
                        <?php     }
                    }
                    ?>
                    </tbody>
                </table>

            </div>
                <?php

                ?>
        </div>

         <div id="tab-4">
             <div class="options-menu">
                 <div class="btn-group">
                     <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                     <ul class="dropdown-menu">
                         <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=sponsor_category&token=<?php echo $currenttoken ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Add New Category</a></li>
                         <li class="divider"></li>
                         <li><a href="#" onclick="alert('Not Implemented')"><i class="fa  fa-print"></i>&nbsp;Print List</a></li>
                     </ul>
                 </div>
             </div>
             <table class="table table-striped responsive">
                 <colgroup>
                     <col style="width:2%">
                 </colgroup>
                 <thead>
                    <th>#</th>
                    <th>Code Name</th>
                    <th>Description</th>
                    <th>Category</th>
                 </thead>
                 <tbody>
                            <?php
                            $sponsor = new StudentSponsor();
                            $sponsor->order_by('code_name','asc')->get();
                                foreach($sponsor->all as $id=> $sp){ ?>
                                  <tr>
                                      <td class="row-head"><?= $id + 1 ?> </td>
                                      <td><span class="item-title"><?= $sp->code_name ?>(<small><?= $sp->name ?></small>)</span></td>
                                      <td><?= $sp->description ?></td>
                                      <td><?= student_fee_category($sp->sponsor_category ) ?></td>
                                  </tr>
                              <?php  }
                            ?>
                 </tbody>
             </table>
         </div>
    </div>
 </div>

<div class="scripts">
    <script>
        jQuery(".dataTable").dataTable();
    </script>
</div>
