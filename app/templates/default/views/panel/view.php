<h1 class="title">Painel de controle</h1>

<div class="panel">
    <div class="grid">
        <div class="grid-4">
            <ul>
                <? foreach ($services as $serv): ?>
                    <li><a data-ajax href="<?= url_to($serv['url']) ?>"><?= $serv['name'] ?></a></li>
                <? endforeach ?>
            </ul>
        </div>

        <div class="grid-8">
            <?= $service ?>
        </div>
    </div>
</div>