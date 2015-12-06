<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderbiao".
 *
 * @property string $order_id
 * @property integer $paixu
 */

class Orderbiao extends \yii\db\ActiveRecord {
	private static $_instance;
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'orderbiao';
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
			[['order_id'], 'required'],
			[['order_id'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'order_id' => 'Order ID',
			'paixu'    => 'Paixu',
		];
	}
}
