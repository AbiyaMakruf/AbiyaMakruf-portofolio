<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SocialLink extends Model
{
    protected $guarded = [];

    /**
     * Fetch all social links and recover from PostgreSQL cached plan issues after schema changes.
     */
    public static function allSafe()
    {
        try {
            return static::all();
        } catch (QueryException $e) {
            if (str_contains($e->getMessage(), 'cached plan must not change result type')) {
                DB::unprepared('DISCARD ALL;');
                return static::all();
            }

            throw $e;
        }
    }
}
