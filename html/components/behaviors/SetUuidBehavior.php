<?php

namespace app\components\behaviors;

use app\helpers\UuidHelper;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\db\Expression;

class SetUuidBehavior extends Behavior {

    /**
     * @inheritdoc
     */
    public function events() {
        return[
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
        ];
    }

    /**
     * set beforeInsert() -> UUID data
     */
    public function beforeInsert(Event $event) {
        /**
         * @var $model ActiveRecord
         */
        $model = $event->sender;
        $model->setAttribute('id', UuidHelper::generate());
    }
}