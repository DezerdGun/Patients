<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "polyclinics".
 *
 * @property int $id
 * @property string $name
 *
 * @property Patients[] $patients
 */
class Polyclinics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polyclinics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Patients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patients::className(), ['polyclinic_id' => 'id']);
    }
}
