<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
   protected $fillable = [
       'transaction_id',
       'account_type',
       'account_id',
       'debit',
       'credit'
   ];
}
