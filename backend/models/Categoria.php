<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string $codigo
 * @property string|null $imagen
 *
 * @property MntProducto[] $mntProductos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'codigo'], 'required'],
            [['nombre', 'imagen'], 'string', 'max' => 45],
            [['codigo'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'codigo' => 'Codigo',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[MntProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMntProductos()
    {
        return $this->hasMany(MntProducto::className(), ['id_categoria' => 'id']);
    }
}
