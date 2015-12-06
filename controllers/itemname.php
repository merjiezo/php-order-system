<?php
/*
 ****判断是否是登录用户，并且判断权限返回不同的页面
 */
namespace app\controllers;
use app\models\Item;

/**
 * 获得此用户权限,并且返回对应的网页
 */

class itemname {

	private static $_instance;
	/**
	 * 运用单例模式
	 */
	private function __construct() {}
	private function __clone() {}
	public function getinstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/*
	 *iswhat?
	 */
	public function whichname($item_id) {
		$item    = Item::getinstance();
		$sql     = 'SELECT item_name FROM item WHERE item_id = \''.$item_id.'\'';
		$command = $connection->createCommand($sql)->queryColumn();
		return $command['item_name'];
	}
}

?>