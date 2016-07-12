<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12.07.2016
 * Time: 23:10
 */

namespace App\Models\FrontEnd\Books;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['author', 'genre','year'];
    public $timestamps = false;
}