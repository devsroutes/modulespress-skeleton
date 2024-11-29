<?php

namespace Skeleton\Modules\AdminModule\Checks;

use ModulesPress\Foundation\Guard\Contracts\CanActivate;
use ModulesPress\Core\ExecutionContext\ExecutionContext;

class MainMenuCheck implements CanActivate
{
    public function __construct(
        private readonly string $slug
    ) {}

    public function canActivate(ExecutionContext $ctx): bool
    {
        $hookCtx = $ctx->switchToHookContext();
        if ($hookCtx?->getHookable()?->getHookName() === 'admin_enqueue_scripts') {
            [$hook] = $hookCtx->getArgs();
            if ($hook === 'toplevel_page_' . $this->slug) {
                return true;
            }
        }
        if ($hookCtx?->getHookable()?->getHookName() === 'admin_footer_text') {
            $screen = get_current_screen();
            if ($screen->parent_base === $this->slug) {
                return true;
            }
        }
        return false;
    }
}
