<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'content' => 'required',
    );
    public function getData()
    {
        // return ('(' . $this->content . ')');
        return $this->id . (' . $this->content . ');
    }
    protected $table = 'list';
}
