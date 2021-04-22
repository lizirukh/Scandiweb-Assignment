$( document ).ready(function() {
    console.log( "ready!" );
    $('#redirectAddBtn').click(function () {
        var url = "http://localhost/WEBSITES/SCANDIWEB/App/View/newproduct.php";
        $(location).attr('href',url);
    });

    $('#redirectSave').click(function () {
        var url = "http://localhost/WEBSITES/SCANDIWEB/App/View/newproduct.php";
        $(location).attr('href',url);
    });

    $('#redirectShowBtn').click(function () {
        var url = "http://localhost/WEBSITES/SCANDIWEB/App/View/showproduct.php";
        $(location).attr('href',url);
    });

    $('#cancel').click(function () {
        var url = "http://localhost/WEBSITES/SCANDIWEB/App/View/index.php";
        $(location).attr('href',url);
    });

});