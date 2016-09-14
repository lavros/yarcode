<?php

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Service;

class ServiceWidget extends Widget {
    public $services;

    public function init()
    {
        if ($this->services === null) {
            $this->services = Service::find()->orderByPosition()->published()->all();
        }
    }

    public function run()
    {
        return $this->render('service', [
            'services' => $this->services
        ]);
    }
}
