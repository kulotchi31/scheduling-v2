@extends('layouts.inspinia') @section('content')

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
           
               <img  style="margin-left: -10px;width: 50% ; height: 50%;" src="/img/talavera-logo.jpg" >
        </div>

        <form
            class="m-t"
            role="form"
            method="POST"
            action="{{ route('register') }}"
        >
            @csrf

            <div class="form-group">
                <input
                    placeholder="Fullname"
                    id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    autofocus
                />

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input
                    placeholder="Email"
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                />

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input
                    placeholder="Password"
                    id="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required
                    autocomplete="new-password"
                />

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input
                    placeholder="Confirm Password"
                    id="password-confirm"
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="form-group">
                <select name="type" id="type" class="form-control">
                    <option value="admin">Administrator</option>
                    <option value="user">User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success block full-width m-b">
                Register
            </button>

            <p class="text-muted text-center">
                <small>Already have an account?</small>
            </p>
            <a
                class="btn btn-sm btn-primary btn-block"
                href="{{ route('login') }}"
                >Login</a
            >
        </form>

        <p class="m-t"><small>Scheduling Sytem&copy; 2022</small></p>
    </div>
</div>

@endsection
