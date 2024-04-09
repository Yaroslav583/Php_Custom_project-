<?php

namespace app\Controllers;
use core\Viewer;
class HomeController
{

    public function index() :void
    {
        $a = 2;
        $b = 'HOME';

        (new Viewer('home.index', compact(['a', 'b'])))->render();
    }
}