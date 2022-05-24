@extends('super-admin.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="form-group">
                    <label for="report">Download Report You want!</label>
                    <div name="report">
                        <a href="{{action('AdminController@memberReport')}}" class="btn text-decoration-none btn-primary ">Member Report</a>
                        <a href="{{action('AdminController@financeReport')}}" class="btn text-decoration-none btn-success">Financial Report</a>
                        <a href="{{action('AdminController@managersReport')}}" class="btn text-decoration-none btn-info">Managers Report</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection