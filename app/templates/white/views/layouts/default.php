<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/view; charset=UTF-8" />
<title></title>
	<link rel="stylesheet" href="/static.php/template/white/css/style.css" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" /> 
	<script type="text/javascript" src="/static.php/template/white/js/jquery.js"></script>
	<script type="text/javascript" src="/static.php/template/white/js/cycle.js"></script>
	<script type="text/javascript" src="/static.php/template/white/js/functions.js"></script>
	<script type="text/javascript" src="/static.php/template/white/js/file.js"></script>
	<script type="text/javascript">
		$(function(){
			$("table.table tr:nth-child(odd)").addClass("odd");
			$("#slide ul").cycle({
				fx: "fade",
				speed: 2500,
				timeout: 5000,
				next: "#next",
				prev: "#prev"
			});	
			$("input[type=file]").filestyle({ 
			    image: "images/choose-file.gif",
			    imageheight : 22,
			    imagewidth : 82,
			    width : 250
			});
			setInterval(load_servers, 3000);
		  	$("#terms").hide();
			$("#open_terms").toggle(
				function() {
					$("#terms").show();
				},
				function() {
					$("#terms").hide();
				}
			);						
		});
	</script>
	<!--[if gte IE 7]>
		<style type="text/css">
			#paginator {
				margin-bottom: 10px;
			}
			#top .box {
				width: 19.9%;
			}
		</style>
	<![endif]-->
</head>
<body>
	<div id="wrap">
		<div id="header">
			<div id="logo">
				<img src="images/logo.png" />
			</div>
			<div id="menu">
				<ul>
					<li><a href="?p=home">Principal<span class="menu_sub">Ir para</span></a></li>
					<li><a href="?p=panel">Painel<span class="menu_sub">Acesse o</span></a></li>
					<li><a href="?p=register">Cadastro<span class="menu_sub">Fazer o</span></a></li>
					<li><a href="?p=downloads">Downloads<span class="menu_sub">Baixe o jogo</span></a></li>
					<li><a href="?p=rankings">Ranking<span class="menu_sub">Veja o</span></a></li>
					<li><a href="?p=home">Suporte<span class="menu_sub">Quer ajuda?</span></a></li>
					<li><a href="#">Shop<span class="menu_sub">Acesse o novo</span></a></li>
					<li><a href="#">F&oacute;rum<span class="menu_sub">Fica por dentro do</span></a></li>
				</ul>
			</div>
		</div>
		<div id="slide">
			<a href="#" id="prev"></a>
			<a href="#" id="next"></a>
			<ul>
				<li><img src="images/slides/Imagem Principal.jpg" /></li>
				<li><img src="images/slides/Image2.jpg" /></li>
				<li><img src="images/slides/Image3.jpg" /></li>
				<li><img src="images/slides/Image4.jpg" /></li>
			</ul>
		</div>
		<div id="content">
			<div id="left">
				<div id="box">
					<h1>Calend&aacute;rio</h1>

				</div>
				<div id="box">
					<h1>Painel de Controle</h1>
					<?php if (true) : ?>
						<div id="box_content">
							<form action="" method="post" id="form_login">
								<label>Usu&aacute;rio</label>
								<input id="username" type="text" name="username" class="input_text" />
								<label>Senha</label>
								<input id="password" type="password" name="password" class="input_text" />
								<input type="hidden" name="active" value="panel_of_control" />
								<input type="submit" style="margin-top: 7px;" class="button" value="Logar" />
							</form>
						</div>
						<ul class="login">
							<li><a href="#">Esqueceu sua Senha?</a></li>
							<li>Novo usu&aacute;rio? <a href="#">Registre-se</a></li>
						</ul>
					<?php else : ?>
						<div id="box_content">
							Bem-vindo(a)  <a href="?p=logout">[Deslogar]</a>
						</div>
						<ul class="login">
							<li><a href="#">&raquo; Minha Conta</a></li>
							<li><a href="#">&raquo; Meus Personagens</a></li>
							<li><a href="?p=support">&raquo; Suporte</a></li>				
							<li><a href="#">&raquo; WebShop</a></li>
						</ul>
					<?php endif; ?>
				</div>																						
			</div>
			<div id="middle">
				<?= $content ?>
			</div>
			<div id="right">
				<div id="box">
					<h1>Top Resets</h1>
					<div id="box_content">

					</div>
				</div>
				<div id="box">
					<h1>Top Master Resets</h1>
					<div id="box_content">

					</div>
				</div>
				<div id="box">
					<h1>Titulo</h1>
					<div id="box_content">
						dfdsf
					</div>
				</div>				
			</div>
		</div>
		<div id="footer">
			<div id="box">
				<h1>Equipe</h1>

			</div>
			<div id="box">
				<h1>Informa&ccedil;&otilde;es</h1>
				<ul>
					<li>Nome: <span class="text"></span></li>
					<li>Vers&atilde;o: <span class="text"></span></li>
					<li>Experi&ecirc;ncia: <span class="text"></span></li>
					<li>Drop: <span class="text"></span></li>
					<li>Total Contas: <span class="text"></span></li>
					<li>Total Personagens: <span class="text"></span></li>
					<li>Total Guilds: <span class="text"></span></li>
				</ul>
			</div>
			<div id="box">
				<h1>Servidores</h1>
				<div id="load_servers">
					<ul>

						<li>Total Online: <span class="text"><a href="?p=onlines&server=all"></a></span></li>
						<li>Recorde Online: <span class="text"></span></li>
					</ul>
				</div>
			</div>
			<div id="box">
,
			</div>
			<div id="search_box">
				<div id="contact">
					
						<h2>Contato</h2>
						Digite sua mensagem
					
				</div>
				<form action="search/type:all" method="post">
					<label>Procurar</label>
					<input type="text" name="search" class="search_text" />
					<input type="submit" class="search_submit" value="" />
				</form>
				<div id="copyright">
					&copy; <?php echo date("Y"); ?> - Todos direitos reservados a <br />
					Site desenvolvido por <a href="http://www.flavio-hernandes.com.br">Flavio Hernandes</a> Vers&atilde;o 0.1
				</div>
			</div>
		</div>
	</div>
</body>
</html>