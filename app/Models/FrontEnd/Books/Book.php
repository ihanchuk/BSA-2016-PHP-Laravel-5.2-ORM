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
    protected $fillable = [
        'author',
        'genre',
        'year',
        'title',
        'book_user_id'
    ];
    public $timestamps = false;

    public function owner(){
        /*
            Вопрос:
            Почему тут мне приходится явно указывать колонку?
            В случае с моделью BookUser мне не приходилось это делать.
            В чем тут разница?
        */
        return $this->belongsTo('\App\Models\FrontEnd\Users\BookUser','id');
    }
}