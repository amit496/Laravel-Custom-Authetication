@extends('Customer.Layout.app')
@section('content')
<div class="container mt-5" style="width: 500px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header register-card-header">
                    <div class="row">
                        <h4 class="text-center text-light">Registration</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('customer.register.Submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        @error('confirmpassword')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <label for="name" class="form-label">Enter Name</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" id="name" name="name" required autocomplete="off" value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <label for="email" class="form-label">Enter Email</label>
                                <input type="email" class="form-control @error('password') is-invalid @enderror" id="email" name="email" required autocomplete="off" value="{{old('email')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <label for="password" class="form-label"> Create Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="off" value="{{old('password')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <label for="confirmpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control   @error('confirmpassword') is-invalid @enderror" id="confirmpassword" name="confirmpassword" required autocomplete="off" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <button type="submit" class="btn submitButtton text-light w-100">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
