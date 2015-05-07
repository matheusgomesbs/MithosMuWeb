<!DOCTYPE html>
<html>
<head>
    <title><?= config('site.title') ?></title>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="<?= static_to('/template/default/css/jquery.notyfy.css') ?>" />
    <link rel="stylesheet" href="<?= static_to('/template/default/css/jquery.notyfy.theme-default.css') ?>" />
    <link rel="stylesheet" href="<?= static_to('/template/default/css/style.css') ?>" />

    <?= fetch('stylesheets') ?>

    <script type="text/javascript">
        var base = '<?= url_to('/') ?>';
    </script>

    <script type="text/javascript" src="<?= static_to('/template/default/js/jquery.js') ?>"></script>
    <script type="text/javascript" src="<?= static_to('/template/default/js/pjax.js') ?>"></script>
    <script type="text/javascript" src="<?= static_to('/template/default/js/jquery.notyfy.js') ?>"></script>
    <script type="text/javascript" src="<?= static_to('/template/default/js/mithos.js') ?>"></script>
    <script type="text/javascript" src="<?= static_to('/template/default/js/jquery.scroll.js') ?>"></script>
    <script type="text/javascript" src="<?= static_to('/template/default/js/functions.js') ?>"></script>

    <?= fetch('scripts') ?>
</head>
<body>
<div class="wrap">
    <div class="header"></div>
    <div class="main">
        <div class="top"></div>
        <div class="sidebar left">
            <div class="container">
                <p class="title">Menu principal</p>
                <div class="box">
                    <ul>
                        <li><a data-ajax href="<?= url_to('/') ?>">Principal</a></li>
                        <li><a data-ajax href="<?= url_to('/register') ?>">Cadastro</a></li>
                        <li><a data-ajax href="<?= url_to('/downloads') ?>">Downloads</a></li>
                        <li><a data-ajax href="<?= url_to('/info') ?>">Informações</a></li>
                        <li><a data-ajax href="<?= url_to('/shop') ?>">Loja virtual</a></li>
                    </ul>
                </div>
                <div class="box-bottom"></div>
                <div class="space"></div>
                <p class="title">Informações</p>
                <div class="box">
                    <ul>
                        <li><a href="#">Equipe</a></li>
                        <li><a href="#">Coin's</a></li>
                        <li><a href="#">Seja um revendedor</a></li>
                        <li><a href="#">Servidores</a></li>
                        <li><a href="#">Tutoriais</a></li>
                        <li><a class="ajax" href="vips.php">Vip / Plus</a></li>
                    </ul>
                </div>
                <div class="box-bottom"></div>
                <div class="space"></div>
                <p class="title">Rankings</p>
                <div class="box">
                    <ul>
                        <li><a data-ajax href="<?= url_to('/rankings/blood-square') ?>">Blood Castle</a></li>
                        <li><a data-ajax href="<?= url_to('/rankings/devil-square') ?>">Devil Square</a></li>
                        <li><a data-ajax href="<?= url_to('/rankings/guild') ?>">Guilds</a></li>
                        <li><a data-ajax href="<?= url_to('/rankings/character') ?>">Personagens</a></li>
                    </ul>
                </div>
                <div class="box-bottom"></div>
                <div class="space"></div>
                <p class="title">Suporte</p>
                <div class="box">
                    <ul>
                        <li><a href="#">Centro de ajuda (F.A.Q.)</a></li>
                        <li><a href="#">Suporte via E-Mail</a></li>
                        <li><a href="#">Suporte via Ticket</a></li>
                    </ul>
                </div>
                <div class="box-bottom"></div>
            </div>
            <div class="sidebar-bottom"></div>
        </div>
        <div class="content">
            <div class="container">
                <div class="c">
                    <div class="ajax-container">
                        <?= $content ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content-middle"></div>
        </div>
        <div class="sidebar right">
            <div class="container">
                <div class="partial-login">
                    <?= partial('login') ?>
                </div>
                <div class="box-bottom"></div>
                <div class="space"></div>
                <p class="title">Informações</p>
                <div class="box">
                    <ul>
                        <li>Versão: <span class="text"><?= config('server.version_name') ?></span></li>
                        <li>Experiência: <span class="text"><?= config('server.experience') ?></span></li>
                        <li>Drop: <span class="text"><?= config('server.drop') ?></span></li>
                        <li>Total de Contas: <span class="text"><?= util('Number')->format(Account::count()) ?></span></li>
                        <li>Total de Personagens: <span class="text"><?= util('Number')->format(Character::count()) ?></span></li>
                        <li>Total de Guilds: <span class="text"><?= util('Number')->format(Guild::count()) ?></span></li>
                    </ul>
                </div>
                <div class="box-bottom"></div>
                <div class="space"></div>
                <p class="title">Equipe</p>
                <div class="box">
                    <ul>
                        <? foreach (Server::getMembersTeam() as $char): ?>
                            <li><?= $char['name'] ?> <?= util('Character')->status($char['status']) ?></span></li>
                        <? endforeach ?>
                    </ul>
                </div>
                <div class="box-bottom"></div>
            </div>
            <div class="sidebar-bottom"></div>
        </div>
    </div>
    <div id="footer">

    </div>
</div>
</body>
</html>