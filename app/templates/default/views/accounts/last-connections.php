<h3>Últimas conexões</h3>

<? foreach ($connections as $conn): ?>
	<ul>
		<li>Servidor: <?= $conn['server_name'] ?></li>
		<li>IP: <?= $conn['ip'] ?></li>
		<li>Personagem: <?= $conn['character'] ?></li>
		<li>Conectou as: <?= date('d/m/Y H:i', strtotime($conn['connected_at'])) ?></li>
		<li>Desconectou as: <?= date('d/m/Y H:i', strtotime($conn['disconnected_at'])) ?></li>
	</ul>
<? endforeach ?>