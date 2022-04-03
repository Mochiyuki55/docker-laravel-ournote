<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // public $timestamps = false;

    // モデルにレコードを保存する処理に関して
    // プライマリキーなどの、モデル操作時に値を必要としないフィールドは、このように保護する
    protected $guarded = array('id');

    // DB用のバリデーションルール
    public static $rules = array(
        'user_id' => 'required',
        'title' => 'required',
        'content' => 'required',
    );

    public function getUpdated(){
        return $this->updated_at;
    }
}
