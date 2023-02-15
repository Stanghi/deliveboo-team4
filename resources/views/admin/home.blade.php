@extends('layouts.app')

@section('title')
    | Admin Dashboard
@endsection

@section('content')
    <h2>Dashboard</h2>
    @foreach ($categories as $category)
        <img src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->name }}">
        <h2>{{ $category->name }}</h2>
    @endforeach
@endsection
