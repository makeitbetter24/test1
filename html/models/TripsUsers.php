<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trips_users".
 *
 * @property string $trip_id
 * @property string $user_id
 *
 * @property Trips $trip
 * @property Users $user
 */
class TripsUsers extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trips_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trip_id', 'user_id'], 'required'],
            [['trip_id', 'user_id'], 'string', 'max' => 36],
            [['trip_id', 'user_id'], 'unique', 'targetAttribute' => ['trip_id', 'user_id']],
            [['trip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trips::class, 'targetAttribute' => ['trip_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'trip_id' => 'Trip ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Trip]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrip()
    {
        return $this->hasOne(Trips::class, ['id' => 'trip_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }

}
