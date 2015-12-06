<?php

namespace app\controllers;
use app\models\Orderbiao;
use app\models\Ordertables;

/**
 * 通过order工厂类对order的两个表进行操作
 */

class OrderFactory {
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
	//点餐插入，以后改进！
	public function insertOrder($i1, $i2, $i3, $i4, $i5) {
		$datetime   = date('ymd');
		$datesearch = $datetime.'%';
		$connection = \Yii::$app->db;
		//query count
		$orderbiao = Orderbiao::getinstance();
		$sql       = 'SELECT COUNT(*) FROM orderbiao WHERE order_id LIKE \''.$datesearch.'\'';
		// 获取这是今天的第几份订单
		$command = $connection->createCommand($sql)->queryScalar();
		$command = (int) ($command);
		$command += 1;
		//生成订单编号
		if ($command >= 100) {
			$order_id = $datetime.$command;
		} elseif ($command >= 10) {
			$command  = '0'.$command;
			$order_id = $datetime.$command;
		} else {
			$command  = '00'.$command;
			$order_id = $datetime.$command;
		}
		//把订单内容存入数据库
		if ($i1 == 0) {} else {
			self::$_instance->item_id = '1';
			self::$_instance->number  = $i1;
			$connection->createCommand()->insert('ordertables', [
					'order_id' => $order_id,
					'item_id'  => '1',
					'number'   => $i1,
				])->execute();
		}
		if ($i2 == 0) {} else {
			self::$_instance->item_id = '2';
			self::$_instance->number  = $i2;
			$connection->createCommand()->insert('ordertables', [
					'order_id' => $order_id,
					'item_id'  => '2',
					'number'   => $i2,
				])->execute();
		}
		if ($i3 == 0) {} else {
			self::$_instance->item_id = '3';
			self::$_instance->number  = $i3;
			$connection->createCommand()->insert('ordertables', [
					'order_id' => $order_id,
					'item_id'  => '3',
					'number'   => $i3,
				])->execute();
		}
		if ($i4 == 0) {} else {
			self::$_instance->item_id = '4';
			self::$_instance->number  = $i4;
			$connection->createCommand()->insert('ordertables', [
					'order_id' => $order_id,
					'item_id'  => '4',
					'number'   => $i4,
				])->execute();
		}
		if ($i5 == 0) {} else {
			self::$_instance->item_id = '5';
			self::$_instance->number  = $i5;
			$connection->createCommand()->insert('ordertables', [
					'order_id' => $order_id,
					'item_id'  => '5',
					'number'   => $i5,
				])->execute();
		}
		$connection->createCommand()->insert('orderbiao', [
				'order_id' => $order_id,
			])->execute();

		return "<script>alert('点餐成功！');history.go(-1);</script>";
		die;
	}

	public function showTodayOrder() {
		$connection = \Yii::$app->db;
		//搜索今天所有的订单号
		$datetime    = date('ymd');
		$datesearch  = $datetime.'%';
		$ordertables = Ordertables::getinstance();
		$sql         = 'SELECT * FROM ordertables WHERE order_id LIKE \''.$datesearch.'\'';
		$command     = $connection->createCommand($sql)->queryAll();
		return $command;
	}
	//获得当前订单的所有数据并返回
	public function getAll($order_id) {
		$connection = \Yii::$app->db;
		$sql        = 'SELECT * FROM ordertables WHERE order_id = \''.$order_id.'\'';
		$command    = $connection->createCommand($sql)->queryAll();
		return $command;
	}

}

?>