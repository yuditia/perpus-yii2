<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anggota".
 *
 * @property int $id
 * @property string $nama
 * @property string $email
 * @property string $hp
 * @property string $foto
 *
 * @property Peminjaman[] $peminjamen
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'hp'], 'required'],
            [['nama', 'email'], 'string', 'max' => 45],
            [['hp'], 'string', 'max' => 15],
            [['foto'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'hp' => 'Hp',
            'foto' => 'Foto',
        ];
    }

    /**
     * Gets query for [[Peminjamen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['idanggota' => 'id']);
    }
}
