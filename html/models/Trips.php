<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trips".
 *
 * @property string $id
 * @property int $name
 * @property string $start_date
 * @property string $end_date
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
    public function rules()
    {
        return [
            [['id', 'name', 'start_date', 'end_date'], 'required'],
            [['name'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['id'], 'string', 'max' => 36],
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
