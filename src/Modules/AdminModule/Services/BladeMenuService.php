<?php

namespace Skeleton\Modules\AdminModule\Services;

use eftec\bladeone\BladeOne;

use ModulesPress\Core\Renderer\Renderer;
use ModulesPress\Foundation\Checker\Attributes\UseChecks;
use ModulesPress\Foundation\DI\Attributes\Injectable;
use ModulesPress\Foundation\Hookable\Attributes\Add_Action;
use ModulesPress\Foundation\View\Attributes\ViewCompose;
use ModulesPress\Core\Enquerer\Enquerer;
use ModulesPress\Foundation\Hookable\Attributes\Add_Filter;
use ModulesPress\Foundation\ModulesPressPlugin;

use Skeleton\Modules\AdminModule\Checks\MainMenuCheck;

#[Injectable]
class BladeMenuService
{
    const MENU_SLUG = 'modulespress-blade-menu';

    public function __construct(
        private readonly Renderer $renderer,
        private readonly Enquerer $enquerer,
        private readonly ModulesPressPlugin $plugin,
        private readonly CommonService $commonService
    ) {}

    #[ViewCompose("mp-blade-menu")]
    public function viewCompose(BladeOne $view): void
    {
        $user = wp_get_current_user();
        if ($user) {
            $view->with([
                'wp_username' => $user->user_login,
                'plugin_version' => $this->plugin->getVersion(),
            ]);
        }
    }

    #[Add_Action("admin_menu")]
    public function menu(): void
    {
        add_menu_page(
            'ModulesPress',
            'MP (Blade)',
            'manage_options',
            self::MENU_SLUG,
            function () {
                $this->renderer->render('mp-blade-menu');
            },
            $this->enquerer->static('imgs/logo-32x32.ico')->getUrl(),
            2
        );
    }

    #[UseChecks([new MainMenuCheck(self::MENU_SLUG)])]
    #[Add_Action("admin_enqueue_scripts")]
    public function assets(): void
    {
        $this->enquerer->style('mp-menu.style.scss')->enqueue();
        $this->commonService->enqueueFontAwesome();
    }

    #[UseChecks([new MainMenuCheck(self::MENU_SLUG)])]
    #[Add_Filter("admin_footer_text")]
    public function removeFooterText(): string { return ''; }

}
