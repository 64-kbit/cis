<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php


$usermenuitems = user_menu_items($userdata['profile'],'main',$currentBase);

foreach($usermenuitems as $id => $item){

      $sysCore = $this->System_core;

    if(count($uri) == 1){
       $bpage = 'home';
    }else{
       $bpage = $uri[2] ;
    }
    if($item['loc'] != 'main'){ continue; }
    $title = $item['title'];
    $desc = $item['desc'];
    $subitems = $item['submenu'];
    $icon = "<span class='icon fa {$item['icon']}'></span>";
    $liclasses =     $subitems?"dropdown ":"";
    $liclasses .=  $bpage== $item['code_name']?' active ':" ";
    $link =  $subitems? "#": "href='{$item['link']}' ";
    $mainItem = "<li class='" . $liclasses ."' title='$desc'>";
    $mainItem .= "<a " . $link . ">" . $icon ."<span class='menu-title'>". $sysCore->parse_config($title). "<span></a>";
        $mainItem .= ($subitems ? main_sub_menus_walker($subitems,$uri,3,$sysCore) : "");

    $mainItem .= "</li>";
    echo $mainItem;

}
?>
