<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use Illuminate\Http\Request;


trait QueryMessage{
    public function getAllMessage(){
        
        $messages = Message::where('status','unseen')->where(function($query){
             $query->where('reciepent_id',Auth::user()->id)
                       ->orWhere('reciepent_id',0);
         })->get();
         return $messages;
    }

    public function getNotifications(){
        
       $notifications= Auth::user()->unreadNotifications;
        return $notifications;
   }

    
    public function dashboardSelector(){
        $dash;
        if (Auth::user()->userType==='super') {
             $dash= 'super-admin.messages';
         }

         else if (Auth::user()->userType==='pradmin') {
             $dash= 'pradmin.messages';
         }
         else if (Auth::user()->userType==='financemgr') {
             $dash= 'financeAdmin.messages';
         }

           else if (Auth::user()->userType==='educmgr') {
             $dash= 'EducationAdmin.messages';
         }
           else if (Auth::user()->userType==='memberadmin') {
             $dash= 'memberadmin.messages';
         }
           else if (Auth::user()->userType==='member') {
             $dash= 'user.messages';
         }
         return $dash;
    }


    public function dashboardSelectorNotification(){
        $dash;
        if (Auth::user()->userType==='super') {
             $dash= 'super-admin.notifications';
         }

         else if (Auth::user()->userType==='pradmin') {
             $dash= 'pradmin.notifications';
         }
         else if (Auth::user()->userType==='financemgr') {
             $dash= 'financeAdmin.notifications';
         }

           else if (Auth::user()->userType==='educmgr') {
             $dash= 'EducationAdmin.notifications';
         }
           else if (Auth::user()->userType==='memberadmin') {
             $dash= 'memberadmin.notifications';
         }
           else if (Auth::user()->userType==='member') {
             $dash= 'user.notifications';
         }
         return $dash;
    }

    public function dashboardSelectorForProfile(){
        $dash;
        if (Auth::user()->userType==='super') {
             $dash= 'super-admin.';
         }

         else if (Auth::user()->userType==='pradmin') {
             $dash= 'pradmin.';
         }
         else if (Auth::user()->userType==='financemgr') {
             $dash= 'financeAdmin.';
         }

           else if (Auth::user()->userType==='educmgr') {
             $dash= 'EducationAdmin.';
         }
           else if (Auth::user()->userType==='memberadmin') {
             $dash= 'memberadmin.';
         }
           else if (Auth::user()->userType==='member') {
             $dash= 'user.';
         }
         return $dash;
    }

     public function dashboardSelectorForUserProfile(){
        $dash;
    
         if (Auth::user()->userType==='memberadmin') {
             $dash= 'memberadmin.EditMember';
         }
           else if (Auth::user()->userType==='member') {
             $dash= 'user.EditProfile';
         }
         return $dash;
    }
    
}