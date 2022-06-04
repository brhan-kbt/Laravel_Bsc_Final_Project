@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height: 380px; padding:10px; margin:25px;">
                <div class="card-header">Reset Password</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updatePassword')}}">
                        @csrf

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>

                            <div class="col-md-6">
                                <input id="username"  type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $username ?? old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-form-label text-md-end">New Password</label>

                            <div class="col-md-6">
                                <input id="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="new-newPassword">

                                @error('newPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="confirmPassword" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
