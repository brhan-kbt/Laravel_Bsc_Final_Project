<main class="container">
    <div class="card">
        <div class=" row card-header">
            <div class="col-6">
                <p>Messaging Dashboard!</p>
            </div>
            <div class="col-6">
                 <a href="{{action('MessageController@create')}}" class="btn btn-primary float-right"> Send Message</a>
            </div>

        </div>
        <div class="row card-body">
            <table id="myTable" class="table table-responsive" >
                <h3>List of Messages</h3>
                <thead>
                    <tr>
                    <th class="col-1">No. #</th>
                    <th class="col-2">Sender Name</th>
                    <th class="col-3">Email</th>
                    <th class="col-2">Title</th>
                    <th class="col-3">Message</th>
                    <th class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$message->senderName}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->title}}</td>
                    <td>{{$message->message}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{action('MessageController@show',$message->id)}}" class="text-sm text-success mr-1">Detail</a>
 

                        </div>
                        
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>