<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

$bankImport = new BankImport();

$bankImport->where('id',$fkeys['itemid'])->get();

//var_dump($bankImport);

$studentinfo = new StudentDetails();

$matched = $studentinfo->search_student(array('name'=>$bankImport->student_name,'reg_id'=>$bankImport->student_id));

 $accrow = $fkeys['itemrow'];
$modalTitle = "Matching:<span class='badge badge-primary'>"  . $bankImport->student_name .( empty($bankImport->student_id)?"":"({$bankImport->student_id})") . "</span>. Payinslip: <span class='badge badge-primary'>" . $bankImport->payinslip_id . " </span> Paid on : <span class='badge badge-primary'>" . $bankImport->date_of_deposit ."</span> At : <span class='badge badge-primary'>" . $bankImport->bank_branch ."</span>";
//var_dump($data);
 echo form_open(base_url() ."ajax_load/student_payments?type=link_bank_fee",'class="closedform stdform stdform2" id="add-bank_link-data"',array('token'=>$currenttoken) + $fkeys);     ?>

<p style="display: block">
    <label>Found Matches&nbsp;&nbsp;<span class="badge badge-inverse"><?= $matched['count'] ?> </span><small>Students Matching the selected index/name
            <?php if($matched['count']){ ?>
            <br> Priority is set to registration Number typed only in the input box only <?php } ?> </small></label>
    <span class="field" style="display: block">
        <?php
            if($matched['count']){
               foreach($matched['list'] as $id => $st){
                   $cnt = $id +1;
                   echo "
                      <label> <span class='badge'>{$cnt}</span> <input type='radio' name ='selected_student' value='{$st->registration_number}'>
                       {$st->last_name}, {$st->first_name}   {$st->middle_name} <br><small style='padding-left: 40px'> <span class='badge badge-success'>{$st->registration_number}</span> or <span class='badge badge-info'>{$st->index_number}</span></small> </label>
                  ";

                    }
                echo "<br>  ";
            }else{
                echo "<small class='badge badge-warning'>No Matches Found</small><br>";
               echo "<br>";
            }
        ?>
        <input type="text" name="student_id" value="" class="input-xlarge required-data" placeholder="Enter registration id manually here">
    </span>
    </p>


<?php
echo form_close();

$actionBtn ='<button style=\'left:0px\' type="button" class="btn btn-primary " id="bank_link-data-btn" target-div="#bank_link-list-contents" skip="0"  target-modal="#add-item-data" next-item=" '.$fkeys['itemrow'].'" target-form="#add-bank_link-data"><i class="icon-save"></i>&nbsp;&nbsp; Save and Apply to Student</button>';


//echo $actionBtn;
?>


 <div style="display: none">
     <script>

         updateModaltitle(1,'<?= addslashes($modalTitle) ?>','<?php echo addslashes($actionBtn) ?>') ;

        jQuery("input[name='selected_student']").click(function(){
            var inval = jQuery(this).val();
            jQuery('input[name="student_id"]').val(inval);
            jQuery('input[name="student_id"]').removeClass("inputError").siblings(".text-error").remove();
        });
       jQuery("#bank_link-data-btn").click(function(){

             var valid = validate_form(jQuery("#add-bank_link-data"));

           if(valid){
               var target = jQuery("#add-bank_link-data").attr("action");
               var formdata = jQuery("#add-bank_link-data").serialize();
               console.log(formdata)
jQuery.post(target,formdata,function(rdata,xhr){
     if(xhr == 'success'){
         if(rdata.error == true){
             jQuery.growl.warning({title:"Update status information",message:rdata.message})
             alert_warning('danger',rdata.message)
         }else{
             jQuery("#<?= $accrow ?>").find('td:nth-child(2)').html("<span class=' text-success'><i class='icon-ok'></i>&nbsp;&nbsp;Linked</span>")
             alert_warning('success',rdata.message)
             jQuery.growl.notice({title:"Update status information",message:rdata.message})
         }
     }else{
         alert_warning('warning',"There is network Error!! Please Retry")
     }
})
           }else{
               jQuery.growl.warning({title:'Missing Information',message:"Make Sure required information is provided"})
           }
       })
     </script>

 </div>
