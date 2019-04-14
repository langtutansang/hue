<div class="box">
    <div class="box-header">
        <h1 class="box-title" style="color: blue">Lịch sử thi</h1>
    </div>
    <div class="box-body">
        <div class="timeline timeline-line-dotted">
            @foreach($resultTests as $resultTest)
            <span class="timeline-label">
                <span class="badge badge-primary badge-lg">{{ $resultTest->date }}</span>
            </span>
            <div class="timeline-item">
                <div class="timeline-point timeline-point-success">
                    <i class="fa fa-money"></i>
                </div>
                <div class="timeline-event">
                    <div class="timeline-heading">
                        <a href="/resulttest/{{$resultTest->id}}"><h2 style="color: blue" class="timeline-title">{{ $resultTest->test->title }}</h2></a>
                    </div>
                    <div class="timeline-body">
                        <h3>Số điểm: <b style="color: red">{{ $resultTest->score }}</b></h3>
                        <h3>Kết quả: <b style="color: red">{{ $resultTest->score >= 5? "Đạt": "Không đạt" }} </b></h3>
                    </div>
                    <div class="timeline-footer">
                        <p class="text-right">{{ $resultTest->date }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            
            <span class="timeline-label">
                <a href="#" class="btn btn-default" title="More...">
                    <i class="fa fa-fw fa-history"></i>
                </a>
            </span>
        </div>
    </div>                
</div>