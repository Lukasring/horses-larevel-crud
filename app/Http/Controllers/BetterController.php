<?php

namespace App\Http\Controllers;

use App\Models\Better;
use Illuminate\Http\Request;
use App\Models\Horse;

class BetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request->horse_id) && $request->horse_id !== 0)
            $betters = Better::where('horse_id', $request->horse_id)->orderBy('bet', 'desc')->get();
        else
            $betters = Better::orderBy('bet', 'desc')->get();


        return view('betters.index', [
            'betters' => $betters,
            'horses' => Horse::orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('betters.create', ['horses' => Horse::orderBy('name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'surname' => 'required|max:150',
            'bet' => 'required|gt:0',
            'horse_id' => 'required'
        ]);

        $better = new Better();
        $better->fill($request->all());

        return ($better->save() !== 1) ?
            redirect()->route('betters.index')->with('status_success', "Better added!") :
            redirect()->route('betters.index')->with('status_error', "Better was not added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function show(Better $better)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function edit(Better $better)
    {
        return view('betters.edit', ['better' => $better, 'horses' => Horse::orderBy('name')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Better $better)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'surname' => 'required|max:150',
            'bet' => 'required|gt:0',
            'horse_id' => 'required'
        ]);

        $better->fill($request->all());

        return ($better->save() !== 1) ?
            redirect()->route('betters.index')->with('status_success', "Better updated!") :
            redirect()->route('betters.index')->with('status_error', "Better was not updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function destroy(Better $better)
    {
        $better->delete();
        return redirect()->route('betters.index')->with('status_success', 'Better deleted!');
    }
}
