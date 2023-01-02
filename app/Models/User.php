<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserAddress;
use Laravel\Cashier\Billable;

class User extends Model
{
    use HasFactory,Billable;
    public function UserAddress(){
        $this->hasMany(UserAddress::class,'user_id','user_id');
    }
}
