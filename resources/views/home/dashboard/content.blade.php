<div class="row">
    <h3 class="col-md-12 text-center">Top những bạn điểm cao</h3>
</div>
<div class="row">
    @foreach($resultTest as $res)
    <div class="col-md-3 ">
        <h5 class="col-md-12 text-center">
            <div class="widget">
                <img src="{{ $res->users->picture }}"  >
            </div>
        <strong>{{  $res->users->name  }} (  {{ $res->score}} đ )</strong><br>
        <strong>Khóa {{  $res->test->classes->course->title }}</strong>
        </h5>
    </div>
    @endforeach
</div>