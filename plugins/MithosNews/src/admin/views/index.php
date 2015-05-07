<table data-table class="list">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Título</th>
            <th>Autor</th>
            <th width="10">Views</th>
            <th>Postada em</th>
            <th width="10"></th>
        </tr>
    </thead>
    
    <tbody>
        <? foreach ($news as $n): ?>
            <tr>
                <td><?= util('MithosNews.News')->newsType($n['type']) ?></td>
                <td><?= $n['title'] ?></td>
                <td><?= $n['username'] ?></td>
                <td style="text-align:center"><?= $n['views'] ?></td>
                <td><?= date('d/m/Y H:i', strtotime($n['create_date'])) ?></td>
                <td class="record-actions">
                    <a data-window data-window-height="530" data-name="news.edit.<?= $n['id'] ?>" title="Editar nóticia" class="button" href="<?= url_to('/admin/news/edit/' . $n['id']) ?>">Editar</a>
                    <a class="button" data-delete-ajax href="<?= url_to('/admin/news/delete/' . $n['id']) ?>">x</a>
                </td>
            </tr>
        <? endforeach ?>
    </tbody>
</table>