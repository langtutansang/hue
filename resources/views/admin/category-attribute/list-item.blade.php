<div class="list-circle" category-id="{{ $rows->id }}">
    @foreach( $rows->categoryAttribute as $row)
        @include('admin.category-attribute.item')
    @endforeach
    <div style="position: relative">
        <div class="circle" data-toggle="dropdown">
            <h1>
            +
            </h1>   
        </div>
        <ul class="dropdown-menu add-row-dropdown" id="dropdown{{ $rows->id }}" role="menu">
            @foreach($attributes as $attribute)
                <li attr-id="{{ $attribute->id }}"><a class="add-row float-button-light waves-effect waves-button waves-float waves-light">{{ $attribute->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>