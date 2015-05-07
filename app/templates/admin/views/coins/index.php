<div class="action">
    <a data-window data-window-width="400" title="Adicionar moeda" class="button" href="<?= url_to('/admin/coins/add') ?>">Adicionar</a>
</div>

<table data-table class="list">
    <thead>
        <tr>
            <th data-sortable="true">Nome</th>
            <th data-sortable="true" width="100">Tabela</th>
            <th data-sortable="true" width="100">Coluna (saldo)</th>
            <th data-sortable="true" width="120">Coluna (account)</th>
            <th width="10"></th>
        </tr>
    </thead>
    
    <tbody>
        <? foreach ($coins as $id => $coin): ?>
            <tr>
                <td><?= $coin['name'] ?></td>
                <td><?= $coin['table'] ?></td>
                <td><?= $coin['column'] ?></td>
                <td><?= $coin['foreign_key'] ?></td>
                <td data-sort="false" class="record-actions">
                    <a class="row-action" data-window data-window-width="400" data-name="coins.edit.<?= $coin['name'] ?>" title="Editar moeda" href="<?= url_to('/admin/coins/edit/' . $id) ?>">Editar</a>
                    <a class="row-action" data-delete-ajax href="<?= url_to('/admin/coins/delete/' . $id) ?>">x</a>
                </td>
            </tr>
        <? endforeach ?>
    </tbody>
</table>