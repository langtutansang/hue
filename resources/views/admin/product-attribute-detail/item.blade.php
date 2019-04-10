<div class="circle" attr-detail-id="{{  $row->attributeDetail->id }}">
    <h5>
        <small>{{$row->attributeDetail->attribute->title }}</small>
        <br>
        @if($row->attributeDetail->attribute->type === 1)
            <div class="display-color" style="background: {{ $row->attributeDetail->title }}">{{ $row->attributeDetail->title }}
            </div>
        @else
            {{ $row->attributeDetail->title }}
        @endif
    </h5>

    <div class="collapse delete-row" delele_id="{{ $row->id}}">
        <i class="fa fa-trash"></i>
    </div>
</div>