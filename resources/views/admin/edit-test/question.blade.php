<div id="create-question">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <div class="input-mask-title">
                <label>Mô tả</label>
            </div>
        </div>
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
            <div>
                <textarea name="title-question" id="title-question" rows="10" cols="80">
                </textarea>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <div class="input-mask-title">
                <label>Loại</label>
            </div>
        </div>
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
            <div class="row">
                <div class="mg-b-22 col-md-4">
                    <select class="form-control " name="type">
                        <option value="0">Trắc nghiệm</option>
                        <option value="1">Tự luận</option>
                    </select>
                </div>
                <div class="col-md-4 input-mark-inner mg-b-22">
                    <button type="button" class="btn btn-primary" id="add-answer">Thêm đáp án</button>
                </div>
            </div>

        </div>
    </div>
    <div class="row" id="type0" style="margin-top: 20px">
        <div id="answer0">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                <div class="input-mask-title">
                    <label>Đáp án</label>
                </div>
            </div>
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 list-answer">
                
                <div class="input-group" style="margin-bottom:10px">
                    <span class="input-group-addon head">A</span>
                    <span class="input-group-addon"><input type="radio" name="question" value="A" checked></span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon"><a href="#"><i class="fa fa-times edu-danger-error"></i></a> </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none" id="type1">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <div class="input-mask-title">
                <label>Đáp án</label>
            </div>
        </div>
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
            <div class="input-mark-inner mg-b-22">
               <input type="text" name="answer" class="form-control">
            </div>
        </div>
    </div>
</div>