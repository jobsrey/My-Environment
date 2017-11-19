<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id
 * @property string $nama
 * @property int $harga
 * @property int $qty
 */
class Produk extends \yii\db\ActiveRecord implements \yii2mod\cart\models\CartItemInterface
{

    public function getPrice()
    {
        return $this->harga;
    }

    public function getLabel()
    {
        return $this->nama;
    }

    public function getUniqueId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'harga', 'qty'], 'required'],
            [['harga', 'qty'], 'integer'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'harga' => 'Harga',
            'qty' => 'Qty',
        ];
    }
}
