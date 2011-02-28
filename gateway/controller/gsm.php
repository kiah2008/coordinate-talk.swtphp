<?php
/**
 * 
 * 坐标解析相关
 *
 */
class gsm extends ujn_controller {
	// 取消自动模板输出
	var $auto_render = false;
	
    /**
     * 
     * 通过坐标取物理地址
     * @param unknown_type $url
     */
    function GetAddress($url)
	{
		echo $url;
		return;
		$file = fopen($url,"r");
		while(!feof($file))
		{
			$line .= fgets($file,1024);
			
		}
		fclose($file);
		$address=json_decode($line);
		return $address->results[0]->formatted_address;
	}
	
	/**
	 * 
	 * 通过GPS坐标解析到物理地址
	 */
	function parseToAddress(){
		$latitude = isset($_REQUEST['latitude']) ? (double)$_REQUEST['latitude'] : 0;
		$longitude = isset($_REQUEST['longitude']) ? (double)$_REQUEST['longitude'] : 0;
		$imei = isset($_REQUEST['imei']) ? $_REQUEST['imei']:0;
		$AddressZH=GetAddress("http://maps.google.cn/maps/api/geocode/json?latlng=".$latitude.",".$longitude."&sensor=true");
		echo $AddressZH;
	}
}