<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service_orders;
use App\Companies;
use App\Proposals;

class Service_ordersController extends Controller
{

    protected $status_os = array(
        'c'=>'Criada',
        'd'=>'Delegada',
        'f'=>'Finalizada',
    );



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company)
    {

        $company_id = $company;

        return view('service_orders.create',compact('company_id'));
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
            'company_id'    => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'status'        => 'required',
        ]);
        Service_orders::create($request->all());
        return redirect()->route('companies.show',[$request->company_id])
            ->with('success','Cadastro criado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $status_os = $this->status_os;

        $service_order = Service_orders::find($id);

        $company = Companies::find($service_order->company_id);
        $proposals = Proposals::where('service_order_id','=',$id)
            ->latest()
            ->paginate(5);

        return view('service_orders.show',compact('service_order','status_os','company','proposals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * @param $id
     * @param $lawyer
     * @return $this
     */
    public function show_to_lawyer($id,$lawyer_id)
    {

        $status_os = $this->status_os;

        $service_order = Service_orders::find($id);

        $company = Companies::find($service_order->company_id);

        $proposals = Proposals::where('service_order_id','=',$id)
            ->where('lawyer_id','=',$lawyer_id)
            ->latest()
            ->paginate(5);

        return view('service_orders.show',compact('service_order','status_os','company','lawyer_id','proposals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service_order = Service_orders::find($id);
        return view('service_orders.edit',compact('service_order'));
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
            'company_id'    => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'status'        => 'required',
        ]);
        Service_orders::find($id)->update($request->all());
        return redirect()->route('service_orders.index')
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
        Service_orders::find($id)->delete();
        return redirect()->route('service_orders.index')
            ->with('success','Cadastro excluído com sucesso');
    }
}
