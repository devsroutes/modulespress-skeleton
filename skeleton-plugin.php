<?php

/*
   Plugin Name: Skeleton Plugin
   description: A starter plugin based on ModulesPress foundation.
   Version: 1.0.0
   Author: Devs Routes Co          
   License: GPL2
   Text Domain: skeleton-plugin
   */

use ModulesPress\Foundation\ModulesPressPlugin;
use Skeleton\Modules\RootModule\RootModule;

if (!defined('ABSPATH')) exit; // Exit if accessed directly 

if (!class_exists('SkeletonPlugin')) {

    require_once __DIR__ . '/vendor/autoload.php';

    final class SkeletonPlugin extends ModulesPressPlugin
    {
        public const NAME = "Skeleton Plugin";
        public const SLUG = "skeleton-plugin";
        public const PREFIX = "sp_";

        protected string $version = "1.0.0";
        protected bool $isDevelopment = true;
        protected bool $isDebug = true;

        protected string $restNamespace = "skeleton-plugin/v1";

        public function __construct()
        {
            parent::__construct(
                rootModule: RootModule::class,
                rootDir: __DIR__,
                rootFile: __FILE__
            );
        }
    }

    (new SkeletonPlugin())->bootstrap();
}
