function openFancybox() {
    setTimeout(function () {
        $('.fancybox').trigger('click');
    }, 500);
};
$(document).ready(function () {
    var visited = $.cookie('visited');
    if (visited == 'yes') {
        return false; // second page load, cookie active
    } else {
        openFancybox(); // first page load, launch fancybox
    }
    $.cookie('visited', 'yes', {
        expires: 7 // the number of days cookie  will be effective
    });
    $(".fancybox").click(function () {
        $.fancybox({
            href: this.href,
            'width': 400,
            'height': 300,
            type: "inline"
        });
        return false;
    });
});
