<?php

namespace Skeleton\Modules\AdminModule\Services;

use ModulesPress\Core\Renderer\Renderer;
use ModulesPress\Foundation\DI\Attributes\Injectable;
use ModulesPress\Foundation\Hookable\Attributes\Add_Action;
use ModulesPress\Core\Enquerer\Enquerer;
use ModulesPress\Foundation\Checker\Attributes\UseChecks;
use ModulesPress\Foundation\Hookable\Attributes\Add_Filter;
use ModulesPress\Foundation\ModulesPressPlugin;

use Skeleton\Modules\AdminModule\Checks\MainMenuCheck;

#[Injectable]
class ReactMenuService
{
    const MENU_SLUG = 'modulespress-react-menu';

    public function __construct(
        private readonly Renderer $renderer,
        private readonly Enquerer $enquerer,
        private readonly ModulesPressPlugin $plugin,
        private readonly CommonService $commonService
    ) {}

    #[Add_Action("admin_menu")]
    public function render(): void
    {
        add_menu_page(
            'ModulesPress React',
            'MP (React)',
            'manage_options',
            self::MENU_SLUG,
            function () {
                echo '<div id="mp-react-menu-root"></div>';
            },
            $this->enquerer->static('imgs/logo-32x32.ico')->getUrl(),
            3
        );
    }

    #[UseChecks([new MainMenuCheck(self::MENU_SLUG)])]
    #[Add_Action("admin_enqueue_scripts")]
    public function enqueueAssets(): void
    {
        $this->enquerer->app("mp-react-menu/app.script.tsx")
            ->enqueue()
            ->withStyles()
            ->inline($this->enquerer->injectStaticPathResolver())
            ->localize("mpReactMenu", [
                'pluginVersion' => $this->plugin->getVersion(),
                'wpUsername' => wp_get_current_user()->user_login,
                'restUrl' => rest_url($this->plugin->getRestNamespace()),
                'restNonce' => wp_create_nonce('wp_rest')
            ]);
        $this->commonService->enqueueFontAwesome();
    }

    #[UseChecks([new MainMenuCheck(self::MENU_SLUG)])]
    #[Add_Filter("admin_footer_text")]
    public function removeFooterText(): string { return ''; }
}
