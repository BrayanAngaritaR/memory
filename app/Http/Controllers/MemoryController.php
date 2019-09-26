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
   public function show($id)
   {
   //
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
