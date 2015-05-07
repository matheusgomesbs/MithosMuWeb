<div class="action">
    <a data-window data-window-width="400" title="Adicionar download" class="button" href="<?= url_to('/admin/downloads/add') ?>">Adicionar</a>
</div>

<table data-table class="list">
    <thead>
        <tr>
            <th data-sortable="true">Nome</th>
            <th data-sortable="true">Desc</th>
            <th data-sortable="true">Tamanho</th>
            <th data-sortable="true">Links</th>
            <th width="10"></th>
        </tr>
    </thead>
    
    <tbody>
        <? foreach ($downloads as $id => $download): ?>
            <tr>
                <td><?= $download['name'] ?></td>
                <td><?= $download['desc'] ?></td>
                <td><?= $download['size'] ?></td>
                <td>
                    <? $i = 0; foreach ($download['links'] as $name => $url): ?>
                        <a href="<?= $url ?>" target="_blank"><?= $name ?></a><?= ++$i < count($download['links']) ? ', ' : '' ?>
                    <? endforeach ?>
                </td>
                <td class="record-actions">
                    <a class="button" data-window data-window-width="400" data-name="downloads.edit.<?= $download['name'] ?>" title="Editar download" href="<?= url_to('/admin/downloads/edit/' . $id) ?>">Editar</a>
                    <a class="button" data-delete-ajax href="<?= url_to('/admin/downloads/delete/' . $id) ?>">x</a>
                </td>
            </tr>
        <? endforeach ?>
    </tbody>
</table>