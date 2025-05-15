<?php

namespace app\components\behaviors;

use app\helpers\UuidHelper;
use app\models\Services;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\db\Expression;

class RecalculateDatesBehavior extends Behavior {

    /**
     * @inheritdoc
     */
    public function events() {
        return[
            ActiveRecord::EVENT_AFTER_INSERT => 'onUpdateService',
            ActiveRecord::EVENT_AFTER_UPDATE => 'onUpdateService',
            ActiveRecord::EVENT_AFTER_DELETE => 'onUpdateService',
        ];
    }

    /**
     * updates associated trip start and end dates
     */
    public function onUpdateService(Event $event) {
        /**
         * @var $service Services
         */
        $service = $event->sender;
        $trip = $service->trip;

        $start = Services::find()
            ->where(['trip_id' => $trip->id, 'status' => Services::STATUS_ACTIVE])
            ->orderBy(['start_time' => SORT_ASC])
            ->one();

        if ($start) {
            $trip->setAttribute('start_date', $start->start_time);
        }

        $end = Services::find()
            ->where(['trip_id' => $trip->id, 'status' => Services::STATUS_ACTIVE])
            ->orderBy(['end_time' => SORT_DESC])
            ->one();

        if ($end) {
            $trip->setAttribute('end_date', $end->end_time);
        }
        $trip->save();
    }
}