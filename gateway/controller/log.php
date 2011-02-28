<?php
/**
 * 
 * 日志记录接口
 *
 */
class log extends ujn_controller {
	
	/**
	 * 
	 * 记录gsm请求记录
	 */
	function gsm() {

		$cellId = $_POST['cid'];
		$locationAreaCode = $_POST['lac'];
		$mobileCountryCode = $_POST['mcc'];
		$mobileNetworkCode = $_POST['mnc'];
		$imei = $_POST['imei'];


//		$jsonString =FromGSMGetAddress($cellId,$locationAreaCode,$mobileCountryCode,$mobileNetworkCode);
//		$arr = json_decode($jsonString,true);
//		$latitude = empty($arr["location"]["latitude"])?0.0:$arr["location"]["latitude"];
//		$longitude = empty($arr["location"]["longitude"])?0.0:$arr["location"]["longitude"];
//		echo "{'state':'1002','message':'$latitude,$longitude'}";
//		$address = GetAddress("http://maps.google.com/maps/api/geocode/json?latlng=".$latitude.",".$longitude."&sensor=true");
//		GsmLog($DB,$cellId,$locationAreaCode,$mobileCountryCode,$mobileNetworkCode,$imei,$latitude,$longitude,$address);
	}
}