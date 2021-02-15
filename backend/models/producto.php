<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id
 * @property string $nombre
 * @property int $id_categoria
 * @property string|null $imagen
 * @property string|null $descripcion
 * @property float $stock
 *
 * @property Categoria $categoria
 */
class producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_categoria', 'stock'], 'required'],
            [['id_categoria'], 'integer'],
            [['stock'], 'number'],
            [['nombre', 'imagen', 'descripcion'], 'string', 'max' => 45],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
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
            'id_categoria' => 'Id Categoria',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
            'stock' => 'Stock',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }

    
}
