<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $table = "files";

    protected $fillable=['name','folder_id'];

    protected $hidden =['updated_at','created_at'];
    protected $appends =['type'];

    public function getTypeAttribute()
    {
        return 'file';
    }
}
