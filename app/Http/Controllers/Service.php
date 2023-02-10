<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class Service
{

    public function __construct()
    {      
    }
    public static function getItems()
    {
        $response = Http::get('localhost:3300/items');
        $jsonData = $response->json();
         return  $jsonData;
    }

   
    public static function deleteItem()
    {
        $response = Http::delete('localhost:3300/deleteItemSelected');
        $jsonData = $response->json();
        if ($response->successful()) {
            return true;
        } else {
            return false;
        }
         
    }

    public static function deleteAllItem()
    {
        $response = Http::delete('localhost:3300/deleteAllItem');
        if ($response->successful()) {
            return true;
        } else {
            return false;
        }
         
    }


    public static function editItem(Request $request)
    {
        $data = [
            'id' => $request->id,
            'state'=>$request->state
        ];
     
        $response = Http::post('localhost:3300/editItem' , $data);
    
       if ($response->successful()) {
            return response()->json(['message' => 'Agregado con Exito.'], 200);
        } else {
            return response()->json(['message' => 'Ha ocurrido un error al agregar'], 400);
        }
    }



    public static function addItem($name)
    {
        $data = [
            'name' => $name
        ];
     
        $response = Http::post('localhost:3300/addItem' , $data);
    
       if ($response->successful()) {
            return response()->json(['message' => 'Agregado con Exito.'], 200);
        } else {
            return response()->json(['message' => 'Ha ocurrido un error al agregar'], 400);
        }
    }




    
}