<?php
class mdl_log_gsm extends ujn_model {

	/**
	 *
	 * 解析GPS信息成功时日志
	 * @param unknown_type $latitude
	 * @param unknown_type $longitude
	 * @param unknown_type $imei
	 * @param unknown_type $AddressZH
	 */
	function ParseGpsToAddressLog($latitude,$longitude,$imei,$AddressZH){
		$sql =<<<EOT
INSERT INTO `swt_gps_parse_log`
		(`imei`, `latitude`, `longitude`,	`address`)
VALUES	('$imei', '$latitude',	 '$longitude',	'$AddressZH');
EOT;
		$this->_db->query($sql);
		return $this->_db->affectedRows();
	}

	/**
	 * 解析GSM基站 成功时日志
	 * @param unknown_type $imei
	 * @param unknown_type $cellId
	 * @param unknown_type $locationAreaCode
	 * @param unknown_type $mobileCountryCode
	 * @param unknown_type $mobileNetworkCode
	 * @param unknown_type $latitude
	 * @param unknown_type $longitude
	 * @param unknown_type $AddressZH
	 */
	function ParseGsmToGpsLog($imei,$cellId,$locationAreaCode,$mobileCountryCode,$mobileNetworkCode,$latitude,$longitude,$AddressZH){
		$sql =<<<EOT
INSERT INTO `swt_gsm_station_parse_log`
		(`imei`, `cell_code`, `location_area_code`,	`mobile_country_code`,	`mobile_network_code`,	`latitude`,	`longitude`, `address`)
VALUES	('$imei',	 '$cellId',	  '$locationAreaCode',	'$mobileCountryCode',		'$mobileNetworkCode',		'$latitude',	'$longitude', '$AddressZH');
EOT;
		$this->_db->query($sql);
		return $this->_db->affectedRows();
	}

	////////////////////////////////////

	protected function __construct() {
		parent::__construct(__CLASS__);
		$this->_db = $this->mysql();
	}

    /**
     * 单例模型
     * @return mdl_log_gsm
     */
	static function getInstance() {
        return parent::getInstance(__CLASS__);
	}

}