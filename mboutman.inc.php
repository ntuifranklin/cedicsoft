<?php
/**
 * This file contains functions 
 */
 
 
 
 function ip_is_local($ip){
	
	 $ipv4array = explode('.',$ip); $ipv6array = explode(':',$ip);
	 $lenipv4 =  count($ipv4array) ; $lenipv6 = count($ipv6array); 
	  $ipint =  array(); 
	 if($lenipv4 > 0 ){//We have an ipv4 address
		 for ($i = 0 ; $i<$lenipv4 ; $i++){
			 $ipint[$i] = intval($ipv4array[$i]) ; //Generating integera values for the ips
		 }
		 
			//Let's see if our IP is riv ate
			if ($ipint[0] == 10) {
				return true;
			} else if ($ipint[0] == 172 && $ipint[1] > 15 && $ipint[1] < 32) {
				return true;
			} else if ($ipint[0] == 192 && $ipint[1] == 168) {
				return true;
			}else return false ;
	 }else{
	 //Either something went wrong, or we are in IPV6 format.	 
		 
		 if( $lenipv6 > 0){//We are having a big IPV6 address here !
			 //We are in IPV4. Haven't implemented IPV6 yet
			 
		 }
		 return false ;
	 }
	 
	 
	 return false;
}
?>
