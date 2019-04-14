<div>
    <h1 style="color: blue; text-align: center">Kết quả bài test</h1>
    <div class="col-md-12">
        <h3>User: <b> {{ $result->users_id }}</b></h3>
        <h3>Số câu đúng: <b> {{ $result->result_true }}</b></h3>
        <h3>Điểm: <b>{{ $result->score }}</b></h3>
        <h3>Kết quả: <i style="color: red; text-align: center">{{ $result->score >= 5 ? "Đạt": "Không đạt" }}</i></h3>
    </div>
    <form class="col-md-12" id="testQuestion" method="post">
        {{ csrf_field() }}
        <div class="box-body">
            @foreach($result->test->testQuestion as $index => $tq )      
                <div class="form-group  question-item">
                    <label class="setColor">{{ $index  + 1}} ) {{ $tq ->title}}</label>
                    @foreach($tq->testQuestionDetail as $tqd)    
                        <div class="radio">
                            <input type="radio" {{ $tqd->head == $result->resultTestDetail->where('test_question_id', $tq ->id)->first()->answer ? 
                                'checked': ''}} name="test-question-{{$tq ->id }}" value="{{  $tqd->head }}" id="answered-{{ $tqd->id }}"/>
                            <label for="answered-{{ $tqd->id }}" class="{{
                                $tqd->head == $tq->answer ?( 
                                $tq->answer == $result->resultTestDetail->where('test_question_id', $tq ->id)->first()->answer ? 
                                'text-success': 'text-danger') : ''}}">
                                {{  $tqd->head }}. {{ $tqd->answered }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </form>
</div>