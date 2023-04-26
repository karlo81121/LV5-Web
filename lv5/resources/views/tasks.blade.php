@extends('layouts.frontend')

@section('content')

<x-app-layout>

<div class="container border rounded mt-4 p-4 d-flex justify-content-between align-items-center">
    <p><b><u>ADD NEW TASK</u></b></p>
    <form action="{{ url('/addtask') }}" method="POST">
        @csrf
        <input type="text" name="naziv_rada" id="naziv_rada" placeholder="Naziv rada">
        <input type="text"name="naziv_rada_eng" id="naziv_rada_eng" placeholder="Engleski naziv rada">
        <input type="text" name="zadatak_rada" id="zadatak_rada" placeholder="Zadatak rada">
        <select name="tip_studija" id="tip_studija">
            <option value="Stručni">Stručni</option>
            <option value="Preddiplomski">Preddiplomski</option>
            <option value="Diplomski">Diplomski</option>
        </select>
        <button type="submit" class="btn btn-primary bg-primary">Add</button>
    </form>
</div>

<div class="container">

    <p class="mt-5"><b>MOJI DODANI RADOVI</b></p>

    @if($tasks->count() == 0)
    <p class="mt-3">Nema dodanih radova.</p>
    @else
    <table class="container table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Naziv rada</th>
                    <th scope="col">Engleski naziv rada</th>
                    <th scope="col">Zadatak rada</th>
                    <th scope="col">Tip studija</th>
                    <th scope="col">Prijave</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $taskdata)
                    <tr>
                        <td> {{ $taskdata->id }} </td>
                        <td> {{ $taskdata->naziv_rada }} </td>
                        <td> {{ $taskdata->naziv_rada_eng }} </td>
                        <td> {{ $taskdata->zadatak_rada }} </td>
                        <td> {{ $taskdata->tip_studija }} </td>
                        <td><a href="{{ route('student.applications', $taskdata->id) }}">Pogledaj prijave</a></td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    @endif
</div>

</x-app-layout>

@endsection