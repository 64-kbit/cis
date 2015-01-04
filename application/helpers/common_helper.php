<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

if(!function_exists('theme_icons')){
    function theme_icons($icon = false){
        $homeUrl = base_url();
        $themsFolder = 'themes/img/';

        return $homeUrl . $themsFolder;
    }
}


if(!function_exists('file_type_from_name')){
    function file_type_from_name($name){
       $fname = explode('.',$name);
        $range = array_pop($fname);

        return $range;
    }
}


if(!function_exists('alphabet_list')){
    function alphabet_list(){
       $range = range('A','Z');
        return $range;
    }
}

if(!function_exists('pg_link')){
    function pg_link($pglink){
        $baseUrl = base_url();
        $pgUrl = "";
        $pgLinks = array(
            'signup_student'=>'signup/student' ,
             'password_reset'=>'login/forgot_password',
            'login_page' => 'login',
            'password_email'=>'login/forgot_password?mail=true',
            'change_password' =>'login/new_password'
        );

        return $baseUrl . $pgLinks[$pglink] ;
    }
}
if(!function_exists('user_pg_link')){
    function user_pg_link($pglink,$profile){
        $baseUrl = base_url();
        $pgUrl = "";
        $pgLinks = array(
            'signup_student'=>'signup/student' ,
            'password_reset'=>'login/forgot_password',
            'login_page' => 'login',
            'password_email'=>'login/forgot_password?mail=true',
            'change_password' =>'login/new_password',
             'home'=>user_profile($profile) .'/dashboard',
            'search_result'=> user_profile($profile) . '/search'
        );

        return $baseUrl . $pgLinks[$pglink] ;
    }
}



if(! function_exists('name_format')){
    function name_format($fname,$mname,$lname,$type){
        $fullname = "";
        if($type){
            switch($type){
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    break;
                default:
                    $fullname = strtoupper($lname).", ". ucfirst(strtolower($fname)) ." ". ucfirst(strtolower($mname));
            }
        }
        else{
            $fullname = strtoupper($lname).", ". ucfirst(strtolower($fname)) ." ". ucfirst(strtolower($mname));
        }

        return $fullname;
    }
}


if ( ! function_exists('check_bot'))
{

    function check_bot($agent)
    {
        $robots = array(
            'googlebot'			=> 'Googlebot',
            'msnbot'			=> 'MSNBot',
            'slurp'				=> 'Inktomi Slurp',
            'yahoo'				=> 'Yahoo',
            'askjeeves'			=> 'AskJeeves',
            'fastcrawler'		=> 'FastCrawler',
            'infoseek'			=> 'InfoSeek Robot 1.0',
            'lycos'				=> 'Lycos'
        );
        foreach ($robots as $rb=>$name){
            if($agent == $rb || $agent == $name){
                return true;
            }
        }

        return true;
    }
}



if ( ! function_exists('convertCurrency'))
{
    function convertCurrency($amount, $from, $to,$local=false){
        if(!$local){
            $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
            $data = file_get_contents($url);
            preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
            $converted = preg_replace("/[^0-9.]/", "", $converted[1]);}
        else{
            if($from == 'USD'){
                $converted = $amount * 1600;
            }else{
                $converted = $amount / 1600;}
        }
        return round($converted, 3);
    }
}


if(!function_exists('getDataSize')){
    function getDataSize($data){
        if($data <= 1024)
        {
            return number_format($data,3) . " Bytes";
        }
        else if($data > 1024 && $data <=1048576)
        {
            return number_format($data/1024,3) . " KB";
        }
        else if($data > 1048576 && $data <= (1024*1024*1024))
        {
            return number_format($data/(1024*1024),3) ." MB";
        }
        else if($data >= 1024*1024*1024 && $data <= (1024*1024*1024*1024))
        {
            return number_format($data/(1024*1024*1024),3) . " GiB Big File";
        }
        else
        {
            return number_format($data/(1024*1024*1024*1024),3) ." TiB Huge File";
        }

    }
}


if ( ! function_exists('four_digit_no'))
{

    function four_digit_no($i)
    {
        $id = "";
        $i = ltrim(trim($i),"\n 0");
        if($i < 10){
            $id = "000".$i;
        }elseif($i >=10 && $i < 100){
            $id = "00".$i;
        }elseif($i >=100 && $i < 1000){
            $id = "0".$i;
        }else{
            $id = $i;
        }

        return $id;
    }
}

if ( ! function_exists('three_digit_no'))
{

    function three_digit_no($i)
    {
        $id = "";
        $i = ltrim(trim($i),"\n 0");
        if($i < 10){
            $id = "00".$i;
        }elseif($i >=10 && $i < 100){
            $id = "0".$i;
        }else{
            $id = $i;
        }

        return $id;
    }
}


if ( ! function_exists('two_digit_no'))
{

    function two_digit_no($i)
    {
        $id = "";
        $i = ltrim(trim($i),"\n 0");
        if($i < 10){
            $id = "0".$i;
        }else{
            $id = $i;
        }

        return $id;
    }
}


if ( ! function_exists('format_date'))
{

    function format_date($dtstr,$rmode=0,$timestamp = false)
    {
        $return = '';
        if(($timestamp)){
            switch($rmode){
                case 1:
                    $return = date("D d-M-Y,  h:i A",$dtstr);
                    break;
                default :
                    $return = date("D d-M-Y,  h:i A",$dtstr);
                    break;
            }
        }else{
            switch($rmode){
                case 1:
                    $return =  date("D d-M-Y,  h:i A",strtotime($dtstr));
                    break;
                case 2:
                   $return = date('d M, Y',strtotime($dtstr));
                    break;
                default :
                    $return =  date("D d-M-Y,  h:i A",strtotime($dtstr));
                    break;
            }
        }
        return $return;
    }
}




if ( ! function_exists('generate_country'))
{
    function generate_country($countrySelected,$array=0)
    {
        $list = "";
        $countryList = array(
            '--' => '--',
            'afghanistan'=>'Afghanistan',
            'albania'=>'Albania',
            'algeria'=>'Algeria',
            'andorra'=>'Andorra',
            'angola'=>'Angola',
            'antigua_and_barbuda'=>'Antigua and Barbuda',
            'argentina'=>'Argentina',
            'armenia'=>'Armenia',
            'aruba'=>'Aruba',
            'australia'=>'Australia',
            'austria'=>'Austria',
            'azerbaijan'=>'Azerbaijan',

            'Bahamas' =>'Bahamas, The',
            'Bahrain' => 'Bahrain',
            'Bangladesh' => 'Bangladesh',
            'Barbados' => 'Barbados',

            'Belarus' => 'Belarus',
            'Belgium'=> 'Belgium',
            'Belize'=> 'Belize',
            'Benin'=> 'Benin',
            'Bhutan'=> 'Bhutan',
            'Bolivia'=>'Bolivia',
            'Bosnia_and_Herzegovina'=>'Bosnia and Herzegovina',
            'Botswana'=>'Botswana',
            'Brazil'=>'Brazil',
            'Brunei'=>'Brunei',
            'Bulgaria'=>'Bulgaria',
            'Burkina_Faso'=>' Burkina Faso',
            'Burma'=>'Burma',
            'Burundi'=>'Burundi',
            'Cambodia'=>'Cambodia',
            'Cameroon'=> 'Cameroon',
            "Canada" =>  "Canada",
            "Cape_Verde"=>" Cape Verde",
            "Central_African_Republic"=>" Central African Republic",
            'Chad'=>'Chad',
            'Chile'=>'Chile',
            "China"=>'China',
            'Colombia'=>'Colombia',
            'Comoros'=>'Comoros',
            'Democratic_Republic_of_the_congo' => 'Congo, Democratic Republic of the',
            'Republic_of_the_congo' =>'Congo, Republic of the',
            'Costa_Rica'=>'Costa Rica',
            'Cote_d_Ivoire'=>"Cote d'Ivoire",
            'Croatia'=>'Croatia',
            'Cuba'=>'Cuba',
            'Curacao'=>'Curacao',
            'Cyprus'=>'Cyprus',
            'Czech_Republic'=>'Czech Republic',



            'Denmark'=>'Denmark',
            'Djibouti'=>'Djibouti',
            'Dominica'=>'Dominica',
            'Dominican_Republic'=>'Dominican Republic',

            'Ecuador'=>'Ecuador',
            'Egypt'=>'Egypt',
            'El_Salvador'=>'El Salvador',
            'Equatorial_Guinea'=>'Equatorial Guinea',
            'Eritrea'=>'Eritrea',
            'Estonia'=>'Estonia',
            'Ethiopia'=>'Ethiopia',

            'Fiji'=>'Fiji',"Finland"=>'Finland','France'=>'France',




            'Gabon'=>'Gabon',
            'Gambia'=>'Gambia',
            'Georgia'=>'Georgia',
            'Germany' =>'Germany',
            'Ghana'=>'Ghana',
            'Greece'=>'Greece',
            'Grenada'=>'Grenada',
            'Guatemala'=>'Guatemala',
            'Guinea'=>'Guinea',
            'Guinea_Bissau'=>' Guinea-Bissau',
            'Guyana'=>'Guyana',



            'Haiti'  =>   'Haiti',

            'Holy_See'   =>  'Holy See',

            'Honduras' =>     'Honduras',


            'Hungary'=> 'Hungary',



            'Iceland'=>'Iceland',
            'India' => 'India',
            "Indonesia"=>  "Indonesia",
            'Iran'=> 'Iran',
            'Iraq'=>     "Iraq",

            'Ireland'=> 'Ireland',
            'Israel'=> 'Israel',
            'Italy'=> 'Italy',
            'Jamaica'=>'Jamaica', 'Japan'=>'Japan','Jordan'=>'Jordan',




            'Kazakhstan' =>   'Kazakhstan',
            'Kenya' => 'Kenya',
            'Kiribati' => 'Kiribati',
            'Korea_North' => 'Korea, North',
            'Korea_South' => 'Korea, South',
            'Kosovo' =>'Kosovo',
            'Kuwait' =>'Kuwait',
            'Kyrgyzstan' => 'Kyrgyzstan',



            'Laos' => 'Laos',
            'Latvia' => 'Latvia',
            'Lebanon'  => 'Lebanon',
            'Lesotho' =>  'Lesotho',
            'Liberia' => 'Liberia',
            'Libya'  =>    'Libya',
            'Liechtenstein' => 'Liechtenstein',
            'Lithuania' => 'Lithuania',
            'Luxembourg' => 'Luxembourg',


            'Macau' => 'Macau',
            'Macedonia' => 'Macedonia',
            'Madagascar' => 'Madagascar',
            'Malawi' => 'Malawi',
            'Malaysia' => 'Malaysia',
            'Maldives' => 'Maldives',
            'Mali' => 'Mali',
            'Malta'=>  'Malta',
            'Marshall_Islands' => 'Marshall Islands',
            'Mauritania' => 'Mauritania',
            'Mauritius' => 'Mauritius',
            'Mexico' => 'Mexico',
            'Micronesia' => 'Micronesia',
            'Moldova' => 'Moldova',
            'Monaco' => 'Monaco',
            'Mongolia' => 'Mongolia',
            'Montenegro' => 'Montenegro',
            'Morocco' => 'Morocco',
            'Mozambique' => 'Mozambique',




            'Namibia' => 'Namibia',
            'Nauru'=> 'Nauru',
            'Nepal' => 'Nepal',
            'Netherlands' => 'Netherlands',
            'Netherlands_Antilles' => 'Netherlands Antilles',
            'New_ealand' =>' New Zealand',
            'Nicaragua' => 'Nicaragua',
            'Niger' => 'Niger',
            'Nigeria' => 'Nigeria',
            'North_Korea'  =>'NorthKorea',
            'Norway' => 'Norway',
            'Oman' => 'Oman',



            'Pakistan' => 'Pakistan',
            'Palau'  => 'Palau',
            'Palestinian_Territories' => 'Palestinian Territories',
            'Panama' => 'Panama',
            'Papua_New_Guinea' =>  'Papua New Guinea',
            'Paraguay' => 'Paraguay',
            'Peru' => 'Peru',
            'Philippines' => 'Philippines',
            'Poland' => 'Poland',
            'Portugal' => 'Portugal',


            'Qatar'=>'Qatar', "Romania"=>"Romania",'Russia'=>'Russia','Rwanda'=>"Rwanda",



            'Saint_Kitts_and_Nevis'  => 'Saint Kitts and Nevis',
            'Saint_Lucia' => 'Saint Lucia',
            'Saint_Vincent_and_the_Grenadines'  => 'Saint Vincent and the Grenadines',
            'Samoa' => 'Samoa',
            'San_Marino' => 'San Marino',
            'Sao_Tome_and_Principe' => 'Sao Tome and Principe',
            'Saudi_Arabia' => 'Saudi Arabia',
            'Senegal' => 'Senegal',
            'Serbia' => 'Serbia',
            'Seychelles' => 'Seychelles',
            'Sierra_Leone' =>'Sierra Leone',
            'Singapore' => 'Singapore',
            'Sint_Maarten'  => 'Sint Maarten',
            'Slovakia' => 'Slovakia',
            'Slovenia' => 'Slovenia',
            'Solomon_Islands' => 'Solomon Islands',
            'Somalia' => 'Somalia',
            'South_Africa' => 'South Africa',
            'South_Korea' => 'South Korea',
            'South_Sudan' =>  'South Sudan',
            'Spain' => 'Spain',
            'Sri_Lanka' => 'Sri Lanka',
            'Sudan' => 'Sudan',
            'Suriname' => 'Suriname',
            'Swaziland' => 'Swaziland',
            'Sweden' => 'Sweden',
            'Switzerland' => 'Switzerland',
            'Syria' =>  'Syria',

            'Taiwan'  => 'Taiwan',
            'Tajikistan' => 'Tajikistan',
            'Tanzania' => 'Tanzania',
            'Thailand'  => 'Thailand',
            'Timor_Leste' => 'Timor-Leste',
            'Togo' => 'Togo',
            'Tonga' => 'Tonga',
            'Trinidad_and_Tobago' =>  'Trinidad and Tobago',
            'Tunisia'  => 'Tunisia',
            'Turkey' => 'Turkey',
            'Turkmenistan' => 'Turkmenistan',
            'Tuvalu' => 'Tuvalu',
            'Uganda'  => 'Uganda',
            'Ukraine'  => 'Ukraine',
            'United_Arab_Emirates'   =>  'United Arab Emirates',
            'United_Kingdom'    => 'United Kingdom',
            'Uruguay'   => 'Uruguay',
            'Uzbekistan'  =>  'Uzbekistan',
            'Vanuatu'=>"Vanuatu", 'Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Yemen'=>'Yemen','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe',
        );

        if($array){
            return $countryList;
        }
        foreach($countryList as $c=>$label){

            if($c==$countrySelected){
                $list.="<option selected value={$c}>".$label."</option>";
            }else{
                $list.="<option value={$c}>".$label."</option>";
            }
        }

        return $list;
    }


    if(!function_exists("luhn")){
        function luhn($number){
               $stack = 0;
               $digits = str_split(strrev($number), 1);

               foreach ($digits as $key => $value) {
                   if ($key % 2 === 0) {
                       $value = array_sum(str_split($value * 2, 1));
                   }
                   $stack += $value;
               }
               $stack %= 10;
               if ($stack !== 0) {
                   $stack -= 10;
               }

               return (int) (implode('', array_reverse($digits)) . abs($stack));

        }
    }

    if(!function_exists('luhn_check')){
        function luhn_check($number){

                $original = substr($number, 0, strlen($number) - 1);

                return luhn($original) === $number;

        }
    }
}


