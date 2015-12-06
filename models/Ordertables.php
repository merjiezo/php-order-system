<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordertables".
 *
 * @property integer $order_id
 * @property string $item_id
 * @property integer $number
 */

class Ordertables extends \yii\db\ActiveRecord {
	private static $_instance;
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'ordertables';
	}

	public static function getinstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['order_id', 'item_id', 'number'], 'required'],
			[['order_id', 'number'], 'integer']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'order_id' => '订单号',
			'item_id'  => '菜品',
			'number'   => '数量',
		];
	}
}
