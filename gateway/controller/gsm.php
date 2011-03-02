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
	 * 通过GPS坐标解析到物理地址
	 */
	function GpsToAddress(){
		$latitude = isset($_REQUEST['latitude']) ? (double)$_REQUEST['latitude'] : 0;
		$longitude = isset($_REQUEST['longitude']) ? (double)$_REQUEST['longitude'] : 0;
		$imei = isset($_REQUEST['imei']) ? $_REQUEST['imei']:0;
		//解析地址
		$AddressZH=tls_gpsparse::GetAddress($latitude,$longitude,'zhcn');
		//入库
		if(!empty($AddressZH)){
			mdl_log_gsm::getInstance()->ParseGpsToAddressLog($latitude,$longitude,$imei,$AddressZH);
			$result = array('state'=>"1",'message'=>$AddressZH);
		}
		else {
			$result = array('state'=>"-1001",'message'=>"解析失败");
		}
		output_json($result);
	}
	
	/**
	 * 通过GSM基站信息解析出gps坐标
	 */
	function GsmToGps(){
		$cellId = isset($_REQUEST['cid']) ? (int)$_REQUEST['cid'] : 0;
		$locationAreaCode = isset($_REQUEST['lac']) ? (int)$_REQUEST['lac'] : 0;
		$mobileCountryCode = isset($_REQUEST['mcc']) ? (int)$_REQUEST['mcc'] : 0;
		$mobileNetworkCode = isset($_REQUEST['mnc']) ? (int)$_REQUEST['mnc'] : 0;
		$imei = isset($_REQUEST['imei']) ? $_REQUEST['imei']:0;
		$locale = tls_gpsparse::GsmToGps($cellId,$locationAreaCode,$mobileCountryCode,$mobileNetworkCode);
		//解析地址
		$AddressZH=tls_gpsparse::GetAddress($locale['latitude'],$locale['longitude'],'zhcn');
		
		//记日志
		mdl_log_gsm::getInstance()->ParseGsmToGpsLog($imei,$cellId,$locationAreaCode,$mobileCountryCode,$mobileNetworkCode,$locale['latitude'],$locale['longitude'],$AddressZH);
		
		//返回结果
		$result = array('state'=>"1",'message'=>$locale);
		output_json($result);
	}
	
}