<?php

namespace app\Controllers;

use app\Models\PullType;
use core\PDO;
use core\Viewer;


class PollTypeController
{

    public function index(): void
    {


        $data = PullType::all();

        var_dump($data);

        (new Viewer('poll-types.index'))->render();
    }

    public function show(): void
    {
        $id = $_GET['id'];
        $data = PullType::find($id);

        var_dump($data);
    }
}