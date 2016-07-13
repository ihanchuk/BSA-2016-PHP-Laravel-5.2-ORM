<?php

namespace App\Models\FrontEnd\Users;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $table = 'books_users';
    protected $fillable = ['first_name', 'last_name'];
    public $timestamps = false;

    public function books(){
        return $this->hasMany('\App\Models\FrontEnd\Books\Book');
    }
}
