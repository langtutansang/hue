<div class="row">
    <div class="col-md-9">
        <div class="row">

            @if(count($forums))
                @foreach($forums as $row)
                    @include('home.forum.item')
                @endforeach
            @else
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/home/background/new-post.jpg')}}" alt="">
                </div>
                <h1 class="text-center">Hãy thêm bài viết mới</h1>

            @endif
        </div> 

    </div> 
    <div class="col-md-3">
        @include('home.forum.sidebar')
    </div>
  
</div>