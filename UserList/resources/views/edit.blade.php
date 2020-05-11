@extends('layouts.app')
@section('content')
<form action="{{route('save', ['id'=>$users->id])}}">
<table class="table table-bordered">
    <tr>
    <td>Name
    </td>
    <th>
    <input type='text' name='name' value='{{$users->name}}' />
    </th>
    </tr>
    <tr>
    <td>Email
    </td>
    <th>
    <input type='text' name='email' value='{{$users->email}}' />
    </th>
    </tr>
    <tr>
    <td>Is Admin
    </td>
    <th>
    <input type='text' name='admin' value='{{$users->is_admin}}' />
    </th>
    </tr>
    <tr>
    <td>
    </td>
    <th>
    <input type='submit' value='Save' />
    </th>
    </tr>
</table>
</form>

@endsection
