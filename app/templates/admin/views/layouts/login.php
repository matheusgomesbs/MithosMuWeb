<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Administração</title>
		
        <link rel="stylesheet" href="<?= static_to('/template/admin/css/login.css') ?>" />

        <script type="text/javascript" src="<?= static_to('/template/admin/js/jquery.js') ?>"></script>

        <script type="text/javascript">
            $(function () {
                $("#usuario").focus();
            });
        </script>
	</head>
	<body>
        <div id="logo">
            <a href="<?= url_to('/admin') ?>"></a>
        </div>
		<div id="login">
			<?= $content ?>
		</div>
	</body>
</html>