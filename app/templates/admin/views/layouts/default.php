<!DOCTYPE html>
<html>
	<head>
		<title>Administração</title>
		<meta charset="UTF-8" />
        
        
        <link href="<?= static_to('/template/admin/css/style.css') ?>" rel="stylesheet" />
        <link href="<?= static_to('/template/admin/css/font-awesome.css') ?>" rel="stylesheet" />
        <link href="<?= static_to('/template/admin/css/alerts.css') ?>" rel="stylesheet" />
		
        <?= fetch('css') ?>
        
        <script>
            var base = '<?= url_to('/') ?>';
        </script>
        
        <script type="text/javascript" src="<?= static_to('/template/admin/js/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/jquery.ui.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/jquery.data-table.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/jquery.data-table.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/notify.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/mithos.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/jquery.mask-money.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/jquery.window.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/alerts.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/tinymce/tinymce.min.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/functions.js') ?>"></script>
        
        <!-- custom -->
        <script type="text/javascript" src="<?= static_to('/template/admin/js/custom/plugins.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/custom/accounts.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/custom/downloads.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/custom/config.js') ?>"></script>
        <script type="text/javascript" src="<?= static_to('/template/admin/js/custom/services.js') ?>"></script>
        
        <!-- plugins -->
        <?= fetch('javascript') ?>

	</head>
	
	<body>
		<div id="head" class="vis">
			<nav id="menu">
                <?= Mithos\Menu\Menu::getInstance('admin')->render() ?>
            </nav>
            
            <nav id="menu-dx">
                <ul>
                    <li class="username">
                    	<a href="javascript:void(0)"><strong></strong></a>
                        <ul class="sublist">
                            <li><a href="<?= url_to('/admin/logout') ?>">Sair</a></li>
                        </ul>
                    </li>
            	</ul>
            </nav>
		</div>

        <div class="clearfix"></div>

        <div class="container">
		    <div class="wrap">

                <div class="main">
                    <div class="content pjax-container">
                        <?= $content ?>
                    </div>
                </div>
            </div>
		</div>
	</body>
</html>