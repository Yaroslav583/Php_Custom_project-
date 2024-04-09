<?php

namespace app\Controllers;

use core\Viewer;

class UserController
{

    public function index() :void
    {
        $a = 1;
        $b = 'USER';

        (new Viewer('users.index', compact(['a', 'b'])))->render();
    }
}