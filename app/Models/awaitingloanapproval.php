<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class awaitingloanapproval extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='awaitingloanapproval';
    protected $timestamp =true;

    public function user(){
        return $this->hasOne('App\Models\User','userid','userid');
    }

    public function loan_manager(){
        return $this->hasOne('App\Models\User','userid','loan_manager_userid');
    }
    public function loanTable(){
        return $this->hasOne('App\Models\User','userid','userid');
    }
}
