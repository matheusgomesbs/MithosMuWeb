<div class="tabs body">
    <? if (count($servers) > 1): ?>
        <div class="tabs-list">
            <ul>
                <? foreach ($servers as $server => $character): ?>
                    <li><a href="#tab-<?= Mithos\Util\Inflector::slug($server) ?>"><?= $server ?></a></li>
                <? endforeach ?>
            </ul>
        </div>
    <? endif ?>

    <? foreach ($servers as $server => $characters): ?>
        <div class="tab-content" id="tab-<?= util('Inflector')->slug($server) ?>">
            <table class="list">
                <thead>
                    <tr>
                        <th>Personagem</th>
                        <th>Conta</th>
                        <th>Tempo online</th>
                        <th>IP</th>
                        <th>Server</th>
                        <th width="10"></th>
                    </tr>
                </thead>
                
                <tbody>
                    <? if (empty($characters)): ?>
                        <tr>
                            <td colspan="6">Nenhum usuário online no momento</td>
                        </tr>
                    <? else: ?>
                        <? foreach ($characters as $character): ?>
                            <tr>
                                <td><a data-name="character<?= $character['character'] ?>" title="Personagem: <?= $character['character'] ?>" data-window href="<?= url_to('/admin/characters/edit/' . $character['character']) ?>"><?= $character['character'] ?></a></td>
                                <td><a data-name="account<?= $character['account'] ?>" title="Usuário: <?= $character['account'] ?>" data-window href="<?= url_to('/admin/accounts/edit/' . $character['account']) ?>"><?= $character['account'] ?></a></td>
                                <td><?= util('Time')->relative($character['connected_time'], 2, '') ?></td>
                                <td><?= $character['ip'] ?></td>
                                <td><?= $character['server_name'] ?></td>
                                <td>
                                    <a class="button" data-ajax-action href="<?= url_to('/admin/characters/logout/' . $character['account']) ?>">Desconectar</a>
                                </td>
                            </tr>
                        <? endforeach ?>
                    <? endif ?>
                </tbody>
            </table>
        </div>
    <? endforeach ?>
</div>