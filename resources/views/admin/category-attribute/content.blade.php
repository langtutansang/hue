<div class="panel-group wrap" id="accordion2" role="tablist" aria-multiselectable="true">
    @foreach($model as $rows)
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion{{ $rows->id }}"
                    href="#collapse{{ $rows->id }}" aria-expanded="true" aria-controls="collapse1">
                    {{ $rows->title}}
                </a>
            </h4>
        </div>
        <div id="collapse{{ $rows->id }}" class="panel-collapse collapse in" role="tabpanel" >
            <div class="panel-body">
                @include('admin.category-attribute.list-item')
            </div>
        </div>
       
    @endforeach
</div>
