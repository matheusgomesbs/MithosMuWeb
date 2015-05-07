<h1 class="title">Downloads</h1>

<h2 class="title">Arquivos</h2>
<div class="box">
    <table class="list">
        <thead>
            <tr>
                <th>Arquivo</th>
                <th>Descrição</th>
                <th>Tamanho</th>
                <th>Link(s)</th>
            </tr>
        </thead>
        <tbody>
            <? foreach (config('downloads', array()) as $download): ?>
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
</div>
<br />

<h2 class="title">Downloads Adicionais (não obrigatórios)</h2>
<div class="box">
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
                <td>Para quem está com erro no jogo</td>
                <td><a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=9b2da534-3e03-4391-8a4d-074b9f2bc1bf&amp;displaylang=en" target="_blank">[download]</a></td>
            </tr>
            <tr>
                <td>Visual Basic 6.0 Run-time Files</td>
                <td>Para quem está com erro no launcher</td>
                <td><a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=ba9d7924-4122-44af-8ab4-7c039d9bf629&amp;DisplayLang=en" target="_blank">[download]</a></td>
            </tr>
        </tbody>
    </table>
</div>
<br />

<h2 class="title">Requisitos</h2>
<div class="box">
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
</div>
<br />
<p>É importante conferir se os drivers de vídeo estão corretamente
instalados e atualizados, caso esteja em dúvida, visite abaixo o site do
fabricante da sua placa de vídeo e confira.</p>
<h2 class="title">Drivers de vídeo</h2>
<div class="box-panel">
    <div class="box-panel-content">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr style="text-align: center;">
                <td>
                    <a href="http://support.amd.com/us/gpudownload/pages/index.aspx"><img src="<?= static_to('/template/default/images/drivers/ati.gif') ?>" /></a>
                </td>
                <td>
                    <a href="http://downloadcenter.intel.com/default.aspx"><img src="<?= static_to('/template/default/images/drivers/intel.gif') ?>" /></a>
                </td>
                <td>
                    <a href="http://www.matrox.com/graphics/en/corpo/support/drivers/home.php"><img src="<?= static_to('/template/default/images/drivers/matrox.gif') ?>" /></a>
                </td>
                <td>
                    <a href="http://www.nvidia.com/download/index.aspx?lang=br"><img src="<?= static_to('/template/default/images/drivers/nvidia.gif') ?>" /></a>
                </td>
                <td>
                    <a href="http://www.sis.com/download/"><img src="<?= static_to('/template/default/images/drivers/sis.gif') ?>" /></a>
                </td>
            </tr>
        </table>
    </div>
</div>