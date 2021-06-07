<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piloco;
use Illuminate\Support\Facades\Auth;

class PilocoCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $pilocos = Piloco::orderBy('created_at', 'desc')->get();
        return $pilocos;
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
        $piloco = new Piloco([
            'mode' => $request->input('mode'),
            'name' => $request->input('name'),
            'verre' => $request->input('verre')
        ]);
        $piloco->save();
        return response()->json('Product created!');
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
        $piloco = Piloco::find($id);
        return response()->json($piloco);
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
        $piloco = Piloco::find($id);
        $piloco->update($request->all());

        return response()->json('piloco updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piloco = Piloco::find($id);
        $piloco->delete();

        return response()->json('piloco deleted!');
    }
}
