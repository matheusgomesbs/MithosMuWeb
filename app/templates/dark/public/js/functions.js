$(function() {
    $('#slideshow').jqFancyTransitions({
        height: 200,
        width: 770,
        position: 'top',
        direction: 'left',
        strips: 20
    });

    $('.tab_content').hide();
    $('ul.tabs li:first').addClass('active').show();
    $('.tab_content:first').show();
    $('ul.tabs li').click(function() {
        $('ul.tabs li').removeClass('active');
        $(this).addClass('active');
        $('.tab_content').hide();
        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
    });
    
    
//    $('#menu li a').live('click', function () {
//        var _this = $(this);
//        $('#menu li a').removeClass('current');
//        $.get($(this).attr('href'), function (content) {
//            $('#right').html(content);
//            _this.addClass('current');
//        });
//        return false;
//    });
});