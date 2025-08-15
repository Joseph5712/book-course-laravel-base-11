@extends('dashboard.master')

@section('content')
<a class ="btn btn-primary my-3" href="{{route('category.create')}}">Create</a>
    {{-- @include('dashboard.fragment._errors-form') --}}
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <a class ="btn btn-success mt-2" href="{{ route('category.edit', $category->id) }}">Edit</a>
                    <a class ="btn btn-success mt-2" href="{{ route('category.show', $category->id) }}">Show</a>
                    {{-- <a href="{{route('category.destroy',$category->id)}}">Delete</a> --}}
                    <form action="{{route('category.destroy',$category)}}" method="post">
                        @method("DELETE")
                        @csrf
                        <button class ="btn btn-danger mt-2"type="submit">DELETE</button>

                    </form>
                </td>
            </tr>
            
        @endforeach
    </tbody>
</table>
<div class="mt-2">
</div>

{{$categories->links()}}

@endsection