@extends('admin.layouts.main')
@section('content')

<div class="container my-5">
    <div class="mx-2">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Add USER</h2>
        <form action="{{ route('users.store') }}" method="POST" class="px-md-5">
            @csrf
            @if ($errors->any())  
    <div>  
        <ul>  
            @foreach ($errors->all() as $error)  
                <li>{{ $error }}</li>  
            @endforeach  
        </ul>  
    </div>  
@endif
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                <div class="col-md-5">
                    <input type="text" placeholder="First Name" class="form-control py-2" name="firstname" value="{{ old('firstname') }}"/>
                    @error('firstname')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <input type="text" placeholder="Last Name" class="form-control py-2" name="lastname" value="{{ old('lastname') }}"/>
                    @error('lastname')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
                <div class="col-md-10">
                    <input type="text" placeholder="e.g. Jhon33" class="form-control py-2" name="username" value="{{ old('username') }}"/>
                    @error('username')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
                <div class="col-md-10">
                    <input type="email" placeholder="e.g. Jhon@example.com" class="form-control py-2" name="email" value="{{ old('email') }}"/>
                    @error('email')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">  
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>  
                <div class="col-md-10">  
                    <input type="password" placeholder="Password" class="form-control py-2" name="password"/>  
                    @error('password')  
                        <div class="alert alert-warning">{{ $message }}</div>  
                    @enderror  
                </div>  
            </div>  
            <div class="form-group mb-3 row">  
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Confirm Password:</label>  
                <div class="col-md-10">  
                    <input type="password" placeholder="Confirm Password" class="form-control py-2" name="password_confirmation"/>  
                    @error('password_confirmation')  
                        <div class="alert alert-warning">{{ $message }}</div>  
                    @enderror  
                </div>  
            </div>

            <div class="text-md-end">
                <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                    Add User
                </button>
            </div>
        </form>
    </div>
</div>

@endsection