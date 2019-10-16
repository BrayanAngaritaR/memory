<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoryController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {

      return view('memory.home');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
   //
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {

      // $request->validate([
      //    'text' => 'required'
      // ]);

      $file = $request->file('text');
      $fopen = fopen($file, "r");
      $fread = fread($fopen,filesize($file));
      fclose($fopen);

      $array2 = str_split($fread, 1);

      $ram = array_slice($array2, 0, 64);   
      $virtual = array_slice($array2, 64, 128);

      return view('memory.index', compact('ram', 'virtual', 'fread'));
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show(Request $request)
   {
      $text = $request->content;
      $array2 = str_split($text, 1);

      $ram = array_slice($array2, 0, 64);   
      $virtual = array_slice($array2, 64, 128);

      // $request->validate([
      //    'ram_or_virtual' => 'required',
      //    'position' => 'required',
      //    'newValue' => 'required',
      // ]);

      // if($request->ram_or_virtual == 0)
      // {
      //    return back()->with('status', ['danger', __('No seleccionaste dónde liberar el espacio')]);  
      // }


      if($request->ram_or_virtual == 'ram')
      {
         $ram0 = array_slice($array2, 0, 64); 
         $ram1 = array($request->position => $request->newValue);
         $ram = array_replace($ram0, $ram1);
      } else {
         $virtual0 = array_slice($array2, 64, 128);
         $virtual1 = array($request->position-64 => $request->newValue);
         $virtual = array_replace($virtual0, $virtual1);

      }

      

     
      $both = array_merge($ram, $virtual);

      $fread = implode($both);


      return view('memory.index', compact('ram', 'virtual', 'fread'));
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit(Request $request)
   {
      $text = $request->content;
      $array2 = str_split($text, 1);

      $ram = array_slice($array2, 0, 64);   
      $virtual = array_slice($array2, 64, 128);

      // $request->validate([
      //    'ram_or_virtual' => 'required',
      //    'position' => 'required',
      //    'newValue' => 'required',
      // ]);

      // if($request->ram_or_virtual == 0)
      // {
      //    return back()->with('status', ['danger', __('No seleccionaste dónde liberar el espacio')]);  
      // }


      if($request->ram_or_virtual == 'ram')
      {
         $ram0 = array_slice($array2, 0, 64); 
         $ram1 = array($request->position => $request->newValue);
         $ram = array_replace($ram0, $ram1);
      } else {
         $virtual0 = array_slice($array2, 64, 128);
         $virtual1 = array($request->position-64 => $request->newValue);
         $virtual = array_replace($virtual0, $virtual1);

      }

      

     
      $both = array_merge($ram, $virtual);

      $fread = implode($both);


      return view('memory.index', compact('ram', 'virtual', 'fread'));
   }


   public function clear(Request $request)
   {
      $text = $request->content;
      $array2 = str_split($text, 1);

      $ram = array_slice($array2, 0, 64);
      $virtual1 = array_slice($array2, 64, 128);

      $trimmed_array = array_map('trim', $virtual1);//Obtiene los espacios en blanco y los borra
      $virtual=array_filter($trimmed_array, "strlen"); //Elimina por completo los espacios con ""

      //dd($newValues);


      //$virtual = [];

      $both = array_merge($ram, $virtual);

      $fread = implode($both);

      return view('memory.index', compact('ram', 'virtual', 'fread'));
   }

   public function newValueInvirtualRam(Request $request)
   {
      $text = $request->content2;
      $array2 = str_split($text, 1);

      $ram = array_slice($array2, 0, 64);   
      $virtual = array_slice($array2, 64, 128);


      //Buscar el valor y obtenerlo
      $key = $request->position2;
      $value = $ram[$key];

      $ram0 = array_slice($array2, 0, 64); 
      $ram1 = array($key => "_");
      $ram = array_replace($ram0, $ram1);

      $virtual0 = array_slice($array2, 64, 128);
      $virtual1 = array($request->newValueInvirtualRam-64 => $value);
      $virtual = array_replace($virtual0, $virtual1);

     
      $both = array_merge($ram, $virtual);
      $fread = implode($both);

      return view('memory.index', compact('ram', 'virtual', 'fread'));
   }


   public function find(Request $request)
   {
      $text = $request->content3;
      $array2 = str_split($text, 1);

      $ram = array_slice($array2, 0, 64);   
      $virtual = array_slice($array2, 64, 128);

      //dd($ram);


      //Buscar el valor y obtenerlo
      $key = $request->position3;

      //dd($virtual);

      if($request->ram_or_virtual2 == 'ram')
      {
         $value = ( array_key_exists($key, $ram) && !empty($ram[$key]) ) 
         ? $ram[$key] 
         : 'El valor no existe o la posición está vacía';

      } else {
         $value = ( array_key_exists($key-64, $virtual) && !empty($virtual[$key]) ) 
         ? $virtual[$key-64] 
         : 'El valor no existe o la posición está vacía';
      }


     
      $both = array_merge($ram, $virtual);

      $fread = implode($both);

      dd($value);

      return view('memory.index', compact('ram', 'virtual', 'fread'));
   }


   

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, $id)
   {
   //
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
   //
   }
}
