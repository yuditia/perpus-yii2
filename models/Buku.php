<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property int $id
 * @property string $isbn
 * @property string $judul
 * @property string $tahun_cetak
 * @property int $stok
 * @property string $bentuk
 * @property int $idpengarang
 * @property int $idpenerbit
 * @property int $idkategori
 * @property string $cover
 *
 * @property Kategori $idkategori0
 * @property Penerbit $idpenerbit0
 * @property Pengarang $idpengarang0
 * @property Peminjaman[] $peminjamen
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isbn', 'judul', 'tahun_cetak', 'stok', 'bentuk', 'idpengarang', 'idpenerbit', 'idkategori'], 'required'],
            [['judul', 'bentuk'], 'string'],
            [['stok', 'idpengarang', 'idpenerbit', 'idkategori'], 'integer'],
            [['isbn'], 'string', 'max' => 100],
            [['tahun_cetak'], 'string', 'max' => 50],
            [['cover'], 'string', 'max' => 45],
            [['isbn'], 'unique'],
            [['idkategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['idkategori' => 'id']],
            [['idpengarang'], 'exist', 'skipOnError' => true, 'targetClass' => Pengarang::className(), 'targetAttribute' => ['idpengarang' => 'id']],
            [['idpenerbit'], 'exist', 'skipOnError' => true, 'targetClass' => Penerbit::className(), 'targetAttribute' => ['idpenerbit' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isbn' => 'Isbn',
            'judul' => 'Judul Buku',
            'tahun_cetak' => 'Tahun Cetak',
            'stok' => 'Stok',
            'bentuk' => 'Bentuk',
            'idpengarang' => 'Pengarang',
            'idpenerbit' => 'Penerbit',
            'idkategori' => 'Kategori',
            'cover' => 'Cover',
        ];
    }

    /**
     * Gets query for [[Idkategori0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdkategori0()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'idkategori']);
    }

    /**
     * Gets query for [[Idpenerbit0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpenerbit0()
    {
        return $this->hasOne(Penerbit::className(), ['id' => 'idpenerbit']);
    }

    /**
     * Gets query for [[Idpengarang0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpengarang0()
    {
        return $this->hasOne(Pengarang::className(), ['id' => 'idpengarang']);
    }

    /**
     * Gets query for [[Peminjamen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjaman()
    {
        return $this->hasMany(Peminjaman::className(), ['idbuku' => 'id']);
    }
}
