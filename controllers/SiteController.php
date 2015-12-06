<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
header('Access-Control-Allow-Credentials:true');
header("Content-Type: application/json;charset=utf-8");

class SiteController extends Controller {

	public function actions() {
		return [
			'error'  => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha'          => [
				'class'           => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST?'testme':null,
			],
		];
	}

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionSearch() {
		return $this->render('search');
	}

	public function actionExitem() {
		return $this->render('index');
	}

	public function actionItem() {
		return $this->render('index');
	}

	function actionAjaxsearch() {

		$request    = \Yii::$app->request;
		$connection = \Yii::$app->db;
		$order_id   = $request->get('order_id');
		$sql        = 'SELECT * FROM ordertables WHERE order_id = \''.$order_id.'\'';
		$command    = $connection->createCommand($sql);
		$query      = $command->queryAll();

		$result = '{"success":true,"msg":"未找到订单"}';
		if (!isset($query) || empty($query)) {

		} else {
			foreach ($query as $value) {
				//$result = '{"success":true,"msg":"订单号：'.$value["order"].' 学号：'.$value["st_classmark"].'"}';
			}

			foreach ($value as $key => $v) {
				if ($key == 'order_id') {
					$key = '订单号';
				}

				if ($key == '1') {
					$key = '番茄炒蛋';
				}

				if ($key == '2') {
					$key = '咕咾肉';
				}

				if ($key == '3') {
					$key = '脆皮红薯';
				}

				if ($key == '4') {
					$key = '黄瓜炒蛋';
				}

				if ($key == '5') {
					$key = '烤羊排';
				}

				// if ($key == 'totalprice') {
				// 	$key = '总价';
				// }

				if ($v != null) {
					$array[] = $key.":".$v;
				}
			}

			$message = null;
			for ($i = 0; $i < sizeof($array); $i++) {

				$message = $message.$array[$i]."    ";
			}
			//$result = '{"success":true,"msg":"订单号：'.$value["order"].' 学号：'.$value["st_classmark"].' 笔'.$value["bi"].' "}';
			$result = '{"success":true,"msg":"'.$message.'"}';
			//echo "<br />";
		}

		echo $result;
		//echo "<br />";
	}
}
