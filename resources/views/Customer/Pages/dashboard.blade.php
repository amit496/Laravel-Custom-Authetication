@extends('Customer.Layout.app')
@section('content')

{{Auth::guard('customer')->user()->email}}
<br>
<a href={{route('customer.logout')}}>LOGOUT</a>

@endsection
