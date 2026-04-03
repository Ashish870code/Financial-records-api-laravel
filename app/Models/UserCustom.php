<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCustom extends Model
{
    protected $table = 'users_table_custom';

    protected $fillable = ['name', 'email', 'role', 'is_active'];
}
