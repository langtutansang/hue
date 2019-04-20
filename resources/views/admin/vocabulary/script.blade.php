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
    
    $(function(){
        $('.modalAdd').on('click', function(){
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
                    var h={s:"https://dict.laban.vn",w:650,h:400,hl:1,th:1};
                    function loadScript(t,e){
                        var n=document.createElement("script");n.type="text/javascript",
                        n.readyState ? 
                            n.onreadystatechange=function(){
                                ("loaded"===n.readyState||"complete"===n.readyState)&&(n.onreadystatechange=null,e())
                            }
                        :
                            n.onload=function(){
                                e()
                            },
                            n.src=t,
                            q=document.getElementById("lbdict_plugin_frame"),
                            q.parentNode.insertBefore(n,q)
                    }
                    setTimeout( function(){
                        loadScript("https://stc-laban.zdn.vn/dictionary/js/plugin/lbdictplugin.frame.min.js",
                        function(){
                            lbDictPluginFrame.init(h)
                        }
                    )},1e3); 
                },
                {
                    width: 950,                    
                }
            );            
        });
        $('.edit-row').on('click', function(){
            let id = $(this).attr('edit-id');
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
                },
                {
                    width: 950,                    
                }
            );
        });
        $('.delete-row').on('click', function(){
            deletePopup("vocabulary", $(this).attr('delele_id'));
        });
    });
    </script>