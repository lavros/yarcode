<?php

namespace frontend\widgets;

use yii\base\Widget;
use common\models\TeamMember;

class TeamMemberWidget extends Widget {
    public $teamMembers;

    public function init()
    {
        if ($this->teamMembers === null) {
            $this->teamMembers = TeamMember::find()->orderByPosition()->published()->all();
        }
    }

    public function run()
    {
        return $this->render('team-member', [
            'teamMembers' => $this->teamMembers
        ]);
    }
}
