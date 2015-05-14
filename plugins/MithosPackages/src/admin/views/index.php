<div class="action">
    <a data-window data-window-width="400" data-window-height="500" title="Adicionar pacote" class="button" href="<?= url_to('/admin/packages/add') ?>">Adicionar</a>
</div>

<table data-table class="list">
    <thead>
    <tr>
        <th data-sortable="true">Pacote</th>
        <th data-sortable="true">Valor (R$)</th>
        <th width="180">VIP</th>
        <th width="120">Moedas</th>
        <th width="10"></th>
    </tr>
    </thead>

    <tbody>
    <? foreach ($packages as $package): ?>
        <tr class="<?= $package['active'] ? 'success' : '' ?>">
            <td><?= $package['package'] ?></td>
            <td><?= util('Number')->format($package['price'], 2, ',', '.') ?></td>
            <td><?= $package['vipdays'] ?> dia(s) <?= config('vip.types')[$package['viptype']] ?> </td>
            <td>
                <? if (!empty($package['coins'])): ?>
                    <? foreach (json_decode($package['coins']) as $name => $coin): ?>
                        <? if (isset(config('coins')[$name])): ?>
                            <p class="coin"><?= $coin ?> <?= config('coins')[$name]['name'] ?></p>
                        <? endif ?>
                    <? endforeach ?>
                <? endif ?>
            </td>
            <td class="record-actions">
                <a class="button" data-window data-window-width="400" data-window-height="500" data-name="packages.edit.<?= $package['id'] ?>" title="Editar pacote" href="<?= url_to('/admin/packages/edit/' . $package['id']) ?>">Editar</a>
                <a class="button" data-delete-ajax href="<?= url_to('/admin/packages/delete/' . $package['id']) ?>">x</a>
            </td>
        </tr>
    <? endforeach ?>
    </tbody>
</table>