<?php

namespace App\Http\Controllers;

use App\Models\Tithe;
use App\Models\Offering;
use App\Models\Promise;
use App\Models\ServicePayment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\QueryMessage;

class TitheController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        $this->middleware('financeadmin');
    }
     
    
     public function home()
     {
         $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

         $tithe=Tithe::sum('amount');
         $offering=Offering::sum('amount');
         $servicePayment=ServicePayment::sum('amount');
         $promise=Promise::sum('paidAmount');
         return view('financeAdmin.home')->with('messages', $messages)
                                         ->with('tithe', $tithe)
                                         ->with('offering', $offering)
                                         ->with('servicePayment', $servicePayment)
                                         ->with('notifications', $notifications)
                                         ->with('promise', $promise);
     }
    public function index()
    {
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $tithes= Tithe::all();
        return view('financeAdmin.tithe_mgt.index')->with('tithes', $tithes)->with('messages', $messages)->with('notifications', $notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

       return view('financeAdmin.tithe_mgt.create')->with('messages', $messages)->with('notifications', $notifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'memberName'=>'required',
            'phone'=>'required',
            'date'=>'required',
            'amount'=>'required',
        ]);

        $tithe= new Tithe();
        $tithe->memberName=$request->input('memberName');
        $tithe->phone=$request->input('phone');
        $tithe->date=$request->input('date');
        $tithe->amount=$request->input('amount');
        $tithe->admin_id=Auth::user()->admin_id;
        $tithe->save();
        
        return redirect('financeAdmin/tithe');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function show(Tithe $tithe)
    {

        
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $tithe=Tithe::find($id);
        return view('financeAdmin.tithe_mgt.edit')->with('tithe', $tithe)->with('messages', $messages)->with('notifications', $notifications);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'memberName'=>'required',
            'phone'=>'required',
            'date'=>'required',
            'amount'=>'required',
        ]);

        $tithe= Tithe::find($id);
        $tithe->memberName=$request->input('memberName');
        $tithe->phone=$request->input('phone');
        $tithe->date=$request->input('date');
        $tithe->amount=$request->input('amount');
        $tithe->admin_id=Auth::user()->admin_id;
        $tithe->save();
        
        return redirect('financeAdmin/tithe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tithe $tithe)
    {
        //
    }
}