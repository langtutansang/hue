@if(Auth::check())
<div class="row">
    <div class="col-md-12">
        <div style="text-align: center;">
            <h3>{{$test->name }}</h3>
            <h5>{!! $test->description!!}</h5>
            <h5>Thời gian: {{$test->timetest }} phút</h5>
        </div>  
        <div style="text-align:center">
            <button class="btn btn-danger" id="btnStart" onClick="initializeClock('clockdiv');">Bắt đầu</button>
            <input id="timestart" type="hidden" value="{{$test->timetest}}"/>
        </div> 
    </div>   
    
    <form class="col-md-12" id="testQuestion" method="post" style="display:none" action="/resulttest/{{$test->id}}">
        {{ csrf_field() }}
        <div class="box-body">
            @foreach($test->testQuestion as $index => $tq )      
                @include("home.test.item")
            @endforeach
        </div>
        <div class="box-footer">
            <button type="submit"  class="btn btn-success pull-right">Kết quả</button>
        </div>
    </form>
</div>
<div id="timetest">
    <div id="clockdiv">
        <div>
            <span class="hours"></span>
            <div class="smalltext">Hours</div>
        </div>
        <div>
            <span class="minutes"></span>
            <div class="smalltext">Minutes</div>
        </div>
        <div>
            <span class="seconds"></span>
            <div class="smalltext">Seconds</div>
        </div>
    </div>

</div>
@else
<h3>Bạn phải đăng nhập mới có thể thi được</h3>
@endif