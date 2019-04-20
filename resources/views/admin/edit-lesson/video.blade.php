<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="review-content-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="devit-card-custom">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="input-mask-title">
                            <label>Mô tả video</label>
                        </div>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 chosen-select-single">
                        <input type="text" class="form-control" name="url-description" value="{{ $row->lessonVideo->description }}">
                      </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="devit-card-custom">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="input-mask-title">
                            <label>URL Embed</label>
                        </div>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 chosen-select-single">
                        <input type="text" class="form-control" name="url" value="{{ $row->lessonVideo->video_url }}">
                      </div>
                      <div id="video-preview">
                        {!! $row->lessonVideo->video_url !!}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>