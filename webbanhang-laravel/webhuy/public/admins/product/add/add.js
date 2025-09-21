$(function(){
    $(".tags_select_choose").select2({
tags: true,
tokenSeparators: [',', ' ']
})
    $(".select_mtk").select2({
    placeholder: "Chọn danh mục",
     allowClear: true
            
})
})