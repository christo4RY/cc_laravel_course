<x-card-warraper>
    <div class="d-flex">
        <div>
            <img src="{{$comment->author->avator}}" width="50" height="50" class="rounded-circle" alt="">
        </div>
        <div class="ms-3">
            <h6>{{$comment->author->name}}</h6>
            <p class="text-secondary">{{$comment->created_at->format('Y-m-d h:i:s')}}</p>
        </div>
    </div>
    <p class="mt2">
        {{ $comment->body }}
    </p>
</x-card-warraper>
