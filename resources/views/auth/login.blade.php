@extends('layouts.auth.login')

@section('content')
<section>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-start">
                            <h4 class="font-weight-bolder">Log in</h4>
                            <p class="mb-0">Masukan Username & Password</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                    <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                        style="background-image: url('/assets/img/food.jpg'); 
            background-size: cover; background-position: center;">
                        <h4 class="mt-5 text-white fw-bold" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.9), 0 0 4px rgba(0,0,0,0.7);">Good Food is Good Mood</h4>
                        <p class="fw-light text-white" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.9), 0 0 4px rgba(0,0,0,0.7); letter-spacing: 1px; line-height: 2;">Discover daily meal recommendations tailored to your taste, health, and performance..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection