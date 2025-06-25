<?php

namespace App\Utils\PermissionQuery\Eloquent;


use Illuminate\Database\Eloquent\Builder;

class Acount
{
    public function implementQuery(Builder $query): Builder
    {
        if ($this->auth->can('view_recipients')) {
            return $query;
        }
        elseif ($this->auth->can('view_own_recipients')) {
        }

        return $query->whereRaw('0 = 1');
    }
}
