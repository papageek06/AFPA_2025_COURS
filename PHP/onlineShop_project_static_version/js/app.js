$(document).ready(function () {
    console.log('Hello World');

    $("select").change(function(){
        $(":submit").pop("disable",false);
    });
});