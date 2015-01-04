<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
class Department Extends CI_Model {

    public $config = array();


    function __construct(){
        parent::__construct();
        $this->load->model('System_core');
        $this->config = $this->System_core->config;
      //  $this->dbOb = new $this->db ;
    }
      /* Department CRUD OPS */
    function get_department_list($type = 'academic'){
         if($type){
             switch($type){
                 case 'other_dp':
                     $result =  $this->db->get(db_tables('other_dp'));
                     break;
                 default:
                    $result =  $this->db->get(db_tables('acd_dp'));
             }



             if($result->num_rows > 0){
                 $list['list'] = $result->result_array();

                 $list['count'] = $result->num_rows();

                 return $list;
             }else{
                 return array('count'=> 0);
             }

         }else{
             return array('count'=>0);
         }


    }

    function get_department($id,$faculty,$campus,$type){
        if($campus && isset($id)){
        switch($type){
            case 2:
                $this->db->where(array('dp_id'=>$id,'campus_id'=>$campus));
                $table =  db_tables('other_dp');
                break;
            default:
                $this->db->where(array('dp_id'=>$id,'campus_id'=>$campus,'facult_id'=>$faculty));
                $table =  db_tables('acd_dp');
        }

          $result =   $this->db->get($table);
            if($result->num_rows() > 0) {
                $data = $result->row_array();
                return $data;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    function update_department($id,$newdata,$type){
        if(isset($id) && array($newdata)){
            $dp = new DpDepartment($id);
            switch($type){

                case 2:
                   $dp->removed = 0 ;
                   $dp->code_no =  $newdata['dp_number'];
                   $dp->description = $newdata['dp_description'];
                       $dp->head = $newdata['dp_head'] ;
                   $dp->campus_id = $newdata['dp_campus'];
                   $result = $dp->save();
                    break;
                default:
                    $dp->code = $newdata['dp_code'] ;
                    $dp->code_no =  $newdata['dp_number'];
                    $dp->description = $newdata['dp_description'];
                    $dp->head = $newdata['dp_head'] ;
                    $dp->name = $newdata['dp_name'];
                    $dp->campus_id = $newdata['dp_campus'];
                    $dp->removed = 0;
                    $dp->type = $newdata['dp_type'] ;
                    $dp->facult_id = $newdata['dp_facult'];
                    $result = $dp->save();
                    break;
            }


            if($result){
                return array('status'=>true,'msg'=>'Department Information Updated Successfully');
            }else{
                return array('status'=>false,'msg'=>'Failed to Update Department Information');
            }
        }else{
            return array('status'=>false,'msg'=>'Missing data');
        }
    }

    function add_department($facult,$campus,$data,$type){
        if(isset($campus) && array($data)){
            switch($type){
                case 2:
                    $newdata = array(
                        'name'=>$data['dp_name'],
                        'description'=> $data['dp_description'],
                        'head'=> $data['dp_head'],
                        'campus_id'=> $data['dp_campus'],
                        'removed' => 0
                    );
                    $table = db_tables('other_department_table');
                    break;
                default:
                    $newdata = array(
                        'code'=> $data['dp_code'],
                        'name'=>$data['dp_name'],
                        'code_no'=> $data['dp_number'],
                        'description'=> $data['dp_description'],
                        'head'=> $data['dp_head'],
                        'campus_id'=> $data['dp_campus'],
                        'facult_id'=> $data['dp_facult'],
                        'type'=> $data['dp_type'],
                        'removed' => 0
                    );
                    $table = db_tables('department_table');
                    break;
            }


            $result = $this->db->insert($table,$newdata);
             $insert_id = $this->db->insert_id();

            if($result){
                return array('status'=>true,'msg'=>$this->get_department($insert_id,$facult,$campus,$type));
            }else{
                return array('status'=>false,'msg'=>'Failed to Insert');
            }
        }else{
            return array('status'=>false,'msg'=>'Missing Data');
        }
    }

    function remove_department($id,$facult,$campus,$mode= 0,$type){
        //$this->db->trans_start();
        if($mode){

           $status =  $this->db->delete(db_tables('department_table'),array('id'=>$id,'facult_id'=>$facult,'campus_id'=>$campus));

            return false;
        }else{
            $this->db->where(array('id'=>$id,'facult_id'=>$facult,'campus_id'=>$campus));
            $this->db->update($type == 1?db_tables('department_table'):db_tables('other_department_table'),array('removed'=> 1));
            return true;
        }

       // $this->db->trans_complete();
    }

    /* Faculty CRUD OPS */

    function get_faculty_list($type){
        $result = $this->db->get(db_tables('faculty_view'));

        $data =   array('list'=>$result->result_array(),'count'=>$result->num_rows()) ;

        return $data;
    }

    function get_faculty($id,$campus){
        $this->db->where(array('id'=>$id,'campus_id'=>$campus));
          $result = $this->db->get(db_tables('faculty_view'));

        $data['status'] = $result->num_rows();
        $data['data'] = $result->row_array();

        return $data;
    }

    function update_faculty($id,$newdata){
        if(isset($id) &&  is_array($newdata)){
              $fac = new DpFaculty($id);
              $fac->campust_id = $newdata['fc_campus'];
              $fac->facult_name = $newdata['fc_name'];
                  $fac->head = $newdata['fc_head'];
                      $fac->date_created =   $newdata['fc_startdate'];
           $status = $fac->save();

            $ustat['status'] = $status ;
            $ustat['msg'] = "Faculty Information Successfully Updated!";
        }else{
            $ustat['status'] = false;
            $ustat['msg'] = 'Missing Data';
        }

        return $ustat;
    }

    function add_faculty($campus,$data,$type){
        if(is_array($data)){

            $newdata = array(
                'campus_id'=>$data['fc_campus'],
                'facult_name' => $data['fc_name'],
                'head'=> $data['fc_head'],
                'date_added' => $data['fc_startdate']
            );


            $this->db->trans_start();
            $result = $this->db->insert(db_tables('faculty_table'),$newdata);
            $id = $this->db->insert_id();
            $this->db->trans_complete();
            $ustat['status'] = $result ;
            $ustat['msg'] = $this->get_faculty($id,$data['fc_campus']);
        }else{
            $ustat['status'] = false;
            $ustat['msg'] = 'Missing Data';
        }

        return $ustat;
    }

    function remove_faculty($id,$campus,$mode= 0,$type){
          if($id && $campus ){
              $this->db->trans_start();
              if($mode){
                    $this->db->delete(db_tables('faculty_table'),array('id'=>$id,'campus_id'=>$campus));
                  return true;
              }else{
                  $this->db->where(array('id'=>$id,'campus_id'=>$campus));
                  $this->db->update(db_tables('faculty_table'),array('removed'=>1));
              }

              $this->db->trans_complete();
          }
    }

    /* Campus CRUD OPS */

    function get_campus_list(){
         $result = $this->db->get(db_tables('campus_view'));

        $data['count'] = $result->num_rows();
        $data['list'] = $result->result_array();

        return $data;
    }

    function get_campus($id){
       if($id){
           $this->db->where('id',$id);
          $result = $this->db->get(db_tables('campus_table'));
          $data['status'] = $result->num_rows();
           $data['data'] = $result->row_array();

           return $data;
       }else{
           return false;
       }
    }

    function update_campus($id,$newdata){

        $campus = new DpCampus($id);

        if($id && is_array($newdata)){
            $campus->code_name = $newdata['cm_code'];
            $campus->name = $newdata['cm_name'];
            $campus->location = $newdata['cm_location'];
            $campus->head = $newdata['cm_head'] ;
            $campus->campus_type = $newdata['cm_type'] ;
            $campus->year_created = $newdata['cm_startdate'] ;
            $result = $campus->save();

            $status['status'] = $result;
            $status['msg'] = "Data Successfully Updated!";


        }else{
            $status['status'] = false;
            $status['msg'] = 'Missing Data';
        }
        return $status;
    }

    function add_campus($newdata,$mode= 1){
        if($mode == 2){
          $status= $this->update_campus($newdata['itemid'],$newdata);
        }else{
        if(is_array($newdata)){
            $data = array(
                'code_name' => $newdata['cm_code'],
                'name' => $newdata['cm_name'],
                'location' => $newdata['cm_location'],
                'head' => $newdata['cm_head'],
                'campus_type' => $newdata['cm_type'],
                'details' => '',
                'doc_links' => "",
                'removed' => 0,
                'year_created' => $newdata['cm_startdate']
            );

            //$this->db->trans_start();
            $result = $this->db->insert(db_tables('campus_table'),$data);
            $id =  $this->db->insert_id();
            //$this->db->trans_complete();

            $status['status'] = 1;
            $status['msg'] = $this->get_campus($id);
        }else{
            $status['status'] = false;
            $status['msg'] = 'Missing Data';
        } }
        return $status;
    }

    function remove_campus($id,$mode= 0){
      //  $this->db->trans_start();
       if($mode){
            //$this->db->delete(db_tables('campus_table'),array('int'=>$id));
       }else{
            $this->db->where('id',$id);
           $this->db->update(db_tables('campus_table'),array('removed'=>1));
       }
      //  $this->db->trans_complete();
    }

}
