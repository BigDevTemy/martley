<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
    use HasFactory;
    protected $table='customer_details';
    protected $timestamp =true;

    public function user(){
        return $this->hasOne('App\Models\User','userid','userid');
    }
    public function loanTable(){
        return $this->hasOne('App\Models\User','userid','userid');
    }
}


