

const deletePopup = (router, id)=> swal({
    title:"Bạn có chắc muốn xóa không?",
    text:"Bạn sẽ không khôi phục lại được",
    type:"warning",
    showCancelButton:true,
    confirmButtonColor:"#3085d6",
    cancelButtonColor:"#d33",
    confirmButtonText:"Có!",
    cancelButtonText:"Hủy",
}).then(()=>{
    $.ajax({
        type:'DELETE',
        url:`/admin/${router}/${id}`,
        success:(res) => {
            if(!!+res){
                deleteSuccessPopup();
                window.location.href = "";
            }
            else deleteErrorPopup()
        }
        })
    })
    .catch(err => {})

const deleteSuccessPopup = () => toastr.success('Xóa dữ liệu thành công','Thành công')
const deleteErrorPopup = () => toastr.error('Xóa dữ liệu không thành công','lỗi')

const createSuccessPopup = () => toastr.success('Thêm dữ liệu thành công','Thành công')
const createErrorPopup = () => toastr.error('Thêm dữ liệu không thành công','lỗi')

const updateSuccessPopup = () => toastr.success('Sửa dữ liệu thành công','Thành công')
const updateErrorPopup = () => toastr.error('Sửa dữ liệu không thành công','lỗi')

const converSlug = (slug) => {
    slug = slug.toLowerCase()
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    return slug;
}

const getFormCreate = (route, data, onOpen = ()=>{}, options = {}) =>{
    $.ajax({
        type:'GET',
        url:`/admin/${route}/create`,
        success:(res) => {
            if(res.data){
                swal({
                    html: res.data,
                    showCancelButton:true,
                    confirmButtonColor:"#3085d6",
                    cancelButtonColor:"#d33",
                    confirmButtonText:"Thêm",
                    cancelButtonText:"Hủy bỏ",
                    onOpen,
                    ...options
                })
                .then(()=> {
                    $.ajax({
                        type:'POST',
                        url:`/admin/${route}`,
                        data: data(),
                        success:(res) => {
                            if(res.status === 200 ){                        
                                createSuccessPopup();
                                window.location.href = "";
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
        }
    })
}
const getFormEdit = (route, id, data,onOpen = ()=>{},options = {}) =>{
    $.ajax({
        type:'GET',
        url:`/admin/${route}/${id}/edit`,
        success:(res) => {
            if(res.status === 200 ){
                swal({
                    html: res.data,
                    showCancelButton:true,
                    confirmButtonColor:"#3085d6",
                    cancelButtonColor:"#d33",
                    confirmButtonText:"Xác nhận",
                    cancelButtonText:"Hủy bỏ",
                    onOpen,
                    ...options
                })
                .then(()=> {
                    $.ajax({
                        type:'PATCH',
                        url:`/admin/${route}/${id}`,
                        data: data(),
                        success:(res) => {
                            if(res.status === 200 ){
                                updateSuccessPopup();
                                window.location.href = "";
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
            else updateErrorPopup()
        }
    })
}
