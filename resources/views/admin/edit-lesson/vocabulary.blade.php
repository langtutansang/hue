<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Tìm từ vựng<button type="button" class="btn btn-primary" style="float:right" id="vocabulary-add">Thêm mới</button></h3>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row select2-class">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class=" col-md-4 col-sm-4 col-xs-12">
                    <div class="input-mask-title">
                        <label>Chọn từ vựng</label>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 chosen-select-single">
                    <select name="vocabulary" class="multi-select col-md-12" multiple='multiple' id="vocabulary-select">
                        @foreach($vocabularies as $vocabulary)
                            <option value="{{ $vocabulary->id }}"  {{ in_array($vocabulary->id , $vocabularyIds) != false  ? 'selected' : ''  }} >{{ $vocabulary->title }}</option>
                        @endforeach
                    </select>
                </div>
              
            </div>
        </div>

    </div>
</div>