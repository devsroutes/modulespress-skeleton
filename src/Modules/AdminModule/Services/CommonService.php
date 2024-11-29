<?php

namespace Skeleton\Modules\AdminModule\Services;

use ModulesPress\Foundation\DI\Attributes\Inject;
use ModulesPress\Foundation\DI\Attributes\Injectable;
use ModulesPress\Foundation\Hookable\Attributes\Add_Action;
use ModulesPress\Foundation\ModulesPressPlugin;

use Skeleton\Modules\AdminModule\AdminModule;

#[Injectable]
class CommonService
{
    public function __construct(
        #[Inject(AdminModule::MENU_ICON_CSS)] private readonly string $menuIconCss,
        #[Inject(AdminModule::FA_URL)] private readonly string $faUrl,
        private readonly ModulesPressPlugin $plugin
    ) {}

    #[Add_Action("admin_head")]
    public function menuIconCss(): void
    {
        echo $this->menuIconCss;
    }

    public function enqueueFontAwesome(): void {
        wp_enqueue_style('mp-fa', $this->faUrl, [], $this->plugin->getVersion());
    }
}
