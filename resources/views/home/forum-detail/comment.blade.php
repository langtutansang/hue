<img class="avatar avatar-lg" src="{{ $comment->users->picture }}" alt="...">

<div class="media-body">
    <p><strong>{{ $comment->users->name }}</strong> <time class="float-right">{{ $comment->created_at }}</time></p>
    <p>{{ $comment->comment}}</p>
    
</div>
