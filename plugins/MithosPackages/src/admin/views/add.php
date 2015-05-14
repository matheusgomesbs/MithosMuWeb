<form data-ajax class="form" action="<?= url_to('/admin/packages/add') ?>" method="post">
    <div class="fields">
        <fieldset>
            <legend>Pacote</legend>
            <div class="row">
                <div class="label">
                    <label for="packages-name">Nome: <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="name" id="packages-name" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="packages-price">Valor (R$): <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="price" class="money" id="packages-price" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="package-desc">Descrição:</label>
                </div>
                <div class="field">
                    <textarea name="desc" id="package-desc"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="package-active">Ativo:</label>
                </div>
                <div class="field">
                    <input type="checkbox" id="package-active" value="1" name="active" />
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
                            <option value="<?= $key ?>"><?= $value ?></option>
                        <? endforeach ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="package-vipdays">Dias:</label>
                </div>
                <div class="field">
                    <input type="text" id="package-vipdays" name="vipdays" />
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Moedas</legend>

            <? foreach (config('coins', []) as $coin): ?>
                <div class="row">
                    <div class="label">
                        <label for="package-coin-<?= $coin['column'] ?>"><?= $coin['name'] ?>:</label>
                    </div>
                    <div class="field">
                        <input type="text" id="package-coin-<?= $coin['column'] ?>" name="coins[<?= $coin['column'] ?>]" />
                    </div>
                </div>
            <? endforeach ?>
        </fieldset>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>