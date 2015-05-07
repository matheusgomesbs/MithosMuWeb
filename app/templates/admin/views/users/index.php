<div class="action">
    <a data-window data-window-width="400" title="Adicionar novo usuário" class="button" href="<?= url_to('/admin/users/add') ?>">Adicionar</a>
</div>

<table data-table class="list">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Usuário</th>
            <th>E-Mail</th>
            <th>Grupo</th>
            <th width="10"></th>
        </tr>
    </thead>
    
    <tbody>
        <? if (empty($users)): ?>
            <tr>
                <td colspan="5">Nenhuma usuário encontrada</td>
            </tr>
        <? else: ?>
            <? foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['grupo'] ?></td>
                    <td class="record-actions">
                        <a class="button" data-window data-window-width="400" data-name="users.edit.<?= $user['id'] ?>" title="Editar usuário" href="<?= url_to('/admin/users/edit/' . $user['id']) ?>">Editar</a>
                        <a class="button" data-delete-ajax href="<?= url_to('/admin/users/delete/' . $user['id']) ?>">x</a>
                    </td>
                </tr>
            <? endforeach ?>
        <? endif ?>
    </tbody>
</table>