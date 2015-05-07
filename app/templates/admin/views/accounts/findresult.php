<table class="list">
    <thead>
        <tr>
            <th width="80">Usuário</th>
            <th>Personagens</th>
            <th>E-Mail</th>
            <th>IP</th>
        </tr>
    </thead>
    
    <tbody>
        <? if (empty($accounts)): ?>
            <tr>
                <td colspan="4">Nenhum usuário encontrado</td>
            </tr>
        <? else: ?>
            <? foreach ($accounts as $account): ?>
                <tr<?= $account['blocked'] ? ' class="error"' : '' ?>>
                    <td><a data-name="account<?= $account['username'] ?>" title="Usuário: <?= $account['username'] ?>" data-window href="<?= url_to('/admin/accounts/edit/' . $account['username']) ?>"><?= $account['username'] ?></a></td>
                    <td>
                        <? foreach ($account['characters'] as $key => $character): ?>
                            <a data-name="character<?= $character['name'] ?>" title="Personagem: <?= $character['name'] ?>" data-window href="<?= url_to('/admin/characters/edit/' . $character['name']) ?>"><?= $character['name'] ?></a><?= $key + 1 < count($account['characters']) ? ', ' : '' ?>
                        <? endforeach ?>
                    </td>
                    <td><?= $account['email'] ?></td>
                    <td><?= $account['ip'] ?></td>
                </tr>
            <? endforeach ?>
        <? endif ?>
    </tbody>
</table>