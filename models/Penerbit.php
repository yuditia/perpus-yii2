<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penerbit".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $email
 * @property string $website
 * @property string $telpon
 * @property string $cp
 *
 * @property Buku[] $bukus
 */
class Penerbit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penerbit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'email', 'website', 'telpon', 'cp'], 'required'],
            [['alamat'], 'string'],
            [['nama', 'email', 'website', 'cp'], 'string', 'max' => 45],
            [['telpon'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Penerbit',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'website' => 'Website',
            'telpon' => 'Telepon',
            'cp' => 'Cp',
        ];
    }

    /**
     * Gets query for [[Bukus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBukus()
    {
        return $this->hasMany(Buku::className(), ['idpenerbit' => 'id']);
    }
}
