<div class="vtabs customvtab" style="width: 100%">
    <ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 20%;">
        @foreach($lessons as $lesson )
            <li class="nav-item"> <a class="nav-link {{ $loop->first ? 'active': '' }}" data-toggle="tab" href="#lesson{{ $lesson->id}}" role="tab" aria-expanded="true">
                <span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">{{ $lesson->title }}</span> </a> 
            </li>
        @endforeach
        @isset($classes->test)
        <li class="nav-item"> <a class="nav-link" href="/test/{{$classes->test->id}}" >
                <span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">Kiểm tra</span> </a> 
        </li>
        @endisset
    </ul>
    <!-- Tab panes -->
    <div class="tab-content" style="width: 100% !important">
        @if(count($lessons) == 0)
        <h1 style="color: red">Lớp hiện đang cập nhật bài học</h1>
        @endif
        @foreach($lessons as $lesson )
            <div class="tab-pane {{ $loop->first ? 'active': '' }}" id="lesson{{  $lesson->id }}" role="tabpanel" aria-expanded="true">
                <div class="pad">
                    @if(!$enabledTest)
                        <h1 style="color: red">Bạn cần thi các lớp trước đó</h1>
                    @else
                        <h1 style="color: red; text-align:center">{{  $lesson->title }}</h1>  
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#video{{  $lesson->id }}" role="tab"><span class="hidden-sm-up"><i class="ion-email"></i></span> <span class="hidden-xs-down">Video</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#vocabulary{{  $lesson->id }}" role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">Vocabulary</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#grammar{{  $lesson->id }}" role="tab"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Gramma</span></a> </li>
                        </ul>
                        @include("home.classes.item")
                    @endif
                </div>

            </div>
        @endforeach

    </div>
</div>
