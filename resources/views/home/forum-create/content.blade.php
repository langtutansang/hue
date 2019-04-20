<form action="/forum-create" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="form-group">
                <label for="">
                    Tên bài viết
                </label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group">
                <label for="">
                   Hình ảnh
                </label>
                <input type="file" name="picture" class="dropify" data-height="300" required/>
            </div>
            <div class="form-group">
                <label for="">
                    Thuộc loại
                </label>
                <br>
                <select name="category_id" class="col-md-12 select2" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">
                    Nội dung
                </label>
                <br>

                <textarea name="content" id="content" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>

</form>

