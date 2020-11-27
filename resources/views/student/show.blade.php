@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Estudiante | {{ $student->person->surname }} {{ $student->person->name }}</b>
        </div>
        <students
            @can('events.sendmail') :can-send="true" @endcan
            :events="{{ $events }}" ></students>
    </div>
@endsection
