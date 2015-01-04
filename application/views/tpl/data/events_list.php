<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<?php

$cal = new Calendar();

$evli = $cal->get_all_events(date(time()),date(time()));
//var_dump($evli);

    echo "<h4 class='subtitle'>{$eventTitle}</h4>";
    if(isset($events['list']) && $events['count'] > 0){

    } else{
        echo "<div class='warning'>No Events found </div>";
    }
