var count_input = 1;
$("#add-input").click(function () {
    count_input++;

    $('<div id="addimage' + count_input + '" class="addimage"><input type="hidden" name="MAX_FILE_SIZE" value="2000000"/><br><input type="file" name="galleryimg[]" /><br><br><a class="delete-input btn btn_marginBottom10" rel="' + count_input + '" >Удалить</a><br></div>').fadeIn(300).appendTo('#objects');
});


$(document).on('click', '.delete-input', function () {
    var rel = $(this).attr("rel");
    $("#addimage" + rel).fadeOut(300, function () {
        $("#addimage" + rel).remove();
    });
});