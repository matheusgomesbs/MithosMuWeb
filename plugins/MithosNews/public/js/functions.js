$(function () {
    
    $(document).on("click", ".add-news-type", function (e) {
        var $this = $(this);
        var $container = $this.closest("form").find(".container-add-news-type");
        var index = ($container.find(":input").size() / 2) + 1;
        $container.append('<div style="margin-top:5px;"></div><input type="text" placeholder="Nome" name="news_types[' + index + '][name]" style="width:63%" /><input type="text" placeholder="Cor" name="news_types[' + index + '][color]" style="width:35%;float:right" />');
        e.preventDefault();
    });
    
});