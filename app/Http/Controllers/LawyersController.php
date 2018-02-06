<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lawyers;
use App\Service_orders;

class LawyersController extends Controller
{
    protected $status_os = array(
        'c'=>'Criada',
        'd'=>'Delegada',
        'f'=>'Finalizada',
    );

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
            'phone'     =>'required',
            'email'     => 'required|email|unique:lawyers',
        ]);

        $request['cpf'] = preg_replace('/\D/', '', $request['cpf']);
        $request['phone'] = preg_replace('/\D/', '', $request['phone']);

        Lawyers::create($request->all());

        return redirect()
            ->route('lawyers.index')
            ->with('success','Cadastro criado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status_os = $this->status_os;
        $service_orders = Service_orders::latest()->paginate(5);


        $lawyer = Lawyers::find($id);
        return view('lawyers.show',compact('lawyer','status_os','service_orders'));
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
            'phone'     =>'required'
        ]);


        $request['cpf'] = preg_replace('/\D/', '', $request['cpf']);
        $request['phone'] = preg_replace('/\D/', '', $request['phone']);

        Lawyers::find($id)->update($request->all());
        return redirect()->route('lawyers.index')
            ->with('success','Cadastro atualizado com sucesso');
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
            ->with('success','Cadastro excluído com sucesso');
    }
}

