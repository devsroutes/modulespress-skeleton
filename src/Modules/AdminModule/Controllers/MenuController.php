<?php

namespace Skeleton\Modules\AdminModule\Controllers;

use ModulesPress\Foundation\Http\Attributes\{RestController, Get};
use ModulesPress\Foundation\DI\Attributes\Injectable;

#[Injectable]
#[RestController("/modulespress")]
class MenuController
{
    public function __construct() {}

    #[Get]
    public function get()
    {
        return [
            'serverTime' => date('M d, Y H:i:s'),
        ];
    }
}
