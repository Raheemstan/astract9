@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @include('layouts.error')
            <br>&nbsp;
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <span>Please contact the admin for account activation !!!</span>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection