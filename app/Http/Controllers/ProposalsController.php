<?php

namespace App\Http\Controllers;

use App\Service_orders;
use Illuminate\Http\Request;
use App\Proposals;

class ProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposals::latest()->paginate(5);
        return view('proposals.index',compact('proposals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service_order_id,$lawyer_id)
    {
        return view('proposals.create',compact('service_order_id','lawyer_id'));
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
            'service_order_id'=> 'required',
            'lawyer_id' => 'required',
            'value'     => 'required',

        ]);

        $request['value'] = str_replace('.', '', $request['value']);
        $request['value'] = str_replace(',', '.', $request['value']);

        Proposals::create($request->all());
        return redirect()->route('service_orders.show_to_lawyer',[$request->service_order_id,$request->lawyer_id])
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
        $proposal = Proposals::find($id);
        return view('proposals.show',compact('proposal'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposals::find($id);
        return view('proposals.edit',compact('proposal'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept($id)
    {

        Proposals::where('id', $id)->update(array('acceptance' => 'a'));

        $proposal = Proposals::find($id);

        Service_orders::where('id', $proposal->service_order_id)->update(array('status' => 'd'));


        return redirect()->route('service_orders.show',[$proposal->service_order_id])
            ->with('success','Cadastro atualizado com sucesso');

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
            'service_order_id'=> 'required',
            'proposal_id' => 'required',
            'value'     => 'required',
            'acceptance'=> 'required',
        ]);
        Proposals::find($id)->update($request->all());
        return redirect()->route('proposals.index')
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
        Proposals::find($id)->delete();
        return redirect()->route('proposals.index')
            ->with('success','Cadastro excluído com sucesso');
    }
}

