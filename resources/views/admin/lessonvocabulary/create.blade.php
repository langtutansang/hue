<div id="create-form" >
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Tên bài học</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 chosen-select-single-lesson">
                <select name="lesson" class="chosen-select-lesson col-md-12">
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <div class="row select2-class">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Từ vựng</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 chosen-select-single-vocabulary">
                <select name="vocabulary" class="chosen-select-vocabulary col-md-12">
                    @foreach($vocabularies as $vocabulary)
                        <option value="{{ $vocabulary->id }}">{{ $vocabulary->title }}</option>
                    @endforeach
                </select>
        </div>
    </div>
</div>