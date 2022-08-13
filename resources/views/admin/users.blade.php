@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
            <br>&nbsp;
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

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
                                <th>Username</th>
                                <th>Registered</th>
                                <th>status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                ?>
                                @if (count($users) != 0)
                                    @foreach ($users  as $user)
                                    @if ($user->id === auth()->user()->id)
                                         @continue
                                    @endif
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $user -> username }}</td>
                                            <td>{{ $user -> name }}</td>
                                            <td>{{ $user -> created_at }}</td>
                                            <td>
                                                @if ($user -> status)
                                                <span class="text text-success">Active</span>
                                                @else
                                                <span class="text text-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user -> status)
                                                <a href="{{ route('update', ['id' => $user->id, 'action' => 3]) }}" class="btn btn-danger">Deactivate</a>
                                                @else
                                                <a href="{{ route('update', ['id' => $user->id, 'action' => 2]) }}" class="btn btn-success">Activate</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td rowspan="3" align="center">No user Sent</td>
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