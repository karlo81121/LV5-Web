@extends('layouts.frontend')

@section('content')

<div class="border p-3 w-25 container mt-5 rounded">
    <h3>Edit Role</h3>
    <form method="POST" action="{{  route('users.update') }}" >
        <input type="hidden" name="id" value="{{ $data->id }}">
        {{ csrf_field() }}
        <div class="from-group mt-3">
            <input type="text" id="role" name="role" class="form-control w-100" value="{{ $data->role }}" placeholder="Unesi novu rolu">
        </div>
        <div class="form-group mt-3">
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
    </form>
</div>

@endsection