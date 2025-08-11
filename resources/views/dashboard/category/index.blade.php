@extends('dashboard.master')

@section('content')
<a href="{{route('category.create')}}">Create</a>
    {{-- @include('dashboard.fragment._errors-form') --}}
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}">Edit</a>
                    <a href="{{ route('category.show', $category->id) }}">Show</a>
                    {{-- <a href="{{route('category.destroy',$category->id)}}">Delete</a> --}}
                    <form action="{{route('category.destroy',$category)}}" method="post">
                        @method("DELETE")
                        @csrf
                        <button type="submit">DELETE</button>

                    </form>
                </td>
            </tr>
            
        @endforeach
    </tbody>
</table>

{{$categories->links()}}

@endsection