<?php

namespace App\Http\Controllers;

use App\Models\Folders;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DirectoryController extends Controller
{
    public static $model = User::class;

    public function getAllData(Request $request)
    {
       
        $data =Folders::whereNull('parent_id')->select('id','name','parent_id')->get();

          return response(['data'=>$data,'status'=>200]);
      


    }

    public function save(Request $request)
    {
         $data =[];
        if($request->type == 'file'){
            $data = Files::create(['name' => $request->name, 'folder_id' => $request->id]);
        }
        else{
            $data = Folders::create(['name' => $request->name, 'parent_id' => $request->id]);
        }
        return response(['data'=>$data,'status'=>200]);
    }

    public function delete(Request $request)
    {
         $data =[];
        if($request->type == 'file'){
            $data = Files::find($request->id)->delete();
        }
        else{
            $data = Folders::find($request->id)->delete();
        }
        return response(['data'=>'Deleted Successfully!!','status'=>200]);
    }
}
