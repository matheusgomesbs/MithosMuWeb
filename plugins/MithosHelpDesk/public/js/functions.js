$(function () {
    $(document).on("click", ".add-department", function (e) {
        var $this = $(this);
        var $container = $this.closest("form").find(".container-add-department");
        var index = $container.find(":input").size() + 1;
        $container.append('<input type="text" style="margin-top:3px;" name="helpdesk_department[]" />');
        e.preventDefault();
    });
});