<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/5/14
 * Time: 11:30 AM
 */

class SASStudent extends CI_Model{
    public $sasdb ;
    function __construct(){
        parent::__construct();

       //  $this->config->load('sas_database',true);
        //  $sasconfig = $this->config->item('sas_database');
     // $this->sasdb = $this->load->database('sas_db',true);

    }

    function selected_students(){
         $applicants = new SASAdmin();
        $list = $applicants->get_allapplicants('all',0,'','','selected',0);
       return $list;
    }

    function count_list(){
        $applicants = new SASAdmin();
        $list = $applicants->get_allapplicants('all',0,'','','selected',1);

        return count($list);
    }

    function draw_html_json(){
        $currenttoken = $this->session->userdata('formtoken');
        $parameters = $this->input->post();
        $apps = $this->selected_students($parameters);
       // var_dump($apps);
        $output = array('data'=>false);
        if(!isset($parameters['start'])){
            $parameters['start'] = 0;
        }
        if(!isset($parameters['length'])){
            $parameters['length'] = count($apps);
            $parameters['draw'] = 0;
        }

        $output = array(
            'draw'=> (int) $parameters['draw'],
            'recordsTotal' => (int) ($this->count_list()),
            'recordsFiltered' => (int)  count($apps),
            'data'=> false
        );



        $length = $parameters['length'] + $parameters['start'];
            for($x = $parameters['start']; $x < $length ; $x++){
                 //var_dump($apps[$x]);die();
                $dto = new stdClass();
                $actionurl = base_url() . "admin/admit_applicant?appid={$apps[$x]['app_id']}&fid={$apps[$x]['f_id']}";
                $admiturl = base_url() . "ajax_load/form?nextitem=%23rowid-{$x}&appid={$apps[$x]['app_id']}&fid={$apps[$x]['f_id']}&name=admit_applicant&token={$currenttoken} ";

                $btn = $apps[$x]['registered_id']== '-'?"<button class='btn btn-primary' target-url='{$actionurl}' data-toggle='modal' data-target='#add-item-data' href='{$admiturl}'><i class='glyphicon glyphicon-plus-sign'></i>&nbsp;&nbsp;Admit</button>":$apps[$x]['registered_id'];

                $entrymode = $apps[$x]['sel_entry']?"<span data-entrymode='{$apps[$x]['sel_entry']}' class='badge badge-warning'>".strtoupper(entry_mode($apps[$x]['sel_entry'],false))."</span>":"<span data-entrymode='{$apps[$x]['sel_entry']}' class='badge badge-success'>".strtoupper(entry_mode($apps[$x]['sel_entry'],false))." </span>";

                $dto->chk_box =  "<input type='checkbox' class='applicants' name='applicant_list[]' value='{$apps[$x]['f_id']}' >";
                $dto->li_id = $x + 1;
                $dto->student_id = "<span style=\"color: #555\" >{$apps[$x]['f_id']} <br>(<small class=\"text-info\" >{$apps[$x]['app_id']}</small>)</span> ";
                $dto->admission_id = $btn;
                $dto->name = name_format($apps[$x]['fname'],$apps[$x]['mname'],strtoupper($apps[$x]['lname']),0) ;
                $dto->gender = $apps[$x]['gender'];
                $dto->phone = $apps[$x]['mobile_number'];
                $dto->selected_course  = "<small data-toggle=\"tooltip\" title=\"{$apps[$x]['selected_course']}\" class='text-success'> {$apps[$x]['selected_code']} </small>";
                $badge =  $apps[$x]['batch']== 1?"success":"warning" ;
                $dto->batch = "<span class=\"badge badge badge-$badge\"> {$apps[$x]['batch']}</span>";
                $dto->applied_course = "<span class='text-info small'><small>{$apps[$x]['app_choices']}</small></span>";
                $dto->DT_RowId = "rowid-". $x;
                $dto->entry_mode = $entrymode;
                $output['data'][] = $dto;

                if($output['recordsFiltered'] == $x + 1 ){
                    break;
                }
            }
           return $output;
        }

} 
