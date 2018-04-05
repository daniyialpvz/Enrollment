<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getActivity($activity_id,$year_id,$district_info_id)
{
   $CI =& get_instance();
   $mod = $CI->load->model('financial');
   $result = $CI->financial->check($activity_id,$district_info_id,$year_id);
   if (count($result) > 0) {  
      return $result;
    } else {
      return false;
    }
}

?>