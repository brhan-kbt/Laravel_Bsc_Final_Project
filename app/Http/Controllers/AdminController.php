<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Tithe;
use App\Models\Offering;
use App\Models\Promise;
use App\Models\ServicePayment;
use App\Models\Message;
use App\Http\Traits\QueryMessage;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

use PDF;

class AdminController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function __construct()
    {
        $this->middleware('super')->except(['edit','update']);
    }
    
    
    
    public function home(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
        $members=Member::all();
        $managers=Admin::all();
        $tithe=Tithe::sum('amount');
        $offering=Offering::sum('amount');
        $servicePayment=ServicePayment::sum('amount');
        $promise=Promise::sum('paidAmount');
        $income=$tithe + $offering + $servicePayment + $promise;
        return view('super-admin.home')->with('messages', $messages)
                                        ->with('notifications', $notifications)
                                        ->with('members', $members)
                                        ->with('managers', $managers)
                                        ->with('income', $income);
    }
    
   public function index(){



      $mgrs=Admin::all();
      $messages = $this->getAllMessage();
      $notifications = $this->getNotifications();


      return view('super-admin.indexAdmin')->with('mgrs', $mgrs)->with('messages', $messages)->with('notifications', $notifications);


   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $messages = $this->getAllMessage();
       $notifications = $this->getNotifications();
       return view('super-admin.createAdmin')->with('messages', $messages)->with('notifications', $notifications);
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
            'adminName'=>'required',
            'username'=>'required',
            'password'=>'required|min:8|max:12',
            // 'profileImg'=>'required|image',
            'adminRole'=>'required',
        ]);

         if($request->hasFile('profileImg')){
             //get file name extension

             $fienamewithExt=$request->file('profileImg')->getClientOriginalName();
                 //get file name
             $filename=pathinfo($fienamewithExt,PATHINFO_FILENAME);
                 //get file extension
             $extension=$request->file('profileImg')->getClientOriginalExtension();
                 //file name to store
            $fileNameToStore=$filename .'_'.time().'.'.$extension;

             $path=$request->file('profileImg')->storeAs('public/images',$fileNameToStore);


         }else{
             $fileNameToStore='noimage.jpg';
         }

         $admin=new Admin();
         $admin->adminName=$request->input('adminName');
         $admin->adminRole=$request->input('adminRole');
         $admin->profileImg=$fileNameToStore;
         $admin->save();


         $pass=$request->input('password');
         $password=Hash::make($pass);
       
         $user=new UserAccount();
         $user->username=$request->input('username');
         $user->password=$password;
         $user->userType=$request->input('adminRole');
         $user->member_id=0;
         $user->admin_id=$admin->id;
         $user->save();

       return redirect('/admin')->with('success',"Registered Successfully!");

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
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
        $admin=Admin::find($id);
        $to=$this->dashboardSelectorForProfile();
        
        if ($admin) {
            if ($admin->id=== Auth::user()->admin_id or Auth::user()->userType==='super') {
                return view($to.'EditAdminProfile')->with('admin', $admin)->with('messages', $messages)->with('notifications', $notifications);
            } else {
                return Redirect::to(url()->previous());
            }
        }
        else{
                return Redirect::to(url()->previous());
        }
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
               
       

         if($request->hasFile('profileImg')){
             //get file name extension

             $fienamewithExt=$request->file('profileImg')->getClientOriginalName();
                 //get file name
             $filename=pathinfo($fienamewithExt,PATHINFO_FILENAME);
                 //get file extension
             $extension=$request->file('profileImg')->getClientOriginalExtension();
                 //file name to store
            $fileNameToStore=$filename .'_'.time().'.'.$extension;

             $path=$request->file('profileImg')->storeAs('public/images',$fileNameToStore);


         }else{
             $fileNameToStore='noimage.jpg';
         }

         $admin=Admin::find($id);
         $admin->adminName=$request->input('adminName');
         $admin->adminRole=$request->input('adminRole');

         if($request->hasFile('profileImg')){
                $admin->profileImg=$fileNameToStore;
         }
         $admin->save();

         $user=UserAccount::where('admin_id', $id);
         $user->username=$request->input('username');
         $user->userType=$request->input('adminRole');
       

       return redirect('/admin/managemgrs')->with('success',"Registered Successfully!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Admin::find($id);
        
          if($admin->profileImg!= 'noimage.jpg'){
                  Storage::delete('public/images/'.$admin->profileImg);
          }

        $admin->user->delete();
        $admin->delete();
        return redirect('/admin/managemgrs')->with('success',"Deleted Successfully!");


    }

    public function report(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
        
        return view('super-admin.report')->with('messages', $messages)
                                        ->with('notifications', $notifications);
    }
    
    public function memberReport(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
        $members = Member::all();
        $pdf = PDF::loadView('super-admin.report.member', ['members' => $members]);
        return$pdf->setPaper('a4')->stream();
      
    }

    public function financeReport(){
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $tithes=Tithe::all();
        $offerings=Offering::all();
        $servicePayments=ServicePayment::all();
        $promises=Promise::all();

        $pdf = PDF::loadView('super-admin.report.finance', [
             'tithes' => $tithes,
             'offerings'=>$offerings,
             'servicePayments'=>$servicePayments,
             'promises'=>$promises]);
        return$pdf->setPaper('a4')->stream();
    }

    public function managersReport(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
        $managers = Admin::all();
        return view('super-admin.report.managers')->with('messages', $messages)
                                        ->with('notifications', $notifications)
                                        ->with('managers', $managers);
    }


    public function titheReport(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
         $tithes=Tithe::all();
      
        return view('super-admin.report.finance.tithe')->with('messages', $messages)
                                        ->with('notifications', $notifications)
                                        ->with('tithes', $tithes);
    }

    public function offeringReport(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
        $offerings=Offering::all();
       
        return view('super-admin.report.finance.offering')->with('messages', $messages)
                                        ->with('notifications', $notifications)
                                        ->with('offerings', $offerings);
    }

    public function promiseReport(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
         $promises=Promise::all();
        return view('super-admin.report.finance.promise')->with('messages', $messages)
                                        ->with('notifications', $notifications)
                                        ->with('promises', $promises);
    }

    public function serviceReport(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();
        $servicePayments=ServicePayment::all();
        return view('super-admin.report.finance.service')->with('messages', $messages)
                                        ->with('notifications', $notifications)
                                        ->with('servicePayments', $servicePayments);
    }

    
}