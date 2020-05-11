@extends('layouts.app')

@section('content')
@if (Auth::user()->is_admin == 1 )
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <a href="{{route('newuser')}}"><button type="button">Add new User</button></a>
                <div class="card-body">
                <table class="table table-bordered">
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                Edit
                            </td>
                            <td>
                                Delete
                            </td>
                        </tr>
                    @foreach($users as $user)

                        <tr>
                            <th>
                            {{ $user->name }}
                            </td>
                            <th>
                            <a href="{{route('edit', ['id'=>$user->id])}}"><button type="button">Edit</button></a>
                            </th>
                            <th>
                            <a href="{{route('delete', ['id'=>$user->id])}}"><button type="button">Delete</button></a>
                            </th>
                        </tr>

                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
