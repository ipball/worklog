//ajax loading
//waiting start
$(document).ajaxStart(function () {
    $('.pageload').hide();
    $('#waiting').show();
});
$(document).ajaxComplete(function () {
    $('.pageload').show();
    $('#waiting').hide();
});