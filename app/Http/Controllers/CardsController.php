<?php

namespace App\Http\Controllers;
use App\Cards;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    //
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = \DB::table('cards')->get();
        return view('cards', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $cards = \DB::table('cards')->get();

        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate(
            [
                     "title" => "required",
                     "subtitle" => "required",
                     "image" => "required|url",
                     "description"=>"required|max:200"
             ]);

        $cards = new Cards();
        $cards->title= $request->title;
        $cards->subtitle=$request->subtitle;
        $cards->image=$request->image;
        $cards->description=$request->description;
        $cards->save();

       return view('add', $validateData);

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
    public function edit($id)
    {


        $cards = \DB::table('cards')->get()->toArray();
        $card = Cards::where('id',$id)->first();
        return view('edit', compact('cards', 'card'));
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
        
        // $cards = \DB::table('cards')->get();
        $card = Cards::where('id',$id)->first();
            $card->image = $request->image;
            $card->title =  $request->title;
            $card->subtitle = $request->subtitle;
            $card->description = $request->description;
            $card->save();
        return redirect('/cards');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cards::where('id',$id)->delete();
        return redirect('cards');
    }
    public function view()
    {
        $cards = \DB::table('cards')->get();
        return view('cards', ["cards"=> $cards]);

    }
}
