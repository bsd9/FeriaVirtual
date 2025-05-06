<?php

namespace App\Observers;

use App\Models\Configuration;

class ConfigurationObserver
{
    public function deleting(Configuration $config)
    {
        $config->image()->delete();
    }
}
