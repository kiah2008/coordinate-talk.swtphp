<?php
class mdl_account_basic extends ujn_model {

	function get($uid) {
		return array();
	}
	
	protected function __construct() {
		parent::__construct(__CLASS__);
		$this->_db = $this->mysql();
	}

    /**
     * 单例模型
     * @return mdl_account_basic
     */
	static function getInstance() {
        return parent::getInstance(__CLASS__);
	}

	/**
	 * 
	 * 通过imei解析用户uid
	 * @param unknown_type $imei
	 */
	function FromImeiToUid($imei){
		
	}
}