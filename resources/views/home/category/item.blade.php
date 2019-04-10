<a href="/classes/{{ $classitem->id }}">
    <div class="box bg-info">
        <div class="box-body">
            <div class="flexbox">
            <h5>{{ $classitem->name }}</h5>
            </div>
            <div class="text-center my-2">
            <div class="font-size-60 text-white">{{count($course->classes)}}</div>
            </div>
        </div>

        <div class="card-body bg-gray-light py-12">
            <span class="text-muted mr-1">Giáo viên:</span>
            <span class="text-dark">{{ $classitem->teacher }}</span>
        </div>

        <div class="progress progress-xxs mt-0 mb-0">
            <div class="progress-bar bg-info" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</a>
