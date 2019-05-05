<!-- data table JS
    ============================================ -->
<script src="{{ asset('admin-asset/js/data-table/bootstrap-table.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/tableExport.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/data-table-active.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/bootstrap-table-editable.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/bootstrap-editable.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/bootstrap-table-resizable.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/colResizable-1.5.source.js') }}"></script>
<script src="{{ asset('admin-asset/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('admin-asset/js/data-table/bootstrap-table-export.js') }}"></script>
<script src="{{ asset('admin-asset/js/ckeditor/ckeditor.js') }}"></script>
<script>
    var search = () => {
        $.ajax({
            url: `/admin/transText/${$($('[name="title"]')).val()}`,
            type: 'GET',
            success: (res) => {
                if( res.enViData){
                    let dom = $(`<div>${res.enViData.best.details}</div>` );
                    $.ajax({
                        url: `/admin/getAudio/${$($('[name="title"]')).val()}`,
                        type: 'GET',
                        success: (res) => {
                            dom.find('#sound').append(`
                            <div class="ckeditor-html5-audio" style="text-align:center">
                                <audio controls="controls" controlslist="nodownload" src="${res.data}">&nbsp;</audio>
                            </div>`
                            );
                            dom.find('.fl a').remove();
                            CKEDITOR.instances['description' ].setData(dom.html());
                        }
                    })
                }
            }
        })
    }
    function createRow(){
        getFormCreate(
                "vocabulary",
                ()=>{
                    return ({ 
                        title: $('#create-form input[name="title"]').val(),
                        description: CKEDITOR.instances['description'].getData(),
                    })
                },
                ()=>{
                    CKEDITOR.replace( 'description' );
                    $('#search').on('click', search )
                },
                {
                    width: 950,                    
                }
            );
    }

    function editRow(id){
        getFormEdit(
                "vocabulary", 
                id,
                ()=>{
                    return ({ 
                        title: $('#edit-form input[name="title"]').val(),
                        description: CKEDITOR.instances['description'].getData(),
                    })
                },
                ()=>{
                    CKEDITOR.replace( 'description' );
                    $('#search').on('click', search )
                },
                {
                    width: 950,                    
                }
            );
    }

    function deleteRow(id){
        deletePopup("vocabulary", id);
    }

</script>