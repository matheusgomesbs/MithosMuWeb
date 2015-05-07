<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MuOnline</title>
<link rel="stylesheet" href="<?= static_to('/template/godzilla/css/style.css') ?>" />
<script type="text/javascript" src="<?= static_to('/template/godzilla/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?= static_to('/template/godzilla/js/date.js') ?>"></script>
<script type="text/javascript" src="<?= static_to('/template/godzilla/js/transiction.js') ?>"></script>
<script type="text/javascript">
$(function(){
    $("#sreenshot").jCarouselLite({
          btnPrev : '.prev',
          btnNext : '.next',
          auto    : false,
          speed   : 1000,
          visible : 4
    })
})
</script>
</head>
<body onload="goforit()">
	<div id="header_top">
		<div id="content_header">
			<span id="setdate"></span>, <?php echo date("d/m/Y"); ?>
		</div>
	</div>
	<div id="header">
	
	</div>
	<div id="content_top"></div>
	<div id="content">
		<div id="left">
			<div id="box">
				<h1>.Painel de Controle</h1>
					<label for="username">Usu&aacute;rio:</label>
					<input type="text" id="username" class="input" name="username" />
					<label for="password">Senha:</label>
					<input type="password" id="password" class="input" name="password" /><br />
					<input type="submit" value="" class="logar" />
					<div style="margin-top: 5px;">
						<a href="#">Registrar-se</a><br />
						<a href="#">Recuperar meu dados</a>
					</div>
			</div>
			<div id="box">
				<h1>.Menu Principal</h1>
				<div id="menu">
					<ul>
						<li><a class="first" href="#">&rsaquo; Principal</a></li>
						<li><a href="#">&rsaquo; Registrar-se</a></li>
						<li><a href="#">&rsaquo; Baixar o Jogo</a></li>
						<li><a href="#">&rsaquo; Rankings</a></li>
						<li><a href="#">&rsaquo; Informa&ccedil;&otilde;es</a></li>
						<li><a href="#">&rsaquo; VIP</a></li>
						<li><a href="#">&rsaquo; Tutoriais</a></li>
						<li><a href="#">&rsaquo; Shopping</a></li>
					</ul>
				</div>
			</div>
			<div id="box">
				<h1>.Servidores</h1>
				<p>Godzilla FREE <span class="online_server">70/100</span></p>
				<div id="bar">
					<div style="width: 70%;" id="progress">
						<span class="porcent">70%</span>
					</div>
				</div>
				<p>Godzilla VIP <span class="online_server">50/100</span></p>
				<div id="bar">
					<div style="width: 50%;" id="progress">
						<span class="porcent">50%</span>
					</div>
				</div>
				<p>Godzilla SVIP <span class="online_server">18/100</span></p>
				<div id="bar">
					<div style="width: 18%;" id="progress">
						<span class="porcent">18%</span>
					</div>
				</div>				
			</div>
			<div id="box">
				<h1>.Estat&iacute;sticas</h1>
				<div id="info">
					<ul>
						<li>Total de Contas: <span class="white">70</span></li>
						<li>Total de Personagens <span class="white">100</span></li>
						<li>Total de Guilds: <span class="white">10</span></li>
						<li>Contas banidas: <span class="white">1</span></li>
						<li>Personagens banidos: <span class="white">0</span></li>
					</ul>				
				</div>
			</div>		
		</div>
		<div id="middle">
			<h1>.Not&iacute;cias do Servidor</h1>
			<span class="more"><a href="#">.</a></span>
			<div id="notice">
				<ul>
					<li>
						<p class="title"><a href="#">Novidades do Servidor MuSTUDIO</a></p>
						<p class="date">Adicionada por cTz &aacute;s 16:52 de 09/03/2010.</p>
					</li>
					<li>
						<p class="title"><a href="#">Novidades do Servidor MuSTUDIO</a></p>
						<p class="date">Adicionada por cTz &aacute;s 16:52 de 09/03/2010.</p>
					</li>
					<li>
						<p class="title"><a href="#">Novidades do Servidor MuSTUDIO</a></p>
						<p class="date">Adicionada por cTz &aacute;s 16:52 de 09/03/2010.</p>
					</li>
					<li>
						<p class="title"><a href="#">Novidades do Servidor MuSTUDIO</a></p>
						<p class="date">Adicionada por cTz &aacute;s 16:52 de 09/03/2010.</p>
					</li>
					<li>
						<p class="title"><a href="#">Novidades do Servidor MuSTUDIO</a></p>
						<p class="date">Adicionada por cTz &aacute;s 16:52 de 09/03/2010.</p>
					</li>
				</ul>
			</div>
			<h1>.Melhores do Servidor</h1>
			<span class="more"><a href="#">.</a></span>
			<div id="best">	
				<div id="mini_box">
					<h1>.Top Resets</h1>
					<div id="avatar">
					
					</div>
					<div id="info">
						<ul>
							<li>Nome: <span class="white">Godzilla</span></li>
							<li>Class: <span class="white">Blade Knight</span></li>
							<li>Resets: <span class="white">40</span></li>
						</ul>
					</div>
				</div>
				<div id="mini_box">
					<h1>.Top Guilds</h1>
					<div id="avatar">
					
					</div>				
					<div id="info">
						<ul>
							<li>Nome: <span class="white">Godzilla</span></li>
							<li>Class: <span class="white">Blade Knight</span></li>
							<li>Resets: <span class="white">40</span></li>
						</ul>
					</div>
				</div>
				<div id="mini_box">
					<h1>.Top Semanal</h1>
					<div id="avatar">
					
					</div>				
					<div id="info">
						<ul>
							<li>Nome: <span class="white">Godzilla</span></li>
							<li>Class: <span class="white">Blade Knight</span></li>
							<li>Resets: <span class="white">40</span></li>
						</ul>
					</div>
				</div>
				<div id="mini_box_last">
					<h1>.Top Mensal</h1>
					<div id="avatar">
					
					</div>				
					<div id="info">
						<ul>
							<li>Nome: <span class="white">Godzilla</span></li>
							<li>Class: <span class="white">Blade Knight</span></li>
							<li>Resets: <span class="white">40</span></li>
						</ul>
					</div>				
				</div>							
			</div>
			<h1>.Melhores Screenshots</h1>
			<span class="more"><a href="#">.</a></span>
			<div id="prev"><a class="prev" href="javascript:void(0);"><img src="images/prev.png" /></a></div>
			<div id="sreenshot">
				<ul>
					<li>
						<img class="img" src="images/screen/more.jpg" width="110" height="83" />
						<p class="visit">Visto: 1000 vezes</p>
					</li>
					<li>
						<img class="img" src="images/screen/more.jpg" width="110" height="83" />
						<p class="visit">Visto: 1000 vezes</p>
					</li>
					<li>
						<img class="img" src="images/screen/more.jpg" width="110" height="83" />
						<p class="visit">Visto: 1000 vezes</p>
					</li>
					<li>
						<img class="img" src="images/screen/more.jpg" width="110" height="83" />
						<p class="visit">Visto: 1000 vezes</p>
					</li>
					<li>
						<img class="img" src="images/screen/more.jpg" width="110" height="83" />
						<p class="visit">Visto: 1000 vezes</p>
					</li>
					<li>
						<img class="img" src="images/screen/more.jpg" width="110" height="83" />
						<p class="visit">Visto: 1000 vezes</p>
					</li>
				</ul>
			</div>
			<div id="next"><a class="next" href="javascript:void(0);"><img src="images/next.png" /></a></div>
		</div>
		<div id="right">
			<div id="box">
				<h1>.Top 5 Guilds</h1>
				<div id="top5">
					<ul>
						<li>
							<div id="avatar">
							
							</div>
							<div id="text">
								<p class="name">Godzilla</p>
								<p class="class">Blade Knight</p>
								<p class="level">1898 resets</p>
							</div>
						</li>
						<li>
							<div id="avatar">
							
							</div>
							<div id="text">
								<p class="name">Godzilla</p>
								<p class="class">Blade Knight</p>
								<p class="level">1898 resets</p>
							</div>
						</li>
						<li>
							<div id="avatar">
							
							</div>
							<div id="text">
								<p class="name">Godzilla</p>
								<p class="class">Blade Knight</p>
								<p class="level">1898 resets</p>
							</div>
						</li>					
						<li>
							<div id="avatar">
							
							</div>
							<div id="text">
								<p class="name">Godzilla</p>
								<p class="class">Blade Knight</p>
								<p class="level">1898 resets</p>
							</div>
						</li>
						<li>
							<div id="avatar">
							
							</div>
							<div id="text">
								<p class="name">Godzilla</p>
								<p class="class">Blade Knight</p>
								<p class="level">1898 resets</p>
							</div>
						</li>											
					</ul>
				</div>
			</div>
			<div id="box">
				<h1>.Informa&ccedil;&otilde;es</h1>
				<div id="info">
					<ul>
						<li>Nome: <span class="white">Mu Godzilla</span></li>
						<li>Vers&atilde;o: <span class="white">97d+99</span></li>
						<li>Experi&ecirc;ncia: <span class="white">9000x</span></li>
						<li>Drop: <span class="white">70%</span></li>
					</ul>				
				</div>
			</div>
			<div id="image">
				<a href=""><img src="images/shop.jpg" alt="Shopping" /></a>
			</div>
			<div id="image">
				<a href=""><img src="images/download.jpg" alt="Download" /></a>
			</div>
		</div>
	</div>
	<div id="content_button"></div>
	<div id="footer">
		&copy; 2010 - Todos direitos reservados &agrave; MuGodzilla<br />
		Godzilla for MuOnline - vers&atilde;o 0.1
	</div>
</body>
</html>