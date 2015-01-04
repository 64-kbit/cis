<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

   <?php
/** This file reads the list of modals and displays them */

    foreach($modals as $id => $modal){
        $this->load->view($modal);
    }
        ?>

