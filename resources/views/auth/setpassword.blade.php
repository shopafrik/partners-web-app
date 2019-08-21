@extends('layouts.pageslayout')

@section('allcontent')
@if(is_null($theid))
    <script>window.location.href = "{{url('/')}}";</script>
@endif
<div class="container" style="margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-md-8 login">
            <div class="card">
                <div class="card-header"><h4>{{ __('Setup Password') }}</h4></div>
                <div class="card-body">
                    <form method="POST" action="{{   action( 'Auth\LoginController@storeNewPassword', $theid )    }}" >
                        @csrf
                        <div class="form-group row">
                                <label for="old" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
                                <div class="col-md-6">
                                    <input id="old" type="password" class="form-control" name="old">
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Incorrect Password</strong>
                                    </span>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Passwords do not match</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn form-btn">
                                    {{ __('Login') }}
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
