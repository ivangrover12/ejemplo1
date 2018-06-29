<?php

namespace App\Http\Controllers;

use App\Trainer; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorageTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $trainers = Trainer::all();
       return view('trainers.index', compact('trainers'));
       //return 'hola desde el controlador resource' ;//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('trainers.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | max: 10',
            //'avatar' => 'required | image ',
            'slug' => 'required'
        ]);
        
        $trainer = new Trainer();
        
        if($request->hasFile('avatar')){
            $file= $request->file('avatar');    
            $name =time().$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/',$name);
           // return $name;
        }
        
        
        $trainer->name = $request->input('name');
        $trainer->slug = $request->input('slug');
        $trainer->save();
        
        return redirect('trainers');
      //  return $request->input('name');
        //return $request->input('name');   //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //$trainer = Trainer::where('slug','=',$slug)->firstOrFail();
        
        return view('trainers.show', compact('trainer'));
        
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        //return $request;//
        $trainer->fill($request->except('avatar'));

        if($request->hasFile('avatar')){
            $file= $request->file('avatar');

            $name =time().$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/',$name);
           // return $name;
        }
        $trainer->save();

        return redirect()-> route('trainers.show',[$trainer])->with('status','objeto actualizado correctamente');
        //return 'updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
        return redirect('trainers');
        //return  $file_path;//
    }
}
