@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @include('layouts.error')
            <a href="{{ route('create') }}" class="btn btn-success">New Message</a>
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
                        <table class="table">
                            <thead>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Date and Time</th>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                ?>
                                @if (count($messages) != 0)
                                    @foreach ($messages  as $message)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $message -> title }}</td>
                                            <td>{{ $message -> message }}</td>
                                            <td>{{ $message -> created_at }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td rowspan="3" align="center">No Message Sent</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection