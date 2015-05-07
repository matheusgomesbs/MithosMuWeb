<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>{$config.info.title}</title>
        <link href="/static.php/template/dark/css/style.css" rel="stylesheet" />
        <link href="/static.php/template/dark/css/rankings.css" rel="stylesheet" />
        
        <script type="text/javascript" src="/static.php/template/dark/js/jquery.js"></script>
        <script type="text/javascript" src="/static.php/template/dark/js/block.js"></script>
        <script type="text/javascript" src="/static.php/template/dark/js/slide.js"></script>
        <script type="text/javascript" src="/static.php/template/dark/js/tipsy.js"></script>
        <script type="text/javascript" src="/static.php/template/dark/js/functions.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div id="header">

            </div>
            <div id="menu">
                <ul>
                    <li><a href="?do=home">Principal</a></li>
                    <li><a href="?do=register">Registrar</a></li>
                    <li><a href="?do=info">Informações</a></li>
                    <li><a href="?do=downloads">Downloads</a></li>
                    <li><a href="?do=rankings">Rankings</a></li>
                    <li><a href="">Coins</a></li>
                    <li><a href="">Loja de items</a></li>
                    <li><a href="">Principal</a></li>
                    <li><a href="">Principal</a></li>
                </ul>
            </div>
            <div id="left">
                <div class="box">
                    <h6>Painel de Controle</h6>
                    <div class="content">
                        {if !$logged_in}
                            <form action="" method="post" id="panel-of-control">
                                <label for="username">Usu&aacute;rio</label>
                                <input type="text" name="username" id="username" class="input" />
                                <label for="password">Senha</label>
                                <input type="password" name="password" id="password" class="input" />
                                <input type="submit" value="Logar" class="submit" />
                            </form>
                            <div class="panel-link">
                                <ul>
                                    <li><a href="">Esqueceu sua Senha?</a></li>
                                    <li>Novo usuário? <a href="">Registre-se</a></li>
                                </ul>
                            </div>
                        {else}
                            <a href="">deslogar</a>
                        {/if}
                    </div>
                </div>
                <div class="box">
                    <h6>Informações básicas</h6>
                    <div class="content" style="padding: 0 5px;">
                        <ul class="list">
                            <li><strong>Versão:</strong> </li>
                            <li><strong>Exp's:</strong> </li>
                            <li><strong>Taxa de dropes:</strong> </li>
                            <li><strong>Monster HP:</strong> </li>
                            <li><strong>Rate:</strong> </li>
                            <li><strong>Contas criadas:</strong> </li>
                            <li><strong>Personagens criados:</strong> </li>
                            <li><strong>Guilds criadas:</strong> </li>
                        </ul>
                    </div>
                </div>
                <div class="box">
                    <h6>Equipe</h6>
                    <div class="content" style="padding: 0 5px;">
                        <ul class="list">
                            <li><strong>Flavio Hernandes</strong><span style="float: right">Online</span></li>
                        </ul>
                    </div>				
                </div>
                <div class="box">
                    <h6>Servidores</h6>
                    <div class="content">
                        <ul class="servers">
                            {foreach from=$servers item=server}
                                <li>
                                    <p class="name">{$server.name} - {$server.onlines} / {$server.max}</p>
                                    <div class="progress-bar">
                                        <div class="show-bar"><!-- --></div>
                                        <div style="width:189px;" class="show-bg-bar">
                                            <span style="width:{$server.percentage}%" class="show-bg-blue">&nbsp;{$server.percentage}%&nbsp;</span>
                                        </div>
                                        <div class="show-bar"><!-- --></div>
                                    </div>
                                </li>
                            {/foreach}
                            <li class="onlines"><strong>Onlines:</strong> 10</li>
                        </ul>
                        <div class="clear"></div>
                    </div>				
                </div>
            </div>
            <div id="right">
                <?= $content ?>
            </div>
            <div id="footer">
                <div class="right">
                    sdsd<br />
                    dadsa
                </div>
            </div>
        </div>		
    </body>
</html>