(function ($) {
   $.mithos = {
       form: function (selector, options) {
           var defaults = {
               success: function () {},
               init: function () {},
               error: function () {}
           }

           options = $.extend(defaults, options);

           function clearErrorFields(form) {
               form.find("input.error, textarea.error, select.error").each(function () {
                   $(this).removeClass("error").parent().removeClass("error").find(".error-message").remove();
               });
           }

           $(document).on("submit", selector, function (e) {
               var _this = $(this);
               options.init(_this);
               $.post(_this.attr("action"), _this.serialize(), function (data) {
                   if (data.success) {
                       options.success(data, _this);
                       clearErrorFields(_this);
                   } else {
                       options.error(data, _this);
                       clearErrorFields(_this);
                       if (data.errors) {
                           $.each(data.errors, function (k, v) {
                               var field = _this.find('[name="' + k + '"]');
                               if (field.size() > 0) {
                                   field.parent().addClass("error");
                                   if (field.next().is("div.error-message")) {
                                       field.next("label").html(v);
                                   } else {
                                       field.after('<div class="error-message"><label for="' + field.attr('id') + '">' + v + '</label></div>');
                                   }
                                   field.addClass("error");
                                   _this.find(":input.error:first").focus();
                               }
                           });
                       }
                   }
               }, "json");
               e.preventDefault();
           });
       }
   }
})(jQuery);