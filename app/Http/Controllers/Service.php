<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;




class Service
{private  $host="https://bottlenose-deserted-catsup.glitch.me";

    public function __construct()
    {      
    }
    public static function getItems()
    {
        $objeto = new Service();
        $response = Http::withOptions(['verify' => false])->get($objeto->host.'/items');
        $jsonData = $response->json();
        return $jsonData;
    }

   
    public static function deleteItem()
    {$objeto = new Service();
        $response = Http::withOptions(['verify' => false])->delete($objeto->host.'/deleteItemSelected');
        $jsonData = $response->json();
        if ($response->successful()) {
            return true;
        } else {
            return false;
        }
         
    }

    public static function deleteAllItem()
    {$objeto = new Service();
        $response = Http::withOptions(['verify' => false])->delete($objeto->host.'/deleteAllItem');
        if ($response->successful()) {
            return true;
        } else {
            return false;
        }
         
    }


    public static function editItem(Request $request)
    {$objeto = new Service();
        $data = [
            'id' => $request->id,
            'state'=>$request->state
        ];
     
        $response = Http::withOptions(['verify' => false])->post($objeto->host.'/editItem' , $data);
    
       if ($response->successful()) {
            return response()->json(['message' => 'Agregado con Exito.'], 200);
        } else {
            return response()->json(['message' => 'Ha ocurrido un error al agregar'], 400);
        }
    }



    public static function addItem($name)
    {$objeto = new Service();
        $data = [
            'name' => $name
        ];
       
        $response = Http::withOptions(['verify' => false])->post($objeto->host.'/addItem',$data);
    
       if ($response->successful()) {
            return response()->json(['message' => 'Agregado con Exito.'], 200);
        } else {
            return response()->json(['message' => 'Ha ocurrido un error al agregar'], 400);
        }
    }




    
}