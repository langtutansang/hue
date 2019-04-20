<div class="row">
    <div class="col-md-12">
        <h5 class="text-right"><a href="#" class="btn btn-link">{{ date('d-m-Y',strtotime($row->created_at))  }}</a> bởi <a  href="#" class="btn btn-link">{{ $row->users->name }}</a></h5>
    </div>
    @if(Auth::check() && Auth::id() == $row->users_id)
    <div class="col-md-12">
        <h5 class="text-right"><button class="btn btn-danger" style="float-right">Xóa bài</button></h5>
        
    </div>
    @endif
    <div class="col-md-12 d-flex justify-content-center">
        <img src="/{{ $row->picture }}" alt="">
    </div>
    <div class="col-md-12 mt-20">
        <p>
        {!! $row->content !!}
        </p>
    </div>
    <div class="divider"></div>
    <div class="col-md-12 mt-5">
        <div class="box">
            <div class="box-header">
                <h3>Trả lời</h3>
            </div>
            <div class="box-body">
                @if(Auth::check())
                    <form action="/forum/{{ $row->id }}" method="post">
                        @csrf
                        <textarea required style="resize: none;" name="comment" class="form-control" cols="30" rows="10"></textarea>
                        <button class="btn btn-success col-md-12 mt-10">gửi</button>
                    </form>
                @else
                    <h3>Đăng nhập để bình luận</h3>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <div class="box">
            <div class="box-header">
                <h3>Bình luận</h3>
            </div>
            <div class="box-body">
                <div class="media-list media-list-hover media-list-divided">
                    @foreach($row->forumComment as $comment)
                        <div class="media">
                            @include('home.forum-detail.comment')
                        </div>
                    @endforeach
                </div>
               
            </div>
        </div>
    </div>
</div>