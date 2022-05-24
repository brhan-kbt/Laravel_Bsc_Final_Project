@extends('financeAdmin.dashboard')
@section('content')
   
<main class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Offering Data</h1>
                </div>
                <div class="card-body">
                        <form action="{{action('OfferingController@update', $offering->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="memberName" class="form-label">Member Name</label>
                                        <input type="text" name="memberName" class="form-control @error('memberName') is-invalid @enderror" value="{{ $offering->memberName}}"  autocomplete="memberName" autofocus  id="email" >
                                        
                                        @error('memberName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="col-md-4 offset-md-2">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ $offering->date}}"  autocomplete="date" autofocus id="date">
                                    
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $offering->phone }}"  autocomplete="phone" autofocus  id="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>                              

                                <div class="col-md-4 offset-md-2">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ $offering->amount }}"  autocomplete="amount" autofocus id="amount">
                                    
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="reason" class="form-label">Reason</label>
                                    <textarea id="mytextarea" type="text" cols="10" rows="6" name="reason" class="form-control @error('reason') is-invalid @enderror" value="{{ old('reason') }}"  autocomplete="reason" autofocus  id="email" >{{$offering->reason}}</textarea>
                
                                    @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>                                
                            </div>

                            <div>
                                <button type="submit" class="btn-lg  btn-primary float-right">Save Change</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>


@endsection


      