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

<script>
    $('#create-form').css("display", "none");
    const addListener = function(){
        $('.delete-row').off()
        $('.edit-row').off()
        $('.delete-row').on('click', deleteRow)
        $('.edit-row').on('click', editRow)
        $('.modalAdd').on('click', showAddPopup)
    }
    $(function(){
        addListener();
    });
    function showAddPopup(){
        $.ajax({
            type:'GET',
            url:`/admin/classes/create`,
            data: "",
            success:(res) => {
                if(res.data){
                    addPopup();
                }
            },
            error: ()=> {
            }
        })
    } 
    function addPopup(){
        swal({
            html: res.data,
            showCancelButton:true,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Thêm",
            cancelButtonText:"Hủy bỏ",
            onOpen:()=>{
                $('.chosen-select').select2(
                    {
                        dropdownParent: '.chosen-select-single',
                        containerCss: 'top: 20px;',
                    }
                )
            }
        })
        .then((data)=> {
            $.ajax({
                type:'POST',
                url:`/admin/classes`,
                data: {
                    title: $('#create-form .form-style[name="name"]').val()
                },
                success:(res) => {
                    if(res.status === 200 ){
                        $('tbody').prepend(res.data);
                        addListener();
                        createSuccessPopup();
                    }
                    else createErrorPopup()
                },
                error: ()=> {
                    createErrorPopup()
                }
            })
        })
        .catch(()=> {} )
    }
    function editRow() {
        let id = $(this).attr('edit-id');
        $.ajax({
            type:'GET',
            url:`/admin/category/${id}/edit`,
            success:(res) => {
                if(res.status === 200 ){
                    editPopup(res.data, id);
                }
                else updateErrorPopup()
            }
        })
    }
    function editPopup(data, id) {
        swal({
            html: data,
            showCancelButton:true,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Xác nhận",
            cancelButtonText:"Hủy bỏ",
            onOpen: ()=> {}                
        })
        .then((data)=> {
            $.ajax({
                type:'PATCH',
                url:`/admin/category/${id}`,
                data: {
                    title: $('#edit-form .form-style[name="title"]').val()
                },
                success:(res) => {
                    console.log(res);
                    if(res.status === 200 ){
                        $(`tr#row${id}`).replaceWith(res.data);
                        addListener();
                        updateSuccessPopup();
                    }
                    else updateErrorPopup()
                },
                error: ()=> {
                    updateErrorPopup()
                }
            })
        })
        .catch(()=> {} )
        
    }
    function deleteRow() {
        deletePopup()
            .then(()=>{
                $.ajax({
                    type:'DELETE',
                    url:`/admin/category/${$(this).attr('delele_id')}`,
                    success:(res) => {
                        if(!!+res){
                            $(this).parents('tr').remove()
                            deleteSuccessPopup();
                        }
                        else deleteErrorPopup()
                    }
                    })
                })
                .catch(err => {})
        }
    </script>