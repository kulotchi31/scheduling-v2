@extends('layouts.inspinia')

@section('content')
  <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

               <img  style="margin-left: -10px;width: 50% ; height: 50%;" src="/img/talavera-logo.jpg" >

            </div>
         
            <form class="m-t" role="form" action="{{ route('login') }}" method="POST">
                  @csrf

                <div class="form-group">
                            <input placeholder="Email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                     <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <button type="submit" class="btn btn-success block full-width m-b">Login</button>

              
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-primary" href="{{route('register')}}">Create an account</a>
            </form>
            <p class="m-t"> <small>Scheduling Sytem&copy; 2022</small> </p>
        </div>
    </div>

@endsection
