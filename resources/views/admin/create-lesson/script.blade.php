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
<script src="{{ asset('admin-asset/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('admin-asset/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin-asset/js/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('admin-asset/js/multiselect/js/quick-select.js') }}"></script>

<script>
   
    $(function(){
        $('.select2').select2({})
        $('.multi-select').multiSelect({
            selectableHeader: "<input type='text' class='search-input form-control'>",
            selectionHeader: "<input type='text' class='search-input form-control'>",
            afterInit: function(ms){
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
              
                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
              
            },
            afterSelect: function(){
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function(){
                this.qs1.cache();
                this.qs2.cache();
            }
        });


        $('#vocabulary-add').on('click', function(){
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
                },
                (res) => {
                    $('#vocabulary-select').multiSelect('addOption', { value: res.data.id, text: res.data.title, index: 0 });
                }
            );    
        })


        $('#grammar-add').on('click', function(){
            getFormCreate(
                "grammar",

                ()=>{
                    return ({ 
                        title: $('#create-form input[name="title"]').val(),
                        description: CKEDITOR.instances['description'].getData(),
                    })
                },
                
                ()=>{
                    CKEDITOR.replace( 'description' );
                },

                {
                    width: 950,                    
                },
                (res) => {
                    $('#grammar-select').multiSelect('addOption', { value: res.data.id, text: res.data.title, index: 0 });
                }
            );    
        })
        $('input[name="url"]').on('change', function(){
            $('#video-preview').html($(this).val())
        })

        $('#create-lesson').on('click', function(){
            let data = {
                    title:$('[name="lesson-title"]').val(),
                    classes_id:$('[name="classes_id"]').val(),
                    url_description: $('[name="url-description"]').val(),
                    url: $('[name="url"]').val(),
                    grammar: $('#grammar-select').val(),
                    vocabulary: $('#vocabulary-select').val(),
            }

            let flag = true
            let key_check = ['title', 'classes_id']
            key_check.forEach(e => {
                if(!data[e]) {
                    flag = false;
                }
            })

            if(!flag) return createErrorPopup();
            $.ajax({
                type:'POST',
                url:`/admin/lesson`,
                data,
                success: (res) => {
                    if(res.status === 300 ){
                        createWarningGrammarPopup();
                    }else
                    if(res.status === 400 ){    
                        createWarningVocabularyPopup();
                    }
                    else
                    if(res.status === 200 ){    
                            createSuccessPopup();
                            window.location.href = "/admin/lesson";
                    }
                    else createErrorPopup()
                },
                error: ()=> {
                    createErrorPopup()
                }
            })
        })
    });
</script>