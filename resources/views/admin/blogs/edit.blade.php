<x-admin-layout>

    <h3 class="mt-3 text-center">Blog Create Form</h3>
        <x-card-warraper>
            <form action="/admin/blogs/{{$blog->slug}}/update" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <x-form.input name="title" value="{{$blog->title}}"/>
                <x-form.input name="slug" value="{{$blog->title}}"/>
                <x-form.input name="intro" value="{{$blog->title}}"/>
                <x-form.textarea name="body" value="{{$blog->title}}"/>
                <x-form.input name="thumbnail" type="file"/>
                <img src="/storage/{{$blog->thumbnail}}" width="200px" height="100px" alt="">
                <x-form.input-warapper>
                    <x-form.label-form name="category"></x-form>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option {{$category->id== old('category_id',$blog->category->id)?'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </x-form.input-warapper>
                <x-error name="category_id"/>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </x-card-warraper>

</x-admin-layout>
