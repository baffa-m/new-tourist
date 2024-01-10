@extends('admin.layout.app')


@section('content')

<div class="container px-6 py-8 mx-auto">
    <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>

    <form class="w-full" action="{{ route('destination.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.destinations.form')
        <button class="flex-shrink-0 bg-indigo-500 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-sm border-4 text-white py-1 px-2 rounded">
            Submit
        </button>
    </form>


</div>


@endsection
