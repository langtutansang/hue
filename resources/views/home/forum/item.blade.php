<div class="col-md-6">
        <div class="box">
            <div class="box-body p-0">				  	
                <h4 class="media-heading mt-15 mb-0 px-30"><a href="#">{{ $row->title }}</a></h4>
                <div class="media">
                    <img class="align-self-start w-160" src="{{ asset($row->picture) }}" >
                    <div class="media-body">
                        <div class="forum-content">
                            {!! $row->content !!}
                        </div>
                    <a class="btn btn-sm btn-bold btn-primary mt-15" href="/forum/{{ $row->id}}">Đọc thêm</a>
                    </div>
                </div>
                <p class="mt-0 mb-25 px-30">
                    <i class="fa fa-user"></i> bởi <a href="javascript:void(0)">{{ $row->users->name }}</a> 
                    | <i class="fa fa-calendar"></i> {{ date('d-m-Y',strtotime($row->created_at))  }}
                    | <i class="fa fa-comment"></i> <a href="javascript:void(0)">3 Comments</a>
                    <br> <i class="fa fa-tag"></i> thuộc : <a href="/forum?category={{ $row->category_id }}" class="btn btn-secondary">{{ $row->category->title }}</a>
                </p>
            </div>
        </div>
    </div>