<?php

namespace common\components;

use Yii;
use yii\base\Component;

class Location extends Component
{
    private $_isHome;

    public function getIsHome()
    {
        if ($this->_isHome !== null) {
            return $this->_isHome;
        }

        $controller = Yii::$app->controller;
        $defaultController = Yii::$app->defaultRoute;

        if ($controller->id === $defaultController && 
            $controller->action->id === $controller->defaultAction) {
            $this->_isHome = true;
        } else {
            $this->_isHome = false;
        }

        return $this->_isHome;
    }
}
