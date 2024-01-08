@extends('admin.layout.app')


@section('content')

<div class="container px-6 py-8 mx-auto">
    <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>

    <form class="w-full max-w-sm" action="{{ route('state.update')}}" method="POST">
        @method('PUT')
        @include('admin.states.form')
    </form>


</div>


@endsection
