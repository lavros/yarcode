<?php

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Client;

class ClientWidget extends Widget {
    public $clients;

    public function init()
    {
        if ($this->clients === null) {
            $this->clients = Client::find()->orderByPosition()->published()->all();
        }
    }

    public function run()
    {
        return $this->render('client-widget.php', [
            'clients' => $this->clients
        ]);
    }
}
