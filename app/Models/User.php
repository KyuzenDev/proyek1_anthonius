<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];


    static public function getRecord(){
        $return = self::select('users.*')
            ->orderBy('id', 'asc');
            $return = $return->paginate(10);
            return $return;
    }
}
