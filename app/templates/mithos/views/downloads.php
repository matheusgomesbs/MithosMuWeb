<h1>Downloads</h1>
<table class="list">
	<thead>
		<tr>
			<th>Arquivo</th>
			<th>Descrição</th>
			<th>Tamanho</th>
			<th width="150">Link(s)</th>
		</tr>
	</thead>
	<tbody>
        <? foreach ($config->get('downloads') as $download): ?>
            <tr>
                <td><?= $download['name'] ?></td>
                <td><?= $download['desc'] ?></td>
                <td><?= $download['size'] ?></td>
                <td width="190">
                    <? foreach ($download['links'] as $name => $url): ?>
                        <a href="<?= $url ?>" target="_blank">[<?= $name ?>]</a>
                    <? endforeach ?>
                </td>
            </tr>
        <? endforeach ?>
	</tbody>        
</table>
<br />

<h1>Downloads Adicionais (não obrigatórios)</h1>
<table class="list">
	<thead>
		<tr>
			<th>Arquivo</th>
			<th>Descrição</th>
			<th width="12%">Link(s)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>DirectX End-User Runtime Web Installer</td>
			<td>Para quem está com problema no DirectX</td>
			<td><a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=2da43d38-db71-4c1b-bc6a-9b6652cd92a3&amp;DisplayLang=en" target="_blank">[download]</a></td>
		</tr>
		<tr>
			<td>Microsoft Visual C++ 2008 Package(x86)</td>
			<td>Para quem est&aacute; com erro no jogo</td>
			<td><a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=9b2da534-3e03-4391-8a4d-074b9f2bc1bf&amp;displaylang=en" target="_blank">[download]</a></td>
		</tr>
		<tr>
			<td>Visual Basic 6.0 Run-time Files</td>
			<td>Para quem est&aacute; com erro no launcher</td>
			<td><a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=ba9d7924-4122-44af-8ab4-7c039d9bf629&amp;DisplayLang=en" target="_blank">[download]</a></td>
		</tr>
	</tbody>
</table>
<br />
<h1>Requisitos</h1>
<table class="list">
	<thead>
		<tr>
			<th></th>
			<th>Mínimo requerido</th>
			<th>Recomendado</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>CPU</td>
			<td>Pentium II - 300 MHz</td>
			<td>Pentium III - 500 MHz ou acima</td>
		</tr>
		<tr>
			<td>RAM (Memória)</td>
			<td>32MB</td>
			<td>64MB ou acima</td>
		</tr>
		<tr>
			<td>OS (Sistema operacional)</td>
			<td>Win9x</td>
			<td>Win2000/XP</td>
		</tr>
		<tr>
			<td>Placa de vídeo</td>
			<td>8MB</td>
			<td>16MB com DirectX</td>
		</tr>
	</tbody>
</table>