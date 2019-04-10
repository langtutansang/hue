<div class="circle" attr-id="{{  $row->attribute->id }}">
    <h5>
        {{ $row->attribute->title }}
    </h5>
    <div class="collapse delete-row" delele_id="{{ $row->id}}">
        <i class="fa fa-trash"></i>
    </div>
</div>