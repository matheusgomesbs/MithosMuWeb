<h1 class="title">Últimas notícias</h1>

<ul class="news">
    <? foreach ($news as $n): ?>
        <li>
            <?= util('MithosNews.News')->newsType($n['type']) ?>
            <a<?= empty($n['link']) ? ' data-ajax' : ' target="_blank"' ?>  href="<?= url_to('/news/' . $n['slug']) ?>"><?= $n['title'] ?></a>
            <p class="date">Postado por <?= $n['username'] ?> em <?= date('d/m/Y H:i', strtotime($n['create_date'])) ?></p>
            <p><?= util('String')->truncate(strip_tags($n['body']), 200) ?></p>
        </li>
    <? endforeach ?>
</ul>