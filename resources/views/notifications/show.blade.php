
      <div class="card">
         @foreach ($notify as  $notify)
         <div class="card-header">
            <h4 class="text-danger fw-bold">New Notification {{$notify->created_at->diffForHumans()}} </h4>
         </div>
         <div class="card-body">
            <h5 class="fw-bold">New Post with the title <a href="#" class="fw-bold text-info"> {{$notify->data['title']}} </a> created </h5>
         </div>
         @endforeach

      </div>
     

   
   