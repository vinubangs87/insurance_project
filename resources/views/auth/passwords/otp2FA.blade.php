@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Please enter OTP</div>

                <div class="card-body">

                    <form method="POST" action="">
                        @csrf

                        <div class="row mb-3">
                            <label for="otp" class="col-md-4 col-form-label text-md-end">Enter OTP</label>

                            <div class="col-md-6">
                                <input id="otp" type="otp" class="form-control" name="otp" value="{{ old('otp') }}" required autocomplete="otp" autofocus>

                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Verify
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
