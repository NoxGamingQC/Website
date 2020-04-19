<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $table = 'todolist';

    public function getFlags($flag = null) {
        $flags = explode(";", $this->flags);
        if($flag == null) {
            return $flags;
        } else {
            return array_search($flag, $flags) ? $flags[array_search($flag, $flags)] : null;
        }
    }
}
