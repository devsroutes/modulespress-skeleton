<?php

namespace Skeleton\Modules\AdminModule;

use ModulesPress\Foundation\Module\Attributes\Module;
use ModulesPress\Foundation\Module\ModulesPressModule;
use ModulesPress\Common\Provider\Provider;

use Skeleton\Modules\AdminModule\Services\BladeMenuService;
use Skeleton\Modules\AdminModule\Services\CommonService;
use Skeleton\Modules\AdminModule\Services\ReactMenuService;
use Skeleton\Modules\AdminModule\Controllers\MenuController;

#[Module(
    imports: [],
    providers: [
        CommonService::class,
        BladeMenuService::class,
        ReactMenuService::class,
        new Provider(AdminModule::MENU_ICON_CSS, useFactory: [AdminModule::class, "getMenuIconCss"]),
        new Provider(AdminModule::FA_URL, useValue: 'https://use.fontawesome.com/releases/v5.15.4/css/all.css')
    ],
    controllers: [MenuController::class],
    entities: [],
    exports: []
)]
class AdminModule extends ModulesPressModule
{
    const MENU_ICON_CSS = "MENU_ICON_CSS";
    const FA_URL = "FA_URL";

    public static function getMenuIconCss(): string
    {
        return <<<HTML
        <style>
            li#toplevel_page_modulespress-blade-menu img,
            li#toplevel_page_modulespress-react-menu img {
                width: 20px;
                opacity: 1;
                filter: brightness(0) invert(1);
            }
        </style>
        HTML;
    }
}
