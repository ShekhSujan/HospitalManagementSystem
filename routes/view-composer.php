<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\Setting;


View::composer(['backend.components.leftbar', 'auth.admin.login','auth.login'], function($views) {
    $allSetting = Setting::all();
    $views->with('allSetting', $allSetting);
});
