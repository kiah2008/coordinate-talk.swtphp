<?php
class mdl_message_item extends ujn_model {

	/**
	 *
	 * 取指定坐标附近消息
	 * @param unknown_type $latitude
	 * @param unknown_type $longitude
	 */
	function GetAppointCoordinateMessage($latitude,$longitude){
		$sql =<<<EOT
	SELECT b.uid, nick_name, info
	FROM `swt_message` a JOIN `swt_members_info` b ON a.from_uid=b.uid
	WHERE
	`latitude` >= $latitude - 0.001 AND `latitude` <= $latitude + 0.001 AND
	`longitude` >= $longitude - 0.001 AND `longitude` <= $longitude + 0.001
	ORDER BY a.code DESC LIMIT 0 , 15;
EOT;
		return $this->_db->getAll($sql);
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $latitude
	 * @param unknown_type $longitude
	 * @param unknown_type $altitude
	 * @param unknown_type $message
	 * @param unknown_type $imei
	 */
	function AddMessageToDataBase($latitude,$longitude,$altitude,$message,$imei,$uid){
		$sql = <<<EOT
		INSERT INTO cta_message (send_account,note,latitude,longitude,
		altitude,address_zh,address_en)
		VALUES('$SendAccount','$Note','$Latitude','$Longitude','$Altitude',
		'$AddressZH','$AddressEN');
EOT;
 
	}

	////////////////////////////////////

	protected function __construct() {
		parent::__construct(__CLASS__);
		$this->_db = $this->mysql();
	}

    /**
     * 单例模型
     * @return mdl_message_item
     */
	static function getInstance() {
        return parent::getInstance(__CLASS__);
	}

}