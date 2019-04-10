<div class="form-group  question-item">
    <label class="setColor">{{ $index  + 1}} ) {{ $tq ->name}}</label>
    @foreach($tq->testQuestionDetail as $tqd)    
        <div class="radio">
            <input type="radio" name="test-question-{{$tq ->id }}" value="{{  $tqd->head }}" id="answered-{{ $tqd->id }}"/>
            <label for="answered-{{ $tqd->id }}">{{  $tqd->head }}. {{ $tqd->answered }}</label>
        </div>
        
    @endforeach
    <div class="error d-none">Dien du lieu</div>
</div>