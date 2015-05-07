<table data-table class="list">
    <thead>
        <tr>
            <th>Nome</th>
            <th width="10"></th>
        </tr>
    </thead>
    
    <tbody>
        <? if (empty($groups)): ?>
            <tr>
                <td colspan="2">Nenhuma grupo encontrado</td>
            </tr>
        <? else: ?>
            <? foreach ($groups as $group): ?>
                <tr>
                    <td><?= $group['name'] ?></td>
                    <td class="record-actions">
                        <a class="button" data-window data-window-width="600" data-window-height="500" data-window-height="200" data-name="group.edit.<?= $group['id'] ?>" title="Editar grupo" href="<?= $base ?>/admin/groups/edit/<?= $group['id'] ?>">Editar</a>
                        <a class="button" data-delete-ajax href="<?= $base ?>/admin/groups/delete/<?= $group['id'] ?>">x</a>
                    </td>
                </tr>
            <? endforeach ?>
        <? endif ?>
    </tbody>
</table>

<div class="padding">
    <a data-window data-window-width="600" data-window-height="500" title="Adicionar novo grupo" class="button" href="<?= $base ?>/admin/groups/add">Adicionar</a>
</div>