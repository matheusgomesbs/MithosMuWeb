<form data-ajax class="form" action="<?= url_to('/admin/packages/edit/' . $package['id']) ?>" method="post">
    <div class="fields">
        <fieldset>
            <legend>Pacote</legend>
            <div class="row">
                <div class="label">
                    <label for="packages-name">Nome: <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="name" value="<?= $package['package'] ?>" id="packages-name" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="packages-price">Valor (R$): <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="price" value="<?= util('Number')->format($package['price'], 2, ',', '.') ?>" class="money" id="packages-price" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="package-desc">Descrição:</label>
                </div>
                <div class="field">
                    <textarea name="desc" id="package-desc"><?= $package['description'] ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="package-active">Ativo:</label>
                </div>
                <div class="field">
                    <input type="checkbox"<?= $package['active'] ? ' checked="checked"' : '' ?> id="package-active" value="1" name="active" />
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>VIP</legend>

            <div class="row">
                <div class="label">
                    <label for="package-viptype">Tipo:</label>
                </div>
                <div class="field">
                    <select id="package-viptype" name="viptype">
                        <option value=""></option>
                        <? foreach (config('vip.types', []) as $key => $value): ?>
                            <option<?= $key == $package['viptype'] ? ' selected="selected"' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                        <? endforeach ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="package-vipdays">Dias:</label>
                </div>
                <div class="field">
                    <input type="text" id="package-vipdays" value="<?= $package['vipdays'] ?>" name="vipdays" />
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Moedas</legend>

            <? foreach (config('coins', []) as $id => $coin): ?>
                <div class="row">
                    <div class="label">
                        <label for="package-coin-<?= $coin['id'] ?>"><?= $coin['name'] ?>:</label>
                    </div>
                    <div class="field">
                        <input type="text" value="<?= isset($package['coins'][$coin['id']]) ? $package['coins'][$coin['id']] : '' ?>" id="package-coin-<?= $coin['id'] ?>" name="coins[<?= $coin['id'] ?>]" />
                    </div>
                </div>
            <? endforeach ?>
        </fieldset>
    </div>

    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>