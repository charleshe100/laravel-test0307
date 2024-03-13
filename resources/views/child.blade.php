<!-- resources/views/child.blade.php -->
 
@extends('layouts.app')
 
@section('title', 'Child Title')
 
@section('sidebar')
    @parent
 
    <p>This is appended to the master sidebar.</p>
@endsection
 
@section('content')
    <p>This is my child body content.</p>
@endsection