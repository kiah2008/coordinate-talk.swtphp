<?php
class mdl_message_item extends ujn_model {

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
	
	/**
	 * 
	 * 取指定坐标附近消息
	 * @param unknown_type $latitude
	 * @param unknown_type $longitude
	 */
	function GetAppointCoordinateMessage($latitude,$longitude){
		$sql="SELECT b.uid, nick_name, info FROM `swt_message` a JOIN `swt_members_info` b ON a.from_uid=b.uid WHERE `latitude` >= $latitude - 0.001 AND `latitude` <= $latitude + 0.001 AND `longitude` >= $longitude - 0.001 AND `longitude` <= $longitude + 0.001 ORDER BY a.code DESC LIMIT 0 , 15";
		$this->_db->query($sql);
		$message = array();
		while($row=$this->_db->fetchAssoc()){
			$message[]=$row;
		}
		return $message;
	}

}