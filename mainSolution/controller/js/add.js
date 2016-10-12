$(document).ready(function(){

    $(".sideClick").click(function() {
    $(document).find(".sideNavigation").toggleClass("sideOpen");
    $(document).find(".mainTile").toggleClass("sideClosed");
});

});
