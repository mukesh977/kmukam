<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    public function team()
    {
        return $this->hasMany('\App\Models\Team\Team', 'cat_id');
    }
}
