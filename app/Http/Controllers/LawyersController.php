<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lawyers;

class LawyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyers = Lawyers::latest()->paginate(5);
        return view('lawyers.index',compact('lawyers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lawyers.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'      => 'required',
            'cpf'       => 'required',
            'phone'     =>'required'
        ]);
        Lawyers::create($request->all());
        return redirect()
            ->route('lawyers.index')
            ->with('success','Advogado cadastrado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lawyer = Lawyers::find($id);
        return view('lawyers.show',compact('lawyer'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lawyer = Lawyers::find($id);
        return view('lawyers.edit',compact('lawyer'));
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
        request()->validate([
            'name'      => 'required',
            'cpf'       => 'required',
            'phone'  =>'required'
        ]);
        Lawyers::find($id)->update($request->all());
        return redirect()->route('lawyers.index')
            ->with('success','Lawyer updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lawyers::find($id)->delete();
        return redirect()->route('lawyers.index')
            ->with('success','Lawyer deleted successfully');
    }
}

