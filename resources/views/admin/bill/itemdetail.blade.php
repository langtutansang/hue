<script type="text/template" attr-id="{{$row->id }}" class="template">
    <div class="invoice-section">

        <div class="col-md-12 text-right">
            <div class="pull-right">
                <h5 class="invoice-bill-title">#{{ $row->id }} - {{ $row->created_at }}</h5>
                <h5 class="invoice-bill-title">Invoice Details:{{ $row->billCustomer->name }}</h5>
                <address>
                    {{ $row->billCustomer->address }}
                    <br> <strong>Phone:</strong> {{ $row->billCustomer->phone }}
                    <br> <strong>Email</strong> {{ $row->billCustomer->email }}
                </address>
                <span></span>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lương</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($row->billDetail as $bd)
                            <tr>
                                <td>{{ $bd->id }}</td>
                                <td>{{ $bd->product->title }}</td>
                                <td>{{ $bd->unit }}</td>
                                <td>{{ $bd->amount }}</td>
                                <td>{{ $bd->unit * $bd->amount}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td class="text-right" colspan="4">Tổng cộng</td>
                        <td colspan="2"><b>{{ $row->getTotalPrice() }}</b></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="pull-right">
                <button type="button"
                        class="btn btn-success btn-outline social-icon-name float-button-light">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>Xem GoShip
                </button>
                <button type="button"
                        class="btn btn-primary btn-outline social-icon-name float-button-light">
                    <i class="fa fa-print" aria-hidden="true"></i>In
                </button>
            </div>

        </div>

    </div>
</script>