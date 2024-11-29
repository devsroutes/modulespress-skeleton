<?php

namespace Skeleton\Modules\ActivatorModule\Services;

use SkeletonPlugin;

use ModulesPress\Foundation\DI\Attributes\Injectable;
use ModulesPress\Foundation\Hookable\Attributes\Add_Action;

#[Injectable]
class RegistrationService
{
    public function __construct() {}

    #[Add_Action(SkeletonPlugin::SLUG . '/activate')]
    public function onActivate(bool $networkWide) {}

    #[Add_Action(SkeletonPlugin::SLUG . '/deactivate')]
    public function onDeactivate() {}
}
