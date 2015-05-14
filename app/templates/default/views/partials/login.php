<p class="title"><?= logged_in() ? 'Olá, ' . user()->getName() : 'Painel de Controle' ?></p>
<div class="box">

    <? if (logged_in()): ?>
        <ul>
            <li>Status: <span class="text"><?= util('Account')->vipName(user()->getVipType()) ?></span></li>
            <li>Vencimento: <span class="text"><?= user()->getVipExpire()->format('d/m/Y') ?></span></li>
            <? foreach (config('coins', []) as $id => $coin): ?>
                <li><?= $coin['name'] ?>: <span class="text"><?= util('Number')->format(user()->getCoin($coin['id'])) ?></span></li>
            <? endforeach ?>
        </ul>

        <ul style="margin-top:10px">
            <? foreach (user()->getRootAvaliableServices() as $service): ?>
                <li><a data-ajax href="<?= url_to($service['url']) ?>"><?= $service['name'] ?></a></li>
            <? endforeach ?>
            <li><a href="<?= url_to('/logout') ?>" class="link">Deslogar</a></li>
        </ul>
    <? else: ?>
        <form data-ajax-login action="<?= url_to('/login') ?>" method="post">
            <input type="text" name="username" placeholder="Usuário" class="login-input" />
            <input type="password" name="password" placeholder="Senha" class="login-input" />
            <input type="submit" value="" class="login-submit" />
            <div class="loading-login" style="display:none">
                <img src="<?= static_to('/template/default/images/ajax-loader-login.gif') ?>" />
            </div>
        </form>
        <a data-ajax href="<?= url_to('/forgot') ?>" class="link">Esqueceu sua senha?</a>
    <? endif ?>
</div>