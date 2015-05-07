var overlay = {
    
    create: function (container) {
        container.append('<div class="overlay"><div class="frame_loading"></div></div>');
    },
    
    destroy: function (container) {
        container.find(".overlay").remove();
    }
    
};

$(function () {
    $.datepicker.regional['pt-BR'] = {
        closeText: 'Fechar',
        prevText: '&#x3c;Anterior',
        nextText: 'Pr&oacute;ximo&#x3e;',
    	currentText: 'Hoje',
        monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
        'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
        'Jul','Ago','Set','Out','Nov','Dez'],
        dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
        dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
        weekHeader: 'Sm',
    	dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true
    };
    $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
    
    $.notify.defaults({
        showDuration: 200
    });
    
	$(document).keyup(function(e) {
        if ($("#popup_overlay").size() == 0) {
    		if (e.keyCode == 27) {
                if ($.window.getSelectedWindow()) {
    	  		    $.window.getSelectedWindow().close();
                }
    		}
        }
	});

    $.window.prepare({
        dock: "bottom"
    });
    
    $(document).on("click", ".open-calendar", function (e) {
        var $this = $(this);
        $this.closest(".row").find("input.date").datepicker().datepicker("show");
        e.preventDefault();
    });
    
    $(document).on("click", "[data-delete-ajax]", function (e) {
        var $this = $(this);
        if (jConfirm("Tem certeza que deseja excluir este registro?", "Confirmação", function (ok) {
            if (ok) {
                $.get($this.attr("href"), function (data) {
                    if (data.success) {
                        var win = $.window.getSelectedWindow();
                        if (win) win.refreshWindow();
            
                        if (data.message) {
                            $.notify(data.message, "success");
                        }
                    } else {
                        if (data.error) {
                            $.notify(data.error, "error");
                        }
                    }
                }, "JSON");
            }
        }));
        e.preventDefault();
    });
   
    $(document).on("click", "a[data-window]", function (e) {
        var $this = $(this);
        if ($.window.getWindow($this.data("name"))) {
            var opened = $.window.getWindow($this.data("name"));
            if (opened.isMinimized) {
                opened.restore();
            }
            opened.select();
            opened.refreshWindow();
        } else {
            var reload = $('<a href="javascript:void(0)" class="window_icon_button no-draggable"><i title="reload window" class="fa fa-refresh"></i></a>');
            reload.click(function () {
                $.window.getSelectedWindow().refreshWindow();
            })
            var window = $(".container").window({
                showFooter: false,
                title: $this.data("window-title") || $this.attr("title"),
                url: $this.attr("href"),
                bookmarkable: false,
                maximizable: false,
                minimizable: false,
                width: $this.data("window-width") || 600,
                height: $this.data("window-height") || 400,
                checkBoundary: true,
                withinBrowserWindow: true,
                custBtns: [reload],
                onLoaded: function (w) {
                    w.getContainer().find("form:first").find(":input:visible:enabled:not(button):not(.no-focus):first").focus();
                    w.getContainer().find("[data-table]").each(function() {
                        var $this = $(this);

                        var columns = [];
                        $this.find("thead tr th").each(function() {
                            var $th = $(this);
                            if ($th.data("sortable")) {
                                columns.push({
                                    "orderable": true
                                });
                            } else {
                                columns.push({
                                    "orderable": false
                                });
                            }
                        });
                        var t = $this.DataTable({
                            scrollY: $this.data("scrolling") == false ? null : (($this.data("window-height") || 400) - 110) + "px",
                            pageLength: 20,
                            columns: columns,
                            lengthChange: false,
                            language: {
                                emptyTable: "Nenhum resultado encontrado",
                                info: "Mostrando _START_ de _END_ para _TOTAL_ resultados",
                                infoEmpty: "Mostrando 0 de 0 para 0 resultados",
                                infoFiltered: "(filtered from _MAX_ total entries)",
                                infoPostFix: "",
                                thousands: ",",
                                lengthMenu: "Mostrando _MENU_ resultados",
                                loadingRecords: "Carregando...",
                                processing: "Processando...",
                                search: "Pesquisar:",
                                zeroRecords: "Nenhum resultado encontrado",
                                paginate: {
                                    first: "Primeiro",
                                    last: "Último",
                                    next: "Próximo",
                                    previous: "Anterior"
                                },
                                aria: {
                                    sortAscending:  ": activate to sort column ascending",
                                    sortDescending: ": activate to sort column descending"
                                }
                            }
                        });
                        t.draw();
                    });

                    w.getContainer().find(".datepicker").datepicker();

                    // tabs
                    w.getContainer().find(".tabs").each(function () {
                        var $this = $(this);
                        var $first = $this.find(".tabs-list li:first a");
                        $first.addClass("active");
                        $this.find($first.attr("href")).show();

                        $this.find(".tabs-list a").click(function (e) {
                            var $a = $(this);

                            $this.find(".tabs-list a").removeClass("active");
                            $a.addClass("active");
                            $this.find(".tab-content").hide();
                            $this.find($a.attr("href")).show();

                            e.preventDefault();
                        });
                    });
                }
            });
            window.setWindowId($this.data("name"));
        }
        e.preventDefault();
    });
    
    $(document).on("click", "[data-ajax-action]", function (e) {
        var $this = $(this);
        var $container = $this.closest(".window_frame");
        
        $container.append('<div class="overlay"><div class="frame_loading"></div></div>');
        $.get($this.attr("href"), function (data) {
            if (data.success) {
                var win = $.window.getSelectedWindow();
                if (win) win.refreshWindow();
                $.notify(data.message, "success");
            } else {
                $.notify(data.error, "error");
                $container.find(".overlay").remove();
            }
        }, "JSON");
        
        e.preventDefault();
    });
    
    $.mithos.form("form[data-ajax]", {
        init: function (form) {
            form.find(":submit").attr("disabled", true);
            var $container = form.closest(".window_frame");
            $container.append('<div class="overlay"><div class="frame_loading"></div></div>');
        },
        error: function (data, form) {
            var $container = form.closest(".window_frame");
            form.find(":submit").attr("disabled", false);
            
            $container.find(".overlay").remove();
            if (data.message) {
                $.notify(data.message, "error");
            }
        },
        success: function (data, form) {
            var $container = form.closest(".window_frame");
            form.find(":submit").attr("disabled", false);

            $container.find(".overlay").remove();
            var win = $.window.getSelectedWindow();
            if (win) win.refreshWindow();

            if (data.refresh) {
                var win = $.window.getWindow(data.refresh);
                win.refreshWindow();
            }

            if (data.message) {
                $.notify(data.message, "success");
            }
        }
    });
});