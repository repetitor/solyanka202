<?php

namespace App;

use App\Services\EnvService;
use Repetitor202\ClickhouseDraft;
use Repetitor202\Test;

class App
{
    public function run()
    {
        EnvService::init();

        //tests
        new Test();
        (new ClickhouseDraft())->test();
    }
}