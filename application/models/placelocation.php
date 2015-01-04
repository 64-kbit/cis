<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/18/14
 * Time: 4:06 PM
 */

class PlaceLocation extends  DataMapper {
    public $table = 'cis_place_name';
    function __construct($id = null){
        parent::__construct($id);
    }

    /**
     * @param $name name of the place (Common name of the place)
     * @param $long Longitude degrees
     * @param $lat  latitude degrees
     * @return mixed return the id of this object
     */
    function add_place_name($name,$long,$lat){
        if(trim($long) && trim($lat) && $long != 0 && $lat != 0){
            $this->where(array('long'=>$long,'lat'=>$lat))->get();
        }else{
            $this->where('name',strtolower(trim($name)))->get();
        }
        if($this->result_count() == 0){
           $this->name = $name;
            $this->long = $long;
            $this->lat = $lat;
            $this->save();
        }
        return $this->id;
    }

    function get_place($id,$arr = false,$name=false){
        $this->where('id',$id)->get();
        return ($arr? (array) $this->stored:($name?$this->name:$this->stored));
    }
} 
