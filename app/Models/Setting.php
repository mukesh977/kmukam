<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function companyContact()
    {
        return $this->hasMany('App\Models\Contact', 'settings_id')->where('section', 'company');
    }

    public function advertisementContact()
    {
        return $this->hasMany('App\Models\Contact', 'settings_id')->where('section', 'advertisement');
    }

    public function companyEmail()
    {
        return $this->hasMany('App\Models\Email', 'settings_id')->where('section', 'company');
    }

    public function advertisementEmail()
    {
        return $this->hasMany('App\Models\Email', 'settings_id')->where('section', 'advertisement');
    }

    public function socialMedia()
    {
        return $this->hasMany('App\Models\SocialMedia', 'settings_id');
    }
}
