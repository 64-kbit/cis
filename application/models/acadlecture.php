<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/26/14
 * Time: 12:51 PM
 */
class AcadLecture Extends DataMapper{
    public $table = 'cis_lecture_list';
    function __construct($id){
        parent::__construct($id);
    }
    function assignModule($mod_id){
        $outsuccessmessage = 'Database error';
        $_data = array(
            'lecture_id'=>$this->id,
            'department_id'=>$this->department_id,
            'campus_id'=>$this->campus_id,
            'facult_id'=>$this->facult_id,
            'module_id'=>$mod_id,
            'date_added'=>date('Y-m-d H:i:s'),
            'status'=>1
        );
        $lecturemodule = new acadlecturemoduleassign();
        $lecturemodule->add_new($_data);
        return $outsuccessmessage;
    }

    function deassignModule($mod_id){
        $successMessage = 'Database error';
        $lecturemodule = new acadlecturemoduleassign();
        $lecturemodule->where('id',$mod_id)->get();
        $lecturemodule->status = 0;
        $lecturemodule->save();
        //OR
        $query_req = 'UPDATE cis_lecture_module_assignment SET status = 0 WHERE id = {$mod_id} ;';
        $query_cmd = new CustomQuery();
        $result = $query_cmd->execute_query($query_req);
        if($result > 0) $successMessage = 'Successfully process';
        return $successMessage;
    }

    function get_list($dep_id = false){
        $status = false;
        if($dep_id){
            $sql = 'SELECT * FROM cis_lecture_list WHERE department_id = {$dep_id} ;';
            $query_cmd = new CustomQuery();
            $status = $query_cmd->execute_query($sql)->result_array();
        }
        return $status;
    }

    function myclassStudents(){
       $studentsList = array();
       $query_req = 'select
        student_details.* ,
        student_reg.registration_number,
        student_reg.date_of_issue,
        student_reg.issue_by,
        student_reg.has_printed_identity_card,
        student_reg.last_id_print_date,
        student_reg.print_count,
        student_reg.index_number,
        student_reg.program_id,
        student_reg.course_id,
        student_reg.academic_year_id,
        student_reg.admission_date,
        student_reg.admission_mode,
        student_reg.fee_sponsor_id,
        student_reg.remarks,
        student_reg.programme_choices,
        student_reg.admission_batch,
        student_reg.admission_status,
        student_reg.has_hostel,
        student_reg.has_nhif,
        student_reg.tmp_reg_id,
        student_reg.class_code,
        student_reg.is_active,
        student_reg.has_cis_account,
        student_reg.is_foreign_student,
        student_reg.has_loan,
        student_reg.academic_status,
        student_reg.allow_enroll_next,
        student_reg.reg_category_id,
        student_reg.bank_account_no,
        student_reg.bank_branch,
        student_reg.bank_name,
        student_class.student_id as class_enroll_student_id,
        student_class.stream_id as class_enroll_stream_id,
        student_class.stream_id as class_enroll_stream_id,
        student_class.semester_id as class_enroll_semester_id,
        student_class.academic_year_id as class_enroll_academic_year_id,
        student_class.ref_course_id as class_enroll_ref_course_id,
        student_class.dp_course_id as class_enroll_dp_course_id,
        student_class.department_id as class_enroll_department_id,
        student_class.campus_id as class_enroll_campus_id,
        student_class.faculty_id as class_enroll_faculty_id,
        student_class.semester_id as class_enroll_semester_id,
        student_class.program_id as class_enroll_program_id,
        student_class.ref_pg_sem_structure_id as class_enroll_ref_pg_sem_structure,
        student_class.paid_fee as class_enroll_paid_fee,
        student_class.date_enrolled as class_enroll_date_enrolled,
        student_class.status as class_enroll_status,
        student_class.fee_payment_status as class_enroll_fee_payment_status,
        student_class.fee_amount_paid as class_enroll_fee_amount_paid,
        student_class.fee_required_amount as class_enroll_fee_required_amount,
        student_class.receipt_id as class_enroll_reciept_id,
        student_class.trace_key as class_enroll_trace_key,
        student_class.previous_class_id as class_enroll_previous_class_id,
        student_class.date_registered as class_enroll_date_registered,
        student_class.reg_confirm_status as class_enroll_reg_confirm_status,
        student_class.reg_confirm_date as class_enroll_reg_confirm_date,
        student_class.comments as class_enroll_comments,
        student_class.current_class_code as class_enroll_current_class_code,
        student_class.start_class_code as class_enroll_start_class_code,
        class_stream.id as student_class_stream_id,
        class_stream.semester_id as student_class_stream_semester_id,
        class_stream.stream_id as student_class_stream_stream_id,
        class_stream.academic_year_id as student_class_stream_academic_year_id,
        class_stream.ref_course_id as student_class_stream_ref_course_id,
        class_stream.dp_course_id as student_class_stream_dp_course_id,
        class_stream.department_id as student_class_stream_department_id,
        class_stream.campus_id as student_class_stream_campus_id,
        class_stream.faculty_id as student_class_stream_faculty_id,
        class_stream.semester_structure_id as student_class_stream_semester_structure_id,
        class_stream.programs_id as student_class_stream_program_id,
        class_stream.ref_pg_sem_structure_id as student_class_stream_ref_pg_sem_structure_id,
        class_stream.class_name as student_class_stream_class_name,
        class_stream.status as student_class_stream_stratus,
        class_stream.is_enabled as student_class_stream_is_enabled,
        class_stream.class_monitor_id as student_class_stream_class_monitor_id,
        class_stream.class_master_id as student_class_stream_class_master_id,
        class_stream.capacity as student_class_stream_capacity,
        class_stream.class_alias as student_class_stream_alias,
        class_stream.code_name as student_class_stream_code_name,
        class_stream.class_year as student_class_stream_class_year,
        class_module.module_id as class_course_module_module_id,
        class_module.module_pg_course_id as class_course_module_module_pg_course_id,
        class_module.module_course_id as class_course_module_module_course_id,
        class_module.module_department_id as class_course_module_module_department_id,
        class_module.module_campus_id as class_course_module_module_campus_id,
        class_module.module_faculty_id as class_course_module_module_faculty_id,
        class_module.module_semester_structure_id as class_course_module_module_semester_structure_id,
        class_module.module_program_id as class_course_module_module_program_id,
        class_module.module_pg_sem_structure_id as class_course_module_module_pg_sem_structure_id,
        class_module.class_stream_id as class_course_module_module_class_stream_id,
        class_module.class_stream_stream_id as class_course_module_class_stream_stream_id,
        class_module.class_stream_academic_year_id as class_course_module_class_stream_academic_year_id,
        class_module.class_stream_ref_course_id as class_course_module_class_stream_ref_course_id,
        class_module.class_stream_dp_course_id as class_course_module_class_stream_dp_course_id,
        class_module.class_stream_department_id as class_course_module_class_stream_department_id,
        class_module.class_stream_campus_id as class_course_module_class_stream_campus_id,
        class_module.class_stream_faculty_id as class_course_module_class_stream_faculty_id,
        class_module.class_stream_semester_structure_id as class_course_module_class_stream_semester_structure_id,
        class_module.class_stream_program_id as class_course_module_class_stream_program_id,
        class_module.class_ref_pg_sem_structure_id as class_course_module_class_ref_pg_sem_structure_id,
        class_module.id as class_course_module_id,
        class_module.credit_point as class_course_module_credit_point,
        class_module.penalty_id as class_course_module_penalty_id,
        class_module.grading_scheme_id as class_course_module_grading_scheme_id,
        class_module.date_added as class_course_module_date_added,
        class_module.added_by as class_course_module_added_by,
        lecture_module.lecture_id as lecture_module_assign_lecture_id,
        lecture_module.department_id as lecture_module_assign_department_id,
        lecture_module.campus_id as lecture_module_assign_campus_id,
        lecture_module.faculty_id as lecture_module_assign_faculty_id,
        lecture_module.id as lecture_module_assign_id,
        lecture_module.module_id as lecture_module_assign_module_id,
        lecture_module.date_added as lecture_module_assign_date_added,
        lecture_module.status as lecture_module_assign_status,
        lecture.id as lecture_id,
        lecture.emp_id as lecture_emp_id,
        lecture.fname as lecture_fname,
        lecture.mname as lecture_mname,
        lecture.lname as lecture_lname,
        lecture.cur_position as lecture_cur_position,
        lecture.department_id as lecture_department_id,
        lecture.campus_id as lecture_campus_id,
        lecture.facult_id as lecture_faculty_id
        from cis_students_details as student_details
        inner join cis_student_registration_id as student_reg
        on student_details.id = student_reg.details_id
        inner join cis_student_class_enrollment as student_class
        on student_class.registration_id = student_reg.registration_number
        inner join cis_student_class_stream as class_stream
        on student_class.stream_id = class_stream_id
        inner join cis_acad_class_course_module as class_module
        on class_stream.stream_id = class_module.class_stream_id
        inner join cis_lecture_module_assignment as lecture_module
        on class_module.module_id = lecture_module.module_id
        inner join cis_lecture_list as lecture
        on lecture.id = lecture_module.lecture_id
        where lecture.id = {$this->id} order by class_stream.programs_id asc ;';
        $studentsList = $this->db->query($query_req)->result_array();
        return $studentsList;
    }
}