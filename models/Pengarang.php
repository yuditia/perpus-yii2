<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengarang".
 *
 * @property int $id
 * @property string $nama
 * @property string $email
 * @property string $hp
 * @property string $foto
 *
 * @property Buku[] $bukus
 */
class Pengarang extends \yii\db\ActiveRecord
{
    public $fotoFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengarang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'hp'], 'required'],
            [['nama', 'email', 'foto'], 'string', 'max' => 45],
            [['hp'], 'string', 'max' => 15],
            [['fotoFile'],'file',
                'extensions'=> 'jpg,jpeg,png,svg',
                'maxSize'=>'500000000',
                'skipOnEmpty'=>true
            
        ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Pengarang',
            'email' => 'Email',
            'hp' => 'HP',
            'foto' => 'Foto',
            'fotoFile'=>'Avatar'
        ];
    }

    /**
     * Gets query for [[Bukus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBukus()
    {
        return $this->hasMany(Buku::className(), ['idpengarang' => 'id']);
    }
}
