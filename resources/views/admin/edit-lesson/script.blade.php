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

        $('#edit-lesson').on('click', function(){
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

            if(!flag) return updateErrorPopup();
            $.ajax({
                type:'POST',
                url:`/admin/lesson/${$(this).attr('lesson-id')}`,
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
                        console.log('12')
                        updateSuccessPopup();
                        window.location.href = "/admin/lesson";
                    }
                    else updateErrorPopup()
                },
                error: ()=> {
                    updateErrorPopup()
                }
            })
        })
    });
</script>