<?php
namespace app\controllers;

use app\controllers\ItemFactory;
use app\controllers\OrderFactory;
use yii\web\Controller;

/**
 * order表的控制和修改
 */

class OrderController extends Controller {
	public $enableCsrfValidation = false;

	/*
	@c定位到订单界面
	 */
	public function actionOrderin() {
		$itemFactory = ItemFactory::getinstance();
		$res         = $itemFactory->findAllThing();
		return $this->render('orderin', [
				'res' => $res,
			]);
	}

	//订单插入
	public function actionInsert() {
		$request      = \Yii::$app->request;
		$i1           = $request->post('i1');
		$i2           = $request->post('i2');
		$i3           = $request->post('i3');
		$i4           = $request->post('i4');
		$i5           = $request->post('i5');
		$orderFactory = OrderFactory::getinstance();
		echo $res     = $orderFactory->insertOrder($i1, $i2, $i3, $i4, $i5);

	}

	//显示当天所有的订单
	public function actionOrdershow() {
		$orderFactory = OrderFactory::getinstance();
		$itemFactory  = ItemFactory::getinstance();
		$res          = $orderFactory->showTodayOrder();
		$resitem      = $itemFactory->findItemName();
		return $this->render('ordershow', [
				'res'     => $res,
				'resitem' => $resitem,
			]);
	}

	// public function actionText() {
	// 	$factory  = factory::getinstance();
	// 	$allPrice = $factory->itemFullPrice('151205001');
	// 	echo $allPrice;
	// }
}

?>