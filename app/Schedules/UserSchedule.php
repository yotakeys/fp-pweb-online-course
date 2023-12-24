<?php

namespace App\Schedules;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserSchedule
{
    public static function updateCacheEmail(): void
    {
        Cache::forget('emails');

        $emails = User::pluck('email')->toArray();
        Cache::put('emails', $emails, 600);
    }

    public static function updateCacheName(): void
    {
        Cache::forget('names');

        $names = User::pluck('name')->toArray();
        Cache::put('names', $names, 600);
    }
}
