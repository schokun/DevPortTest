<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string               $link
 * @property int                  $user_id
 * @property integer              $expires_at
 * @property boolean              $disabled
 */
class Page extends Model
{
    protected $fillable = [
       'link', 'user_id', 'expires_at', 'disabled'
    ];
}
