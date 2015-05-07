<table class="list services-table">
    <thead>
        <tr>
            <th>Serviço</th>
            <th width="100">Liberado para</th>
            <th></th>
            <th width="10"></th>
        </tr>
    </thead>

    <tbody>
        <? foreach ($services as $root): ?>
            <tr class="root">
                <td colspan="3"><?= $root['name'] ?></td>
                <td class="record-actions">
                    <? if ($root['active']): ?>
                        <a data-ajax-action class="button" title="Desativar serviço" href="<?= url_to('/admin/services/deactive/' . $root['service']) ?>">Desativar</a>
                    <? else: ?>
                        <a data-ajax-action class="button" title="Ativar serviço" href="<?= url_to('/admin/services/active/' . $root['service']) ?>">Ativar</a>
                    <? endif ?>
                </td>
            </tr>
            <? foreach ($root['children'] as $service): ?>
                <tr class="<?= $service['active'] ? 'success' : 'error' ?>">
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $service['name'] ?></td>
                    <td class="record-actions">
                        <? if ($service['allowed']): ?>
                            <span class="label success">Liberado para todos</span>
                        <? else: ?>
                            <?= util('String')->toList($service['viptypes']) ?>
                        <? endif ?>
                    </td>
                    <td></td>
                    <td class="record-actions">
                        <a class="button" data-window data-window-width="400" data-name="services.edit.<?= $service['id'] ?>" title="Editar serviço" href="<?= url_to('/admin/services/edit/' . $service['service']) ?>">Editar</a>
                        <? if ($service['active']): ?>
                            <a data-ajax-action class="button" title="Desativar serviço" href="<?= url_to('/admin/services/deactive/' . $service['service']) ?>">Desativar</a>
                        <? else: ?>
                            <a data-ajax-action class="button" title="Ativar serviço" href="<?= url_to('/admin/services/active/' . $service['service']) ?>">Ativar</a>
                        <? endif ?>
                    </td>
                </tr>
            <? endforeach ?>
        <? endforeach ?>
    </tbody>
</table>