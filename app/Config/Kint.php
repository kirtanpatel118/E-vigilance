<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Kint extends BaseConfig
{
    public $plugins;
    public $maxDepth           = 6;
    public $displayCalledFrom  = true;
    public $expanded           = false;
    public $richTheme          = 'aante-light.css';
    public $richFolder         = false;
    public $richSort           = 0;
    public $richObjectPlugins;
    public $richTabPlugins;
    public $cliColors          = true;
    public $cliForceUTF8       = false;
    public $cliDetectWidth     = true;
    public $cliMinWidth        = 40;
}
