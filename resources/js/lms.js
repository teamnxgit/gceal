window.addEventListener('load', function () {
    $('.collapse').on('show.bs.collapse', function () {
        $('.collapse.in').collapse('hide');
    });
});

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    
});

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);

window.setEditor = function (editorSelector){
    tinymce.init({selector: editorSelector});
}