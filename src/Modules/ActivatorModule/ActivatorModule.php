<?php

namespace Skeleton\Modules\ActivatorModule;

use ModulesPress\Foundation\Module\Attributes\Module;
use ModulesPress\Foundation\Module\ModulesPressModule;

use Skeleton\Modules\ActivatorModule\Services\RegistrationService;

#[Module(
    imports: [],
    providers: [RegistrationService::class],
    controllers: [],
    entities: [],
    exports: []
)]
class ActivatorModule extends ModulesPressModule {}
