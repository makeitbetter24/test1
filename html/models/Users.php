<?php

namespace app\models;

use app\components\behaviors\SetUuidBehavior;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $name
 *
 * @property Trips[] $trips
 * @property TripsUsers[] $tripsUsers
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => SetUuidBehavior::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id'], 'string', 'max' => 36],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trips::class, ['id' => 'trip_id'])->viaTable('trips_users', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TripsUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTripsUsers()
    {
        return $this->hasMany(TripsUsers::class, ['user_id' => 'id']);
    }

}
