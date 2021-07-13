<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Files;

class Folders extends Model
{
    use HasFactory;

    protected $table = "folders";

    protected $fillable=['name','parent_id'];

    protected $appends =['children','type'];
    
    protected $hidden =['updated_at','created_at'];
    
    public function getChildrenAttribute()
    {
    
    $files = Files::where('folder_id',$this->id)->select('id','name','folder_id')->get();
    $folders = Folders::where('parent_id',$this->id)->select('id','name','parent_id')->get();

    return $files->merge($folders);
    }

    public function getTypeAttribute()
    {
        return 'folder';
    }

    

    
}
