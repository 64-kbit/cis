
<?php



$config['mailgrabber']['colmap'] = array(
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
          'transaction_key' => 'keygen',
      'skiprow'=>1
    ),
    'dbexcel'=>array(
        'student_id' => 'C',
        'student_name'=>'B',
        'paid_amount' => 'E',
        'date_of_deposit' => 'A',
        'form_iv_index' => 'C',
        'paid_for' => 'D',
        'bank_branch'=>'G',
        'payinslip_id'=>'F',
        'import_date' => 'currdate',
        'comments' => 'none',
        'checked' => 'checkfalse',
        'transaction_key' => 'keygen',
        'skiprow'=>1
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
    'trans_file'=> FCPATH.MAIL_FILES. 'trans_file.dat',
    'header_row' => 0,
    'skips' => 0,
    'delimeter' => ',',
    'enclosure' => '\"',
    'archfolder' => FCPATH.MAIL_FILES .'saved/'
);

$config['mailgrabber']['mailconfig'] = array(
		'sender' => 'datacenter@crdbbank.com',
		'receiver' => 'ditsas.online@gmail.com',
		'subject' =>'Bill report DSM INSTITUTE OF TECHNOLOGY - 28112014175525',
		'matchtext' => 'Kindly open attached file',
		'server' => 'imap.gmail.com',
		'port' => 993,
		'user' => 'ditsas.online@gmail.com',
		'password' => '0mb3n1$$',
		'folder' => 'INBOX',
	    'filefolder' => 'attachments/',
		'savefolder' =>  FCPATH.MAIL_FILES. 'saved/',
		'readmails' =>  FCPATH.MAIL_FILES. 'readmails.dat',
        'logsfile' => FCPATH.MAIL_FILES.'logs/',
        'logfile' => 'mail_log',
		'db_logs' => 'cis_afi_logs' ,
    'tmp_folder' => FCPATH.MAIL_FILES
);

$config['mailgrabber']['dbconfig'] = array(
    'dbtable' => 'cis_students_fee_imports_crdb',
    'files_table'=>'cis_college_fee_imports_status',
    'logs_table'=>'cis_afi_logs'
);

$coinfig['mailgrabber']['testfiles'] = array(
    FCPATH.MAIL_FILES. 'attachments/trans_file.dat', FCPATH.MAIL_FILES. '/readmails.dat'
);
