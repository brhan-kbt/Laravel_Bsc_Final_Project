
     <div class="container">
         <div class="card">
             <div class="card-header">
                <h2>Message Detail</h2>
             </div>
             <div class="card-body">
        <div class="row">
         <div class="col-sm-8 offset-1">
             <p> <strong> Sender Name :</strong> {{$message->senderName}}</p>
         </div>
         </div>
         <div class="row">
         <div class="col-sm-8 offset-1">
             <p> <strong> Title :</strong> {{$message->title}}</p>
         </div>
         </div>
         <div class="row">
         <div class="col-sm-8 offset-1">
             <p> <strong> Message :</strong> {!!$message->message!!}</p>
         </div>
         </div>
              
             </div>
     </div>
     </div>