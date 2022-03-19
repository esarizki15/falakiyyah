@extends('layouts.admin-lte.print')

@section('title')
    
@endsection
@section('style')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row DivIdToPrint">
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection