<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Service;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function index()
    {
     return view('items', ['data' => Service::getItems()]);
    }

    public function submit(Request $request)
    {
        $name = $request->input('name');
         Service::addItem($name);     
         return redirect('/item');
    }

    public function editItem(Request $request)
    {
     $d=   Service::editItem($request);
        return true;
    }
     
    public function delete(Request $request)
    {
        //dd($request);
        $response=$request->name;
if ($request->name=="selected"){
    $response=   Service::deleteItem();
    
   
}else{
       $response=   Service::deleteAllItem();
     
    }
    
        
     
     return $response;
    }

}
