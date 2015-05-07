<table data-table class="list">
    <thead>
        <tr>
            <th>Arquivo</th>
        </tr>
    </thead>

    <tbody>
        <? foreach ($emails as $email): ?>
            <tr>
                <td><a data-window data-name="email-<?= $email ?>" title="Arquivo: <?= $email ?>" href="<?= url_to('/admin/configs/emails/edit/' . $email) ?>"><?= $email ?></a></a></td>
            </tr>
        <? endforeach ?>
    </tbody>
</table>