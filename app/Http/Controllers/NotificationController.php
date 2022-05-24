<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\QueryMessage;

class NotificationController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();
        $where=$this->dashboardSelectorNotification();
        
         foreach ($notifications as $notify) {
                $notify->markAsRead();

            }
      
        return view($where.'.index')->with('notifications', $notifications)->with('messages', $messages);
    }

      public function notify(){
        $user=UserAccount::first();
        $user->notify(new NotificationModel($user));
    }

    public function markNotification(Request $request)
    {
       $notifications= auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })->get();
            
            foreach ($notifications as $notify) {
                $notify->markAsRead();

            }

        return response()->noContent();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $notifications=$this->getNotifications();

        $notify=auth()->user()
                             ->unreadNotifications
                            ->where('id',$id);
        // dd($notifications);
        $messages=$this->getAllMessage();
        $notify->markAsRead();
        $where=$this->dashboardSelectorNotification();


        return view($where.'.show')->with('notifications', $notifications)->with('messages', $messages)->with('notify', $notify);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}