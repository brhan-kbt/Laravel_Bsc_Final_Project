<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\MuseumRecord;
use App\Http\Traits\QueryMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Notifications\NotificationModel;
use App\Models\UserAccount;



class MuseumRecordController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pradmin');
    }
    
    public function home(){
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();

        $events=Event::count();

        $records=MuseumRecord::count();
         return view('pradmin.home')->with('messages', $messages)->with('events', $events)
         ->with('records', $records)->with('notifications', $notifications);
    }
    
    public function index()
    {
        
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();

        $posts=MuseumRecord::orderBy('created_at','desc')->get();
        return view('event_museum_record_admin.musuem.musuem')->with('posts',$posts)->with('messages', $messages)->with('notifications', $notifications);
//    return "index";
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

        return view('event_museum_record_admin.musuem.post')->with('messages', $messages)->with('notifications', $notifications);
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
        'recordName'=>'required',
        'description'=>'required' ,
        'recordimage'=>'image|nullable'
     ]);
     
     
     if($request->hasFile('recordimage')){
        
             $fienamewithExt=$request->file('recordimage')->getClientOriginalName();
                 //get file name
             $filename=pathinfo($fienamewithExt,PATHINFO_FILENAME);
                 //get file extension
             $extension=$request->file('recordimage')->getClientOriginalExtension();
                 //file name to store
             $fileNameToStore=$filename .'_'.time().'.'.$extension;

             $path=$request->file('recordimage')->storeAs('public/musuem_images',$fileNameToStore);
        }
        else{
            $fileNameToStore='noimage.jpg';
        }
            $posts=new MuseumRecord;
            $posts->recordName=$request->input('recordName');
            $posts->description=$request->input('description');
           //  $post->user_id=auth()->user()->id;
            $posts->recordimage=$fileNameToStore;
            $posts->admin_id=Auth::user()->admin->id;;
            $posts->save();

            $users=UserAccount::all();
                foreach ($users as $user) {
                    $user->notify(new NotificationModel($posts));
                }
            return redirect('/musuem')->with('success','Musuem Record Uploaded');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = $this->getAllMessage();
        $notifications = $this->getNotifications();

        $posts=MuseumRecord::find($id);
        return view('event_museum_record_admin.musuem.show')->with('posts',$posts)->with('messages', $messages)->with('notifications', $notifications);
  
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

        $posts=MuseumRecord::find($id);
        return view('event_museum_record_admin.musuem.edit')->with('posts',$posts)->with('messages', $messages)->with('notifications', $notifications);

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
        $this->validate($request,[
            'recordName'=>'required',
        'description'=>'required' ,
        'recordimage'=>'image|nullable'
     ]);
 if($request->hasFile('recordimage')){
 $filenamewithext=$request->file('recordimage')->getClientOriginalName();
 $filename=pathinfo('$filenamewithext',PATHINFO_FILENAME);
 $extension=$request->file('recordimage')->getClientOriginalExtension();
 
 $fiilenametostore=$filename.'_'.time().'.'.$extension;
 $request->file('recordimage')->storeAs('public/musuem_images',$fiilenametostore);
 }
 
     $posts= MuseumRecord::find($id);
     $posts->recordName=$request->input('recordName');
     $posts->description=$request->input('description');
     if($request->hasFile('recordimage')){
        $posts->recordimage=$fiilenametostore;
    }
    $posts->save();
     return redirect('/musuem')->with('success','Musuem Record updated');
   
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=MuseumRecord::find($id);
        $posts->Delete();
        
        if($posts->recordimage!='noimage.jpg'){

          Storage::Delete('/public/musuem_images/'.$posts->recordimage);
        }
        return redirect('musuem')->with('success','Musuem record removed');
   
    }
}