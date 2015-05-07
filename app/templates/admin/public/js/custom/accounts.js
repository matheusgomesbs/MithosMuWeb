$(function () {
   
    $(document).on("submit", ".serch-account", function (e) {
        var $this = $(this);
        var $container = $this.closest(".window_frame");

        overlay.create($container);
        $.post($this.attr("action"), $this.serialize(), function (data) {
            $(".search-accounts-result").html(data);
            overlay.destroy($container);
        });
        
        e.preventDefault();
    });
   
    $(document).tooltip({
        items: ".item", 
        track: true, 
        content: function () {
            return $(this).prev().html();
        }
    });    
});