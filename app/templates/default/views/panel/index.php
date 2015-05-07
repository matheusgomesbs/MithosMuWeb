<h1 class="title">Painel de controle</h1>

<? foreach ($services as $service): ?>
    <h2 class="title"><?= $service['name'] ?></h2>
    <? if (!empty($service['children'])): ?>
        <ul>
            <? foreach ($service['children'] as $children): ?>
                <li><a data-ajax href="<?= url_to($children['url']) ?>"><?= $children['name'] ?></a></li>
            <? endforeach ?>
        </ul>
    <? endif ?>
<? endforeach ?>