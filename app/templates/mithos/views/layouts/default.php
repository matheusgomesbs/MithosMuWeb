<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8" />
        <title></title>
	
    	<link rel="stylesheet" href="/static.php/template/mithos/css/screen.css" />
    
        <script type="text/javascript" src="/static.php/template/mithos/js/jquery.js"></script>
        <script type="text/javascript" src="/static.php/template/mithos/js/functions.js"></script>
    </head>

    <body>
    	<div class="container">
    		<div class="header">
		
    		</div>
    		<div class="sidebar">
    			<h2 class="title">Painel de Controle</h2>
    			<div class="box">
    				<? if (true): ?>
    					<div class="control-panel">
    						{$form_login}
    						<ul>
                            	<li style="margin-bottom:2px;">Esqueceu sua senha? <a href="?do=lost-password">clique aqui!</a></li>
                            	<li>Ainda não é cadastrado? <a href="?do=register">clique aqui!</a></li>
                            </ul>
    					</div>
                    <? else: ?>
    					<ul class="menu">
    						<li><a href="?do=account">Minha conta</a></li>
    						<li><a href="?do=characters">Menus personagens</a></li>
    						<li><a href="?do=support">Suporte</a></li>
    						<li><a href="?do=logout">Deslogar</a></li>
    					</ul>
                    <? endif ?>
    			</div>
    			<h2 class="title">Menu Principal</h2>
    			<div class="box">
    				<ul class="menu">
    					<li><a href="/">Principal</a></li>
    					<li><a href="/register">Registrar-se</a></li>
    					<li><a href="/downloads">Downloads</a></li>
    					<li><a href="/rankings">Rankings</a></li>
    					<li><a href="?do=info">Informações</a></li>
    					<li><a href="/shop">Loja de itens</a></li>
    					<li><a href="#">Castle Siege</a></li>
    					<li><a href="#">Fórum</a></li>
    				</ul>
    			</div>
    			<h2 class="title">Equipe</h2>
    			<div class="box">
				
    			</div>
    		</div>
    		<div class="content">
    			<?= $content ?>
    		</div>
    		<div class="sidebar">
    			<h2 class="title">Servidores</h2>
    			<div class="box">
                    <ul class="server-list">
                    	<li>
    	                    <p class="name">Easy - 40 / 100</p>
    	                    <div class="pregress-bar">
    	                        <div class="left"><!-- --></div>
    	                        <div style="width:186px;margin-bottom: 5px;" class="progress">
    	                        	<span style="width:40%" class="bg bg-blue">&nbsp;40%&nbsp;</span>
    	                        </div>
    	                        <div class="right"><!-- --></div>
    	                    </div>
    	                </li>
    	                <li>
    	                    <p class="name">Hard - 100 / 100</p>
    	                    <div class="pregress-bar">
    	                        <div class="left"><!-- --></div>
    	                        <div style="width:186px;margin-bottom: 5px;" class="progress">
    	                        	<span style="width:100%" class="bg bg-red">&nbsp;100%&nbsp;</span>
    	                        </div>
    	                        <div class="right"><!-- --></div>
    	                    </div>
                        </li>
                    </ul>
                    <div class="clear"></div>
                    <div class="total-online">
                        <p>Total Online: <span class="white">140</span></p>
                    </div>
    			</div>
    			<h2 class="title">Estatísticas</h2>
    			<div class="box">
    				<ul class="list">
    					<li>Total de contas: <span class="white"></span></li>
    					<li>Total de personagens: <span class="white"></span></li>
    					<li>Total de guilds: <span class="white"></span></li>
    					<li>Personagens banidos: <span class="white"></span></li>
    					<li>Conta banidas: <span class="white"></span></li>                
    				</ul>
    			</div>
    			<h2 class="title">Informaões</h2>
    			<div class="box">
    				<ul class="list">
    					<li>Nome: <span class="white"></span></li>
    					<li>Versão: <span class="white"></span></li>
    					<li>Experiência: <span class="white"></span></li>
    					<li>Drop: <span class="white"></span></li>
    				</ul>
    			</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="footer">
    		Todos direitos reservados à  <br /> Powered by <a href="mailto:hernandes.flavio@gmail.com">Flavio Hernandes</a> - Versão 0.1
    	</div>
    </body>
</html>