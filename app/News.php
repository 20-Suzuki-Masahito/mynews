<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');
    
    // 以下を追記
    public static $rules = array(
            'title' => 'required',
            'body' => 'required',
        );
    
    public function histories()
    {
        // 一つのニュースに対して複数の編集履歴が発生するためhasManyを使用している
        return $this->hasMany('App\History');
    }
}
