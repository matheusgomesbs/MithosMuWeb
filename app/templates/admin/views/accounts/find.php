<form class="form serch-account" action="<?= url_to('/admin/accounts/find') ?>" method="post">
    <div class="row" style="padding:5px">
        <p>Digite no campo abaixo parte do nome de usuário, nome do personagem, e-mail ou IP para ver a lista de resultados.</p>
        <input type="text" name="term" />
    </div>
</form>

<div style="padding:5px;">
    <fieldset class="one-line">
        <legend>Usuários</legend>

        <div class="search-accounts-result"></div>
    </fieldset>
</div>