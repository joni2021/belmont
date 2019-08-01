$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
            $(this).popover('show');
        },
        function () {
            $(this).popover('hide');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content

    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Vista previa</strong>"+$(closebtn)[0].outerHTML,
        content: "No es una imágen",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        var parent = $(this).parents('.image-preview');
        $(parent).attr("data-content","").popover('hide');
        $(parent).find('.image-preview-filename').val("");
        $(parent).find('.image-preview-clear').hide();
        $(parent).find('.image-preview-input input:file').val("");
        $(parent).find(".image-preview-input-title").text("Buscar");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var self = this;
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            var parent = $(self).parents('.image-preview');

            $(parent).find(".image-preview-input-title").text("Cambiar");
            $(parent).find(".image-preview-clear").show();
            $(parent).find(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(parent).attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});