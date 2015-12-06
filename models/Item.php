<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $item_name
 * @property integer $item_price
 * @property string $item_detail
 */

class Item extends \yii\db\ActiveRecord {

	private static $_instance = null;
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'item';
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
			[['id', 'item_name', 'item_price'], 'required'],
			[['id', 'item_price'], 'integer'],
			[['item_name'], 'string', 'max'   => 100],
			[['item_detail'], 'string', 'max' => 200]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id'         => 'ID',
			'item_name'  => '物品名',
			'item_price' => '单价(元)',
			'img'        => '图片'
		];
	}
}
