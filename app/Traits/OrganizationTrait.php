<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait OrganizationTrait
{
    protected function getOrganization()
    {
        return Auth::user();
    }
}
