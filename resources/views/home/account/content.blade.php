<div class="col-lg-12 col-12">
    <div class="nav-tabs-custom box-profile">
        <ul class="nav nav-tabs">
            <li><a class="active" href="#timeline" data-toggle="tab">Thông tin</a></li>
            <li><a href="#settings" data-toggle="tab">Mật khẩu</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="timeline">
                <div class="col-lg-12 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Thông tin</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="d-none old-picture">{{ $user->picture}}</span>
                                    <div class="form-group">
                                        <label>Ảnh</label>
                                        <div class="row">
                                            <div class="col-12 avata-content" style="border: 2px solid gray;padding:5px;height:320px">
                                                <img src="{{ $user->picture}}" height="300" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" class="d-none"/>
                                    <input type="hidden" name="picture" value="{{ $user->picture}}"/>
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $user->name}}" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $user->phone}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $user->email}}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>

                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-laptop"></i>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $user->address}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="tab-pane" id="settings">
                <div class="box p-15">
                    <form class="form-horizontal form-element col-12">
                        <div class="form-group row">
                            <label for="passwordold" class="col-sm-2 control-label">Password old</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="passwordold" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passwordnew" class="col-sm-2 control-label">Password new</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="passwordnew" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="repasswordnew" class="col-sm-2 control-label">RePassword</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="repasswordnew" placeholder="" required>
                            </div>
                        </div>
                        
                    </form>
                </div>			  
            </div>
        </div>
    </div>
</div>