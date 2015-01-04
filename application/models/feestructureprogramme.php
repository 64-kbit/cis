<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/9/14
 * Time: 1:25 PM
 */

class FeeStructureProgramme extends DataMapper{
    public  $table = "cis_program_semester_fee_structure";
    function __construct(){
        parent::__construct();
    }

    function get_list(){

    }

    /**
     * @param $sponsor sponsor category
     * @param $pg programme id
     * @param $cz course id
     * @param $acy academic year
     * @param $srv service chage type
     * @param $notpaylist item not paid
     * @param int $rtype what should be returned as a result
     * @return mixed status
     */

    function get_programme_fee($sponsor,$pg,$cz,$acy,$srv,$notpaylist,$rtype = 1){
        $sql = "
            SELECT stc.name as pgname,item.*,itmp.name,itmp.student_category_type,itmp.description,itmp.major_fee FROM cis_program_semester_fee_structure as pg
            JOIN cis_college_fee_structure as stc on stc.id = pg.fee_structure_id
            JOIN cis_college_fee_structure_items as item   on item.structure_id = pg.fee_structure_id
            JOIN cis_college_fee_category as itmp  on itmp.id = item.fee_category_id
            where pg.service_charge_id = $srv and pg.program_id = $pg and pg.course_id = $cz and pg.academic_years_id = $acy and stc.student_fee_category = $sponsor;";

           $qr = $this->db->query($sql);
          $feesum = array(
              'min' =>0,
              'max'=>0,
              'minf'=>0,
               'maxf'=>0,
              'major'=>0
          );

        foreach($qr->result_array() as $id => $dt){

              if($dt['major_fee']){
                  $feesum['major'] = array('loc'=>(double) $dt['amount'],'forg'=>(double)$dt['amount_foreign'],'percent'=>(double) $dt['minimum_amount'],'program'=>$dt['pgname']);
              }
            if($dt['student_category_type'] == 0){

            if($dt['is_required'] == 1){
                $feesum['min'] += ($dt['amount'] * $dt['minimum_amount']/100);
                $feesum['minf'] += ($dt['amount_foreign'] * $dt['minimum_amount']/100);
             }

            $feesum['max'] +=  $dt['amount'];
            $feesum['maxf'] +=  $dt['amount_foreign'];

                $status['data']['items'][] = $dt;

            }else{
                if(in_array($dt['student_category_type'],$notpaylist)){
                    if($dt['is_required'] == 1){
                        $feesum['min'] += ($dt['amount'] * $dt['minimum_amount']/100);
                        $feesum['minf'] += ($dt['amount_foreign'] * $dt['minimum_amount']/100);
                    }
                    $feesum['max'] +=  $dt['amount'];
                    $feesum['maxf'] +=  $dt['amount_foreign'];
                    $status['data']['items'][] = $dt;
                }
            }
        }


            $status['count'] = $qr->num_rows();
             $status['fee'] = $feesum;
            return $status;
    }

    /**
     * Get fee structure applied programmes and courses in a semester summed
     * @param array $semst {fee_structure_id, academic_years_id}
     * @return array programme semester fee structure
     */
    function get_structure_programme($semst){
        $this->where($semst)->get();
        $ob = new stdClass();

        $ob->program_id = $this->program_id;
        $ob->course_id = $this->course_id;
        $ob->academic_years_id = $this->academic_years_id;
        $ob->fee_structure_id = $this->fee_structure_id;
        $ob->ref_semester_list_id = $this->ref_semester_list_id;
        $ob->semester_structure_id = $this->semester_structure_id;
        $ob->semester_id = $this->semester_id;
        $ob->department_id = $this->department_id;
        $ob->minimum_percentage = $this->minimum_percentage;
        $ob->is_current_structure = $this->is_current_structure;

        return $ob;
    }

    function get_programmes($str){
        $sql = "SELECT distinct(fee.program_id),fee.* from cis_program_semester_fee_structure as fee where fee.fee_structure_id = $str   ";       $qr = new CustomQuery();
           $result = $qr->execute_query($sql);
        return  array('count'=>$result->num_rows(),'list'=>$result->result_object());
    }

    function add_structure_programme($feestructre,$programme,$academic_year){
          $pgz = new ProgrammeCourse();
        $pgs = $pgz->get_programme_courses($programme,true);
        $semester = new SemesterStructure();
        if($pgs['count']){
            foreach($pgs['list'] as $id=>$p){
                $semlist = $semester->get_structure_items($p->pg_sem_structure_id);
                 foreach($semlist['list'] as $sem){
                     $this->where(array('program_id'=>$p->program_id,'course_id'=>$p->course_id,'academic_year'=>$academic_year,'fee_structure_id'=>$feestructre,'ref_semester_list_id'=>$sem->item_id))->get();
                     if($this->result_count()){
                         $this->program_id = $p->program_id;
                         $this->course_id = $p->course_id;
                         $this->academic_years_id = $academic_year;
                         $this->fee_structure_id = $feestructre;
                         $this->ref_semester_list_id = $sem->item_id;
                         $this->semester_structure_id =$sem->structure_id;
                         $this->save();
                     }else{
                    $this->program_id = $p->program_id;
                    $this->course_id = $p->course_id;
                    $this->academic_years_id = $academic_year;
                    $this->fee_structure_id = $feestructre;
                    $this->ref_semester_list_id = $sem->item_id;
                    $this->semester_structure_id =$sem->structure_id;// $p->pg_sem_structure_id;
                    $this->semester_id =$sem->id;
                     $this->save_as_new();
                     }
                 }
            }
        }
    }
}
