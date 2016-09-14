<?php

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Timeline;

class TimelineWidget extends Widget {
    public $timelines;

    public function init()
    {
        if ($this->timelines === null) {
            $this->timelines = Timeline::find()
                ->orderByDateFrom()
                ->published()
                ->all();
        }
    }

    public function run()
    {
        return $this->render('timeline', [
            'timelines' => $this->timelines
        ]);
    }
}
