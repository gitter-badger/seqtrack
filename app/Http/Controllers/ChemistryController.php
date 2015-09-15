<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ChemistryRequest;
use App\Chemistry;

class ChemistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $chemistry = Chemistry::all();

        return view('chemistry.index', [
            'chemistry'  => $chemistry,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $chemistry = Chemistry::all();

        $defaults=[ '1'=>'True', '0'=>'False'];

        return view('chemistry.create', [
            'defaults'   => $defaults,
            'chemistry'  => $chemistry,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChemistryRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ChemistryRequest $request)
    {
        $input = $request->all();
        $chemistry = new Chemistry($input);
        if ($chemistry->default ==1)
        {
            $chemistrys = Chemistry::all();
            foreach($chemistrys as $chem)
            {
                $chem->default =0;
                $chem->update();
            }

        }

        $chemistry->save();


        return redirect('chemistry');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}