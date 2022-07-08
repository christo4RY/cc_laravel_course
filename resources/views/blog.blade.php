<x-layout>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div class="my-2">
            <div>Author - <a href="/?users={{$blog->author->username}}">{{$blog->author->name}}</a></div>
            <div><a href="/?category={{$blog->category->slug}}">
                <span class="badge bg-primary">{{$blog->category->name}}</span></a></div>
            <div>Published at - {{$blog->created_at->diffForHumans()}}</div>
          </div>
          <p class="lh-md">
            {{$blog->body}}
          </p>
        </div>
      </div>
    </div>
    <x-subscribe-section/>
    <x-blogs-you-may-like :blog="$blog" :randomBlogs="$randomBlogs"/>
</x-layout>
