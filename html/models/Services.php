<?php

namespace app\models;

use app\components\behaviors\RecalculateDatesBehavior;
use app\components\behaviors\SetUuidBehavior;
use Yii;

/**
 * This is the model class for table "services".
 *
 * @property string $id
 * @property string $service_type_id
 * @property string $trip_id
 * @property string $title
 * @property string $start_time
 * @property string $end_time
 * @property int $status
 *
 * @property ServiceTypes $serviceType
 * @property Trips $trip
 */
class Services extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_CANCEL = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            ['class' => SetUuidBehavior::class],
            ['class' => RecalculateDatesBehavior::class],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => 0],
            [['service_type_id', 'trip_id', 'title', 'start_time', 'end_time'], 'required'],
            [['start_time', 'end_time'], 'safe'],
            [['status'], 'integer'],
            [['id', 'trip_id'], 'string', 'max' => 36],
            [['service_type_id'], 'string', 'max' => 4],
            [['title'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['service_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceTypes::class, 'targetAttribute' => ['service_type_id' => 'id']],
            [['trip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trips::class, 'targetAttribute' => ['trip_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_type_id' => 'Service Type ID',
            'trip_id' => 'Trip ID',
            'title' => 'Title',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ServiceType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceType()
    {
        return $this->hasOne(ServiceTypes::class, ['id' => 'service_type_id']);
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

}
