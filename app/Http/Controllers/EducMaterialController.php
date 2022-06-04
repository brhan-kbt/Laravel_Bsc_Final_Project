<?php

namespace App\Http\Controllers;
use App\Models\Educ_Material;
use Illuminate\Http\Request;
use App\Http\Traits\QueryMessage;
class EducMaterialController extends Controller
{

    use QueryMessage;
    /**
     * Show all books for download .
     *
     * @return \Illuminate\Http\Response
     */
    
      public function __construct()
    {
        $this->middleware('educadmin', ['except'=>['displayBooks','displayArticles','download', 'search']]);
    }

    public function home(){
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $books=Educ_Material::all()->where('type','Book');
        $articles=Educ_Material::all()->where('type','Article');;

        $notifications=$this->getNotifications();
        return view('EducationAdmin.home')
                    ->with('messages', $messages)->with('notifications', $notifications)
                    ->with('books', $books)->with('articles', $articles);
    }
    
    public function displayBooks(){
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $books=Educ_Material::all()->where('type','Book');
        
        return view('EducationAdmin.educ_material.educ_materials')->with('books',$books)->with('messages', $messages)->with('notifications', $notifications);
    }
    
     public function displayArticles(){
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $books=Educ_Material::all()->where('type','Article');;
        return view('EducationAdmin.educ_material.educ_materials')->with('books',$books)->with('messages', $messages)->with('notifications', $notifications);
    }
    public function search(Request $request){
        if ($request->has('q')) {
            $q=$request->q;
            $results=Educ_Material::where('title', 'like', '%'.$q.'%')->get();
            return response()->json(['data'=>$results]);


            //          $output='';
    // if(count($results)>0){

    //      $output ='
    //         <div class="row">
    //         <div class="col-md-8">';
        
    //             foreach($results as $row){
    //                 $output .='
    //                 <div class="row">
    //                 <div class="col-md-4">
    //                     <img style="width:100%; height:90%" src="/storage/educ_photo/'.$row->cover_image.'" >
    //                 </div>
    //                 <div class="col-md-8">
    //                     <h4 class="">'. $book->title .': <span class="fw-bold">'.$book->type .'</span></h4>
    //                     <a href="#" class="text-info fw-bold mb-2">'.$book->Author .'</a>
    //                     <p>'.$book->description.'</p>
    //                     <div class="float-right">
    //                     <p> <span class="fw-bold"> Published Date: </span> {{$book->publishDate}}</p>
    //                     <a href="'.route('download', $book->id).'" class="btn btn-primary float-right">Download</a>
    //                     </div>
    //                 </div>
    //                 </div>';
    //             }

    //      $output .= '
    //          </div>
    //         </div>';
    // }
    // else{

    //     $output .='No results';

    // }

    // return $output;

    // }
        }
    }
    public function download($id){
       $file=Educ_Material::find($id);
       return  response()->download(public_path('storage/educ_file/'.$file->filename));
    }
     /**
     * Show all books for download .
     *
     * @return \Illuminate\Http\Response
     */
    
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $books= Educ_Material::all();
        return view('EducationAdmin.educ_material.index')->with('books',$books)->with('messages', $messages)->with('notifications', $notifications);
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

        return view('EducationAdmin.educ_material.upload')->with('messages', $messages)->with('notifications', $notifications);
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
                'title'=>'required',
            	'Author'=>'required',
                'type'=>'required',
                'publishDate'=>'required',
                'filename'=>'required',
                'cover_image'=>'required',
                    
        ]);
        if($request->hasFile('file')){
            $filenamewithext=$request->file('file')->getClientOriginalName();
            $filename=pathinfo('$filenamewithext',PATHINFO_FILENAME);
            $extention=$request->file('file')->getClientOriginalExtension();
            
            $fiilenametostore=$filename.'_'.time().'.'.$extention;
            $request->file('file')->storeAs('public/educ_materials',$fiilenametostore);
            }

            if($request->hasFile('photo')){
                $filenamewithext2=$request->file('file')->getClientOriginalName();
                $photoname=pathinfo('$filenamewithext2',PATHINFO_FILENAME);
                $extention=$request->file('file')->getClientOriginalExtension();
                
                $photoenametostore=$photoname.'_'.time().'.'.$extention;
                $request->file('file')->storeAs('public/educ_photo',$photoenametostore);
                }

                 //handle the file upload
        if($request->hasFile('cover_image')){
            //get file name extension

            $fileNameWithExtPhoto=$request->file('cover_image')->getClientOriginalName();
                //get file name
            $filename=pathinfo($fileNameWithExtPhoto,PATHINFO_FILENAME);
                //get file extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
                //file name to store
            $coverImageToStore=$filename .'_'.time().'.'.$extension;

            $path=$request->file('cover_image')->storeAs('public/educ_photo',$coverImageToStore);


        }else{
            $coverImageToStore='noimage.jpg';
        }


                    //handle the file upload
        if($request->hasFile('filename')){
            //get file name extension

            $fileNameWithExtFile=$request->file('filename')->getClientOriginalName();
                //get file name
            $filename=pathinfo($fileNameWithExtFile,PATHINFO_FILENAME);
                //get file extension
            $extension=$request->file('filename')->getClientOriginalExtension();
                //file name to store
            $fileNameToStore=$filename .'_'.time().'.'.$extension;

            $path=$request->file('filename')->storeAs('public/educ_file',$fileNameToStore);


        }

        $book= new Educ_Material;
      
        $book->title=$request->input('title');
        $book->Author=$request->input('Author');
        $book->type=$request->input('type');
        $book->publishDate=$request->input('publishDate');
        $book->description=$request->input('description');
        $book->cover_image= $coverImageToStore;
        $book->filename= $fileNameToStore;
        $book->save();
        return redirect('educAdmin/educ_material')->with('success', 'Uploaded');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $books=Educ_Material::find($id);
        return view('EducationAdmin.educ_material.show')->with('books',$books)->with('messages', $messages)->with('notifications', $notifications);

 }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();

        $books=Educ_Material::find($id);
        return view('EducationAdmin.educ_material.update')->with('books',$books)->with('messages', $messages)->with('notifications', $notifications);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $this->validate($request,[
            'title'=>'required',
            	'Author'=>'required',
                'type'=>'required',
                'publishDate'=>'required',
        ]);
        if($request->hasFile('file')){
            $filenamewithext=$request->file('file')->getClientOriginalName();
            $filename=pathinfo('$filenamewithext',PATHINFO_FILENAME);
            $extention=$request->file('file')->getClientOriginalExtension();
            
            $fiilenametostore=$filename.'_'.time().'.'.$extention;
            $request->file('file')->storeAs('public/educ_materials',$fiilenametostore);
            }

            if($request->hasFile('photo')){
                $filenamewithext2=$request->file('file')->getClientOriginalName();
                $photoname=pathinfo('$filenamewithext2',PATHINFO_FILENAME);
                $extention=$request->file('file')->getClientOriginalExtension();
                
                $photoenametostore=$photoname.'_'.time().'.'.$extention;
                $request->file('file')->storeAs('public/educ_photo',$photoenametostore);
                }

                 //handle the file upload
        if($request->hasFile('cover_image')){
            //get file name extension

            $fileNameWithExtPhoto=$request->file('cover_image')->getClientOriginalName();
                //get file name
            $filename=pathinfo($fileNameWithExtPhoto,PATHINFO_FILENAME);
                //get file extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
                //file name to store
            $coverImageToStore=$filename .'_'.time().'.'.$extension;

            $path=$request->file('cover_image')->storeAs('public/educ_photo',$coverImageToStore);


        }else{
            $coverImageToStore='noimage.jpg';
        }


                    //handle the file upload
        if($request->hasFile('filename')){
            //get file name extension

            $fileNameWithExtFile=$request->file('filename')->getClientOriginalName();
                //get file name
            $filename=pathinfo($fileNameWithExtFile,PATHINFO_FILENAME);
                //get file extension
            $extension=$request->file('filename')->getClientOriginalExtension();
                //file name to store
            $fileNameToStore=$filename .'_'.time().'.'.$extension;

            $path=$request->file('filename')->storeAs('public/educ_file',$fileNameToStore);


        }

        $book= Educ_Material::find($id);
      
        $book->title=$request->input('title');
        $book->Author=$request->input('Author');
        $book->type=$request->input('type');
        $book->publishDate=$request->input('publishDate');
        $book->description=$request->input('description');
        if($request->hasFile('cover_image')){
           $book->cover_image= $coverImageToStore;
        }
        if($request->hasFile('filename')){
                $book->filename= $fileNameToStore;
        }
        $book->save();
        return redirect('/educAdmin/educ_material')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $boods=Educ_Material::find($id);
        $boods->delete();
        return redirect('educ_material')->with('success', 'Updated');
    }
}