<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/1/14
 * Time: 4:27 AM
 */

class StudentDetails extends DataMapper {
    public  $table = 'cis_students_details';
    function __construct($id = null){
        parent::__construct($id);
    }

    function get_details(){

    }

    function search_student($params){
        $status['list'] = false;
        $status['count'] = 0;
        $qr = new CustomQuery();
        $cols = array(
            'first_name',
        );
        if(isset($params['reg_id'])){
            $sql = "SELECT reg.*,data.first_name,data.middle_name,data.last_name FROM cis_students_details as data JOIN cis_student_registration_id as reg on data.id = reg.details_id where reg.registration_number = '{$params['reg_id']}' or reg.index_number = '{$params['reg_id']}'";
            $result = $qr->execute_query($sql);
            if($result->num_rows() > 0){
                $status['count'] = $result->num_rows();
                $status['list'] = $result->result_object();
                return $status;
            }
        }


        $strings = explode(' ',preg_replace("/,|_/"," ",$params['name']));

        $searchstr = "";

        if(is_array($strings)){
            foreach($cols as $col){
                        $searchstr .= " {$col} like '%$strings[0]%' or ";
                }

        }else{

            foreach($cols as $col){
                $searchstr .= " {$col} like '%$strings%' or ";
            }

          }

            $searchstr .= " registration_number LIKE '{$params['name']}' or reg.index_number LIKE '{$params['name']}'";



        $sql = "SELECT reg.*,data.first_name,data.middle_name,data.last_name FROM cis_students_details as data JOIN cis_student_registration_id as reg on data.id = reg.details_id where  $searchstr" ;

        $result = $qr->execute_query($sql);
        if($result->num_rows() > 0){
            $status['count'] = $result->num_rows();
            $status['list'] = $result->result_object();

        }

        return $status;
    }

    /**
     * @param array $basic    basic information of the student (reg id, names and gender)
     * @return mixed Return student identiry that has been added
     */
    function add_basic_student($basic){
        // Save students partial information
        $this->where('std_id', $basic['registration_no'])->get();
        $this->std_id = $basic['registration_no'];
        $this->first_name = $basic['fname'];
        $this->middle_name = $basic['mname'];
        $this->last_name = $basic['lname'];
        $this->gender = $basic['gender'];
        $this->dob = $basic['dob'];
        $this->mobile_number = $basic['mobile'];
        $this->contact_address = $basic['box'];
        $this->details = $basic['qualification'];
        $this->email_address = $basic['email'];

        if($this->result_count() == 0){
            $this->save();
           // $this->where('std_id',$this->std_id)->get();
        }else{
            $this->save();
        }
         return $this->id;
    }

    function add_details($data){

    }
} 
