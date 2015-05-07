<table data-table class="list">
    <thead>
        <tr>
            <th data-sortable="true">Nome</th>
            <th data-sortable="true">Autor</th>
            <th>Versão</th>
            <th>Website</th>
            <th width="10"></th>
        </tr>
    </thead>
    
    <tbody>
        <? foreach ($plugins as $plugin): ?>
            <tr<?= $plugin['active'] ? ' class="success"' : '' ?>>
                <td><?= $plugin['name'] ?></td>
                <td><?= $plugin['author'] ?></td>
                <td><?= $plugin['version'] ?></td>
                <td><a href="<?= $plugin['website'] ?>" target="_blank"><?= $plugin['website'] ?></a></td>
                <td class="record-actions">
                    <? if ($plugin['active']): ?>
                        <a data-ajax-action class="button" href="<?= url_to('/admin/plugins/deactivate/' . $plugin['name']) ?>">Desativar</a>
                    <? else: ?>
                        <a data-ajax-action class="button" href="<?= url_to('/admin/plugins/active/' . $plugin['name']) ?>">Ativar</a>
                    <? endif ?>
                </td>
            </tr>
        <? endforeach ?>
    </tbody>
</table>