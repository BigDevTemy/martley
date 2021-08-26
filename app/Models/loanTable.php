<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loanTable extends Model
{
  
    protected $table='loanTable';
    protected $timestamp =true;

    public function user(){
        return $this->hasOne('App\Models\User','userid','userid');
    }
    
    public function customer_details(){
        return $this->hasOne('App\Models\User','userid','userid');
    }
}
