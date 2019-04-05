$('.img').click(function () {
    $id = $(this).attr('data-object-id');
    $url = $(this).attr('data-url');
    $model = $(this).attr('data-model');
    $date = {
        id:$id,
        model:$model
    };
    post($url,$date,tablePopup,failHandler);
});
