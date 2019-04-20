@if(Auth::check())
    <div class="box">
            <a href="/forum-create" class="btn btn-primary">Thêm bài viết</a>
    </div>
@endif
<div class="box">
    <div class="box-header with-border">
        <h5 class="box-title">Danh sách 
          
        </h5>
    </div>
    <div class="box-body p-0">
        <div class="media-list media-list-hover media-list-divided">
            @foreach($categories as $category)
                <a class="media media-single" href="/forum?category={{$category->id}}">
                    <span class="title">{{ $category->title }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>