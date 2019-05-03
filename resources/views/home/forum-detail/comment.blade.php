<img class="avatar avatar-lg" src="{{ asset( $comment->users->picture) }}" alt="...">

<div class="media-body">
    <p><strong>{{ $comment->users->name }}</strong> <time class="float-right">{{ $comment->created_at }}</time></p>
    <p>{{ $comment->comment}}</p>
    
</div>
