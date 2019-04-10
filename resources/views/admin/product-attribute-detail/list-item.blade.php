<div class="list-circle" product-id="{{ $rows->id }}">
    @foreach( $rows->productAttributeDetail as $row)
        @include('admin.product-attribute-detail.item')
    @endforeach
    <div style="position: relative">
        <div class="circle" data-toggle="dropdown">
            <h1>
            +
            </h1>   
        </div>
        <ul class="dropdown-menu add-row-dropdown" id="dropdown{{ $rows->id }}" role="menu">
            @foreach($rows->brand->category->categoryAttribute as $ca)
                <li>
                    <h5>{{ $ca->attribute->title }}</h5>
                    @foreach($ca->attribute->attributeDetail as $ad)
                        <div  class="add-row" attr-detail-id="{{ $ad->id }}" style="background: {{ $ca->attribute->type ==  1 ? $ad->title: ''}}" >
                            <a class=" float-button-light waves-effect waves-button waves-float waves-light">{{  $ca->attribute->type ==  0 ?$ad->title: '' }}</a>
                        </div>
                    @endforeach
                </li>
            @endforeach
    
        </ul>
    </div>
</div>