<?php

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Project;

class PortfolioWidget extends Widget {
    public $projects;

    public function init()
    {
        if ($this->projects === null) {
            $this->projects = Project::find()
                ->with('category')
                ->orderByPosition()
                ->published()
                ->all();
        }
    }

    public function run()
    {
        return $this->render('portfolio', [
            'projects' => $this->projects
        ]);
    }
}
