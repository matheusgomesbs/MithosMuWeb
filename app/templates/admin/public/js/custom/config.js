$(function () {
    $(document).on("click", ".add-secret-question", function (e) {
        var $this = $(this);
        var $container = $this.closest("form").find(".container-add-secret-question");
        var index = $container.find(":input").size() + 1;
        $container.append('<input type="text" style="margin-top:3px;" name="secret_questions[]" />');
        e.preventDefault();
    });

    $(document).on("click", ".add-vip-type", function (e) {
        var $this = $(this);
        var $container = $this.closest("form").find(".container-add-vip-type");
        var index = $container.find(":input").size() + 1;
        $container.append('<div style="margin-top:5px;"></div><input type="text" value="" name="types[' + index + '][code]" placeholder="Código" style="width:35%" /><input type="text" value="" name="types[' + index + '][name]" placeholder="Nome do VIP" style="width:63%;float:right" />');
        e.preventDefault();
    });
});