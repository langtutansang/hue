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

<script>
    $(function(){
        CKEDITOR.replace( 'description' );
        $('.select2').select2();
        $('.delete-question').off();
        $('.delete-question').on('click', function(){
            $(this).parents('.question-detail').remove();
            $('.question-detail label').each( ( key, e) =>{
                $(e).html(`Câu số ${ key +1 }`)
            })
        });
       

        $('#create-question').on('click', function(){
            swal({
                html: $('#create-question-template').html(),
                showCancelButton:true,
                confirmButtonColor:"#3085d6",
                cancelButtonColor:"#d33",
                confirmButtonText:"Xác nhận",
                cancelButtonText:"Hủy bỏ",
                width: 1000,
                onOpen:()=>{
                    CKEDITOR.replace( 'title-question' );
                    $('.list-answer a').on('click', function(){
                        if($('.list-answer').find('.input-group').length>1){
                            $(this).parents('.input-group').remove();
                            $('.input-group').each( (key, e) =>{
                                $('.input-group').eq(key).find('.head').html(String.fromCharCode('A'.charCodeAt() + key -1 ))
                            })
                        }
                    });

                    $('[name="type"]').on('change', function(){
                        if($(this).val() === 0){
                            $('#add-answer').toggleClass('d-none');
                            $('#type0').toggleClass('d-none');
                            $('#type1').toggleClass('d-none');
                            
                        }else {
                            $('#add-answer').toggleClass('d-none');
                            $('#type0').toggleClass('d-none');
                            $('#type1').toggleClass('d-none');
                        }
                    })

                    $('#add-answer').on('click', function(){
                        let length = $('.list-answer').find('.input-group').length;
                        if(length > 5 ) return;
                        let html = `<div class="input-group" style="margin-bottom:10px">
                            <span class="input-group-addon head">${String.fromCharCode('A'.charCodeAt() + length) }</span>
                            <span class="input-group-addon"><input type="radio" name="question"></span>
                            <input type="text" class="form-control input">
                            <span class="input-group-addon"><a href="#"><i class="fa fa-times edu-danger-error"></i></a></span>
                        </div>`;
                        $('.list-answer').append(html);
                        $('.list-answer a').on('click', function(){
                            if($('.list-answer').find('.input-group').length>1)
                            $(this).parents('.input-group').remove();
                            $('.input-group').each( (key, e) =>{
                                $('.input-group').eq(key).find('.head').html(String.fromCharCode('A'.charCodeAt() + key -1))
                            })
                        });
                    })
                }
            })
            .then(()=> {
                let title=  CKEDITOR.instances["title-question"].getData(),
                answer, question,
                type = +$('#create-question [name="type"]').val();
                if(type){
                    answer = $('#type1 input[name="answer"]').val();
                    $('.content-question').append(`
                        <div class="question-detail" style="padding: 10px 30px; position: relative">
                            <button class="btn btn-link text-danger delete-question"><i class="fa fa-trash"></i></button>
                            <input type="hidden" value="${answer}" />
                            <div class="tab-content-details" style="text-align:left">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Câu số ${ $('.question-detail').length + 1 }</label>: <span>${$(title).html()}</span>
                                    </div>
                                    <div class="col-md-12">
                                        <input value="${answer}" type="text" class="form-control" readonly>
                                    </div>
                                </div>

                            </div>

                        </div>
                    `);
                }
                else {
                    answer = $('#create-question #type0').find('[name="question"]:checked').parents('.input-group').find('.head').html();
                    question = $('#create-question .input-group input[type="text"]').map( (key, e)=>
                        `<div class="input-group ${answer === (String.fromCharCode('A'.charCodeAt() + key)) ? 'text-primary' : '' }">
                            <span class="input-group-addon head">${String.fromCharCode('A'.charCodeAt() + key )}</span>
                            <input value="${$(e).val()}" type="text" class="form-control" readonly>
                        </div>`
                    ).get();

                    $('.content-question').append(`
                        <div class="question-detail" style="padding: 10px 30px; position: relative">
                            <button class="btn btn-link text-danger delete-question"><i class="fa fa-trash"></i></button>
                            <div class="tab-content-details" style="text-align:left">
                                <input type="hidden" value="${answer}" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Câu số ${ $('.question-detail').length + 1 }</label>: <span>${$(title).html()}</span>
                                    </div>
                                    <div class="col-md-12">
                                        ${question.join(' ')}
                                    </div>
                                </div>

                            </div>

                        </div>
                    `);
                }

                $('.delete-question').off();
                $('.delete-question').on('click', function(){
                    $(this).parents('.question-detail').remove();
                    $('.question-detail label').each( ( key, e) =>{
                        $(e).html(`Câu số ${ key + 1 }`)
                    })
                });

            })
        })

        $('#edit-lesson').on('click', function(){

            let data = {
                title: $('#edit-form [name="test-title"]').val(),
                description: CKEDITOR.instances["description"].getData(),
                classes_id: $('#edit-form [name="classes_id"]').val(),
                timetest: $('#edit-form [name="timetest"]').val(),
                question: $('.content-question .question-detail').map( (key,e) =>({
                    title: $(e).find('span').html(),
                    answer: $(e).find('input[type="hidden"]').val(),
                    list: $(e).find('.input-group input').map( (key, e) => {
                        return {
                            answered: $(e).val(),
                            head: $(e).parent().find('span').html()
                        }
                    }).get()

                })
                ).get()
            }
            $.ajax({
                url: `/admin/test/${$('#edit-form').attr('row-id') }`,
                type: 'patch',
                data,
                success: (res)=>{
                    if(res.status === 200 ){    
                            createSuccessPopup();
                            window.location.href = "/admin/test";
                    }
                    else createErrorPopup()
                }
            })
        })


    });
</script>