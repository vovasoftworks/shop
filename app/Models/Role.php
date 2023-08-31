<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as BaseRole;
use Spatie\Permission\Traits\HasPermissions;

class Role extends BaseRole
{
    use HasFactory;
    use HasPermissions;
}
