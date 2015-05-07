$(function () {
    
    $(document).on("click", ".add-link", function (e) {
        var $this = $(this);
        var $container = $this.closest("form").find(".container-add-link");
        var index = ($container.find(":input").size() / 2) + 1;
        $container.append('<div style="margin-top:5px;"></div><input type="text" placeholder="Nome" name="links[' + index + '][name]" style="width:35%" /><input type="text" placeholder="Link" name="links[' + index + '][link]" style="width:63%;float:right" />');
        e.preventDefault();
    });
    
});