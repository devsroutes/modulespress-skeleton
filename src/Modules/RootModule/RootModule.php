<?php

namespace Skeleton\Modules\RootModule;

use WP_REST_Request;
use WP_REST_Response;

use ModulesPress\Core\Http\MiddlewareConsumer;
use ModulesPress\Foundation\Module\Attributes\Module;
use ModulesPress\Foundation\Module\ModulesPressModule;

use Skeleton\Modules\ActivatorModule\ActivatorModule;
use Skeleton\Modules\AdminModule\AdminModule;

#[Module(
    imports: [
        ActivatorModule::class,
        AdminModule::class
    ],
    providers: [],
    controllers: [],
    entities: [],
    exports: []
)]
class RootModule extends ModulesPressModule
{
    public function middlewares(MiddlewareConsumer $consumer): void
    {
        $consumer->apply(
            function (
                WP_REST_Request $req,
                WP_REST_Response $res
            ): WP_REST_Request | WP_REST_Response {
                $header = $req->get_header("X-WP-Nonce");
                if (!$header || !wp_verify_nonce($header, "wp_rest")) {
                    $res->set_status(403);
                    $res->set_data([
                        "message" => "Forbidden"
                    ]);
                    return $res;
                }
                return $req;
            }
        )->forRoutes("*");
    }
}
