<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peminjaman".
 *
 * @property int $id
 * @property int $idbuku
 * @property int $idanggota
 * @property string $jml
 * @property string $tgl_pinjam
 * @property string $tgl_kembali
 * @property string $keterangan
 *
 * @property Anggota $idanggota0
 * @property Buku $idbuku0
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbuku', 'idanggota', 'jml', 'tgl_pinjam', 'tgl_kembali', 'keterangan'], 'required'],
            [['idbuku', 'idanggota'], 'integer'],
            [['tgl_pinjam', 'tgl_kembali'], 'safe'],
            [['keterangan'], 'string'],
            [['jml'], 'string', 'max' => 45],
            [['idbuku'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::className(), 'targetAttribute' => ['idbuku' => 'id']],
            [['idanggota'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['idanggota' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idbuku' => 'Judul Buku',
            'idanggota' => 'Anggota',
            'jml' => 'Jml',
            'tgl_pinjam' => 'Tgl Pinjam',
            'tgl_kembali' => 'Tgl Kembali',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * Gets query for [[Idanggota0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdanggota0()
    {
        return $this->hasOne(Anggota::className(), ['id' => 'idanggota']);
    }

    /**
     * Gets query for [[Idbuku0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdbuku0()
    {
        return $this->hasOne(Buku::className(), ['id' => 'idbuku']);
    }
}
