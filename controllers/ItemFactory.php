<?php

namespace app\controllers;
use app\controllers\ItemFactory;
use app\controllers\OrderFactory;
use app\models\Item;

/**
 * 菜品工厂类
 */

class ItemFactory {
	private static $_instance;
	private function __construct() {}
	private function __clone() {}
	//单例
	public static function getinstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	//计算总价
	public function itemFullPrice($order_id) {
		$allPrice     = 0;
		$item         = Item::getinstance();
		$orderFactory = OrderFactory::getinstance();
		$res          = $orderFactory->getAll($order_id);
		// print_r($res);
		foreach ($res as $value) {
			$itemFactory = ItemFactory::getinstance();
			$itemPrice   = $itemFactory->getPrice($value['item_id']);
			$allPrice += ((int) ($itemPrice))*((int) ($value['number']));
		}
		return $allPrice;
	}
	/*
	@找到所有插入内容
	 */
	public function findAllThing() {
		$connection = \Yii::$app->db;
		//query thing
		$sql          = 'SELECT * FROM Item';
		$command      = $connection->createCommand($sql);
		$commandthing = $command->queryAll();
		return $commandthing;
	}
	//找菜名
	public function findItemName() {
		$connection = \Yii::$app->db;
		//query thing
		$sql          = 'SELECT * FROM Item';
		$command      = $connection->createCommand($sql);
		$commandthing = $command->queryAll();
		return $commandthing;
	}
	//查找菜品名字
	public function whichName($item_id) {
		$connection = \Yii::$app->db;
		$sql        = 'SELECT item_name FROM item WHERE id = '.$item_id;
		$command    = $connection->createCommand($sql)->queryColumn();
		return $command['0'];
	}
	//获得价格
	public function getPrice($item_id) {
		$connection = \Yii::$app->db;
		$sql        = 'SELECT item_price FROM item WHERE id = '.$item_id;
		$command    = $connection->createCommand($sql)->queryColumn();
		return $command['0'];
	}
	//获得详细信息
	public function getDetail($item_id) {
		$connection = \Yii::$app->db;
		$sql        = 'SELECT item_price FROM item WHERE id = '.$item_id;
		$command    = $connection->createCommand($sql)->queryColumn();
		return $command['0'];
	}
	//获得图片路径
	public function getPicture($item_id) {
		$connection = \Yii::$app->db;
		$sql        = 'SELECT item_price FROM item WHERE id = '.$item_id;
		$command    = $connection->createCommand($sql)->queryColumn();
		return $command['0'];
	}

}

?>