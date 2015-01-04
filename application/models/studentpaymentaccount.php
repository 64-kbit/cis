<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/6/14
 * Time: 7:19 PM
 */

class StudentPaymentAccount extends DataMapper {
    public $table = 'cis_student_payments_account_ledger';
    function __construct(){
        parent::__construct();
    }


    function student_transactions($student_id){

    }
} 
