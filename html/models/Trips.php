<?php

namespace app\models;

use app\components\behaviors\SetUuidBehavior;
use Yii;

/**
 * This is the model class for table "trips".
 *
 * @property string $id
 * @property string $name
 * @property string|null $start_date
 * @property string|null $end_date
 *
 * @property Services[] $services
 * @property TripsUsers[] $tripsUsers
 * @property Users[] $users
 */
class Trips extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trips';
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
            [['start_date', 'end_date'], 'default', 'value' => null],
            [['name'], 'required'],
            [['start_date', 'end_date'], 'safe'],
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
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::class, ['trip_id' => 'id']);
    }

    /**
     * Gets query for [[TripsUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTripsUsers()
    {
        return $this->hasMany(TripsUsers::class, ['trip_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['id' => 'user_id'])->viaTable('trips_users', ['trip_id' => 'id']);
    }

}
