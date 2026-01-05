<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CustomModel extends Model
{
    protected $tablename = 'custom_models';
    protected $fillable = ['name', 'description'];


    public static function booted()
    {
        if (!Schema::hasTable('custom_models')) {
            Schema::create('custom_models', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('description');
                $table->timestamps();
            });
        }
    }
}
