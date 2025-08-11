@csrf
        <label for="">Title</label>
        <input type="text" name="title" value="{{old('title', $post->title)}}">

        <label for="">Slug</label>
        <input type="text" name="slug" value="{{old('slug',$post->slug)}}">

        <label for="">Content</label>
        <textarea name="content">{{old('content',$post->content)}}</textarea>

        <label for="">Category</label>
        <select name="category_id">
            @foreach ($categories as $title => $id)
                
                <option value="{{$id}}" {{ old('category_id',$post->category_id) == $id ? 'selected' : '' }}>{{ $title }}</option>
            @endforeach
        </select>

        <label for="">Description</label>
        <textarea name="description">{{old('description',$post->description)}}</textarea>

        <label for="">Posted</label>
        <select name="posted">
            <option {{old('post',$post->posted) == 'not' ? 'selected' : ''}} value="not">Not</option>
            <option {{old('post',$post->posted) == 'yes' ? 'selected' : ''}} value="yes">Yes</option>
        </select>
        @if (isset($task)&&$task == 'edit')
            <label for="">Image</label>
            <input type="file" name="image">
            
        @endif
        
        <button type="submit">Button</button>