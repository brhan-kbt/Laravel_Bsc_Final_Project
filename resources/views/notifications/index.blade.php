    <div class="container">
        @if($notifications->count()>0)
    <div class="card">
        <div class="card-header">
                <h4 class="text-danger fw-bold">New notifications</h4>
        </div>
        <div class="card-body">

        <table class="table table-hover table-striped table-reponsive" id="myTable">
            <thead>
                <tr>
                    <th>No#</th>
                    <th>Post Title</th>
                    <th>Created At</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($notifications as $notification)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$notification->data['title']}}</td>
                    <td>{{$notification->created_at->diffForHumans()}}</td>
                    <td><a href="#">Here</a></td>
                </tr>
    @endforeach

            </tbody>
        </table>
                    
        </div>
    </div>
    @else
        <h3 class="fw-bold text-danger">No New Notification</h3>
    @endif
    </div>
        {{-- {{$notification->data['title']}} --}}