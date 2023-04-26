@extends('layouts.frontend')

@section('content')

<x-app-layout>
    <table class="container table table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $userdata)
                <tr>
                    <td> {{ $userdata->id }} </td>
                    <td> {{ $userdata->name }} </td>
                    <td> {{ $userdata->email }} </td>
                    <td> {{ $userdata->role }} </td>
                    <td><a class="bg-succes" href="{{ route('users.edit', $userdata->id) }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>

@endsection