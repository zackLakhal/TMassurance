@extends('layouts.appback')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">


                <div class="card-body text-center">
                    <div class="mb-5 ">
                        <a href="index.html" class="d-block auth-logo">
                            <img src="{{asset('images/logo-dark.png')}}" alt="" height="20" class="auth-logo-dark mx-auto">
                            <img src="{{asset('images/logo-light.png')}}" alt="" height="20" class="auth-logo-light mx-auto">
                        </a>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <div class="maintenance-img">
                                <img src="{{asset('images/maintenance.svg')}}" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-5 text-success">Bienvenu à TM Assurance</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection