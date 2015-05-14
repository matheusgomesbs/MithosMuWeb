var overlay = {
    create: function (target, message) {
        $(target || ".ajax-container").append('<div class="overlay"><div class="progress progress-striped active"><div class="bar" style="width:100%">' + (message || 'Carregando...	') + '</div></div></div>');
    },

    destroy: function () {
        $(".overlay").remove();
    }
}

function infiniteScroll(el, is) {
	$(el).infinitescroll({
		debug: false,
	    nextSelector: ".nav-control a:first",
	    navSelector: ".nav-control",
		itemSelector: is,
		extraScrollPx: 50,
		loading: {
			finishedMsg: null,
			msgText: "Carregando ..."
		}
	});
}

$(function () {
    $.pjax.defaults.scrollTo = false;

    $.mithos.form("form[data-ajax-login]", {
        init: function (form) {
            var $submit = form.find(":submit");
            var $loading = form.find(".loading-login");
            $submit.hide();
            $loading.show();
        },
        error: function (data, form) {
            var $submit = form.find(":submit");
            var $loading = form.find(".loading-login");

            if (data.message) {
                notyfy({text: data.message, type: "error", timeout: 8000});
            }

            $loading.hide();
            $submit.show();
        },
        success: function (data, form) {
            var $submit = form.find(":submit");
            var $loading = form.find(".loading-login");

			var $partial = $(".partial-login");
            $.get(base + "partial/login", function (html) {
                $partial.html(html);
            });

            if (data.redirect) {
                $.pjax({url: base.substring(0, base.length - 1) + data.redirect, container: ".ajax-container", timeout:0});
            }
        }
    });

    $.mithos.form("form[data-ajax]", {
        init: function (form) {
            var $submit = form.find(":submit");
            $submit.attr("disabled", true).after('<span class="loading-execution"><img src="/static.php/template/default/images/ajax-loader.gif" /></span>');
        },
        error: function (data, form) {
            var $submit = form.find(":submit");

            if (data.message) {
                notyfy({text: data.message, type: "error", timeout: 8000});
            }

            $submit.attr("disabled", false);
            form.find(".loading-execution").remove();
        },
        success: function (data, form) {
            if (data.message) {
                var $submit = form.find(":submit");
                $(".form-action :text, .form-action textarea").val("");
                $submit.attr("disabled", false);
                form.find(".loading-execution").remove();
            }

            if (data.message) {
                notyfy({text: data.message, type: "success", timeout: 8000});
            }

            if (data.partial) {
                var $partial = $(".partial-" + data.partial);
                $partial.append('<div class="loading-partial"></div>');
                $.get(base + "partial/" + data.partial, function (html) {
                    $partial.html(html);
                });
            }

            if (data.redirect) {
                $.pjax({url: base.substring(0, base.length - 1) + data.redirect, container: ".ajax-container", timeout:0});
            }
        }
    });

    $(document).pjax("a[data-ajax]", ".ajax-container", {timeout: 0})
		.on("pjax:end", function() {
			//initAfterLoadPage();
		}).on("pjax:send", function(e) {
		  	overlay.create(e.target);
		}).on("pjax:complete", function (e) {
			overlay.destroy();
		});

    $(document).on("click", "[data-ajax-action]", function (e) {
        var $this = $(this);

        $.get($this.attr("href"), function (data) {

            if (data.success) {
                if (data.partial) {
                    var $partial = $(".partial-" + data.partial);
                    $partial.append('<div class="loading-partial"></div>');
                    $.get(base + "partial/" + data.partial, function (html) {
                        $partial.html(html);
                    });
                }

                if (data.redirect) {
                    $.pjax({url: base.substring(0, base.length - 1) + data.redirect, container: ".ajax-container", timeout:0});
                }
            } else {
                notyfy({text: data.message, type: "error", timeout: 8000});
            }

        });

        e.preventDefault();
    });

    $(document).on("click", ".reload-captcha", function (e) {
        var $this = $(this);
        var $container = $this.closest(".captcha");
        var $img = $container.find("img");
        var src = $img.attr("src");
        $img.attr("src", "").attr("src", $img.attr("src"));
        e.preventDefault();
    });
});