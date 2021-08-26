<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loanStructure extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne('App\Models\User','userid','userid');
    }

    public function customer_details(){
        return $this->hasOne('App\Models\User','userid','userid');
    }
}
