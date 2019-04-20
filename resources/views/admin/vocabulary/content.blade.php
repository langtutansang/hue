<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Danh sách từ vựng</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <button type="button" class="btn btn-primary modalAdd"  onClick="createRow()">Thêm mới</button>

                            </div>
                            <table width="100%" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id" style="width: 46px !important">STT</th>
                                        <th data-field="title" style="width: 200px !important;">Từ</th>
                                        <th data-field="description" style="width: 600px !important;" >Nghĩa của từ</th>
                                        <th data-field="action" style="width: 200px !important;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($model as $key=>$row)
                                    @include('admin.vocabulary.item')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>