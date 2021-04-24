$(document).ready(function (){

    //Сортировка
    $('.product_sorting_btn').change(function (){
        let orderBy = $(this).val();

        //Добавить/изменить значение сортировки в URL
        console.log(orderBy)
        const url = new URL(window.location);  //
        url.searchParams.set('sort', orderBy);
        history.pushState(null, null, url);


        $.ajax({
            url: "/admin/blog/posts",
            type: "GET",
            data: {
                search_field: url.searchParams.get('search_field'),
                date_field: url.searchParams.get('date_field'),
                sort:url.searchParams.get('sort'),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {

                $('#productList').html(data)
            }

        })
    });
});
