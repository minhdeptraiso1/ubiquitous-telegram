function actiondelete(event){
    event.preventDefault();
    let urlRequest = $(this).data('url'); // Lấy url từ data-url
    let that = $(this);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.value) {
            $.ajax({ // Thay thế $ajax thành $.ajax
                type:'GET',
                url: urlRequest,
                success: function(data){
                    if(data.code == 200){
                        that.closest('tr').remove();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                     })
                    }
                },
                error: function(){
                    // Xử lý lỗi nếu cần
                }
            });
        }
      });
}

$(function(){
    $(document).on('click', '.action_delete', actiondelete);
});
