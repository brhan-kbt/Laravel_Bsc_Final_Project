
<main class="container">

    <form action="{{action('MessageController@store')}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3>Create a new message</h3>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label  class="control-label">Subject</label>
                                <input type="text" class="form-control" name="title" placeholder="Subject"
                                    value="{{ old('subject') }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="select-label">Reciepent</label>
                            <select name='reciepent_id' class="form-select" id="select-label">
                                <option class="p-4" value="">Select Reciepent here</option>
                                <option class="p-4" value="0">For All</option>
                                @foreach($admins as $admin)
                                    <option class="p-4"  value="{{$admin->id}}">{{$admin->admin->adminName}}  (Admin)</option>
                                @endforeach
                                @foreach ($members as  $member)
                                        <option class="p-4"  value="{{$member->id}}">{{$member->member->fullName}}  (Member)</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                                <label class="control-label">Message</label>
                                <textarea id="mytextarea" name="message" class="form-control">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" class=" btn-lg btn-primary float-right">Send Message</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

</form>

</main>