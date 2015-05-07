<div class="body">
    <fieldset class="one-line" style="margin-top:5px">
        <legend>Templates disponível</legend>
        <ul class="templates">
            <? foreach ($templates as $template): ?>
                <li<?= $template['active'] ? ' class="active"' : '' ?>>
                    <div class="screenshot">
                        <img src="<?= static_to('/template/' . $template['name'] . '/images/screenshot.png') ?>" width="176" />
                    </div>
                    <p class="name"><?= $template['name'] ?></p>
                    <p class="author">por <?= $template['author'] ?></p>

                    <div class="options">
                        <div class="buttons">
                            <a data-window data-window-name="<?= $template['name'] ?>-edit" title="Editar template <?= $template['name'] ?>" class="button" href="<?= url_to('/admin/configs/template/edit/' . $template['name']) ?>">Editar</a>
                            <? if (!$template['active']): ?>
                                <a data-ajax-action class="button" href="<?= url_to('/admin/configs/template/active/' . $template['name']) ?>">Ativar</a>
                            <? endif ?>
                        </div>
                    </div>
                </li>
            <? endforeach ?>
        </ul>
    </fieldset>
</div>