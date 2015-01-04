
<?php



$colmap = array(
  'dbcols'=>array(
         'student_id' => 2,
        'student_name'=>1,
        'paid_amount' => 4,
        'date_of_deposit' => 0,
        'form_iv_index' => 2,
        'paid_for' => 3,
        'bank_branch'=>6,
        'payinslip_id'=>5,
         'import_date' => 'currdate',
         'comments' => 'none',
         'checked' => 'checkfalse',
          'transaction_key' => 'keygen'
    ),
    'skips' =>array(
         'chq','cleared balance','book balance','chq.no'
        ),
    'colstype' => array(
        'student_id' => 'string',
        'student_name'=>'string',
        'paid_amount' => 'decimal',
        'date_of_deposit' => 'date',
        'form_iv_index' => 'string',
        'paid_for' =>'string',
        'bank_branch'=>'string',
        'payinslip_id'=>'string',
        'import_date' => 'string',
        'comments' => 'string',
        'checked' => 'integer',
        'transaction_key'=>'string'
    ),
    'trans_file'=> BASEPATH. 'attachments/trans_file.dat',
    'header_row' => 0,
    'skips' => 0,
    'delimeter' => ',',
    'enclosure' => '\"',
    'archfolder' => BASEPATH .'attachments/saved/'
);

$mailconfig = array(
		'sender' => 'hshimwela@gmail.com',
		'receiver' => 'ombeniaidani@gmail.com',
		'subject' =>'crdb csv',
		'matchtext' => '',
		'server' => 'imap.gmail.com',
		'port' => 993,
		'user' => 'ombeniaidani@gmail.com',
		'password' => 'oau&jackline2011',
		'folder' => 'INBOX',
	    'filefolder' => 'attachments/',
		'savefolder' =>  BASEPATH. 'attachments/saved/',
		'readmails' =>  BASEPATH. 'attachments/readmails.dat',
		'db_logs' => 'cis_afi_logs'
);

$dbconfig = array(
    'host'=>'localhost',
    'port'=>3306,
    'user' => 'root',
    'password' => 'oauXbin',
    'database' => 'cis_cmanagerDboAdvancedVer_02',
    'dbtable' => 'cis_students_fee_imports_crdb',
    'files_table'=>'cis_college_fee_imports_status',
    'logs_table'=>'cis_afi_logs'
);

$testfiles = array(
    BASEPATH. 'attachments/trans_file.dat', BASEPATH. 'attachments/readmails.dat'
);
