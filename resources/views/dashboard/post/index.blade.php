@extends('dashboard.master')

@section('content')
<a href="{{route('post.create')}}">Create</a>
    {{-- @include('dashboard.fragment._errors-form') --}}
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>posted</td>
            <td>Category</td>
            <td>Options</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->posted }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                    <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                    <a href="{{ route('post.show', $post->id) }}">Show</a>
                    {{-- <a href="{{route('post.destroy',$post->id)}}">Delete</a> --}}
                    <form action="{{route('post.destroy',$post)}}" method="post">
                        @method("DELETE")
                        @csrf
                        <button type="submit">DELETE</button>

                    </form>
                </td>
            </tr>
            
        @endforeach
    </tbody>
</table>

{{$posts->links()}}

@endsection