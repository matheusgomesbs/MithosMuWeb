<form data-ajax data-name="account<?= $account['username'] ?>" class="form" method="post" action="<?= url_to('/admin/accounts/edit/' . $account['username']) ?>">
    <div class="fields">
        <fieldset>
            <legend>Dados do usuário</legend>
            <div class="grid">
                <div class="grid-6">
                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-name">Nome: <span class="required">*</span></label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $account['name'] ?>" name="name" id="account-<?= $account['name'] ?>-name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label>Usuário:</label>
                        </div>
                        <div class="field readonly">
                            <?= $account['username'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-secret-question">Pergunta:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $account['secretQuestion'] ?>" name="secret_question" id="account-<?= $account['name'] ?>-secret-question" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-email">E-Mail:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $account['email'] ?>" id="account-<?= $account['name'] ?>-email" name="email" />
                        </div>
                    </div> 
                    <div class="row">
                        <div class="label">
                        </div>
                        <div class="field">
                            <input disabled="disabled" type="checkbox"<?= $account['blocked'] ? ' checked="checked"' : '' ?> value="1" id="account-<?= $account['name'] ?>-blocked" class="block-account-open-window" name="blocked" /> <label for="account-<?= $account['name'] ?>-blocked">Bloqueado</label>
                            <a data-window data-window-width="400" title="Bloquear usuário" href="<?= url_to('/admin/accounts/ban/' . $account['username']) ?>"><i class="fa fa-external-link"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label>Criado em:</label>
                        </div>
                        <div class="field readonly">
                            <?= date('d/m/Y', strtotime($account['createdAt'])) ?>
                        </div>
                    </div>
                </div>
            
                <div class="grid-6">
                    <div class="row">
                        <div class="label">
                            <label>Status:</label>
                        </div>
                        <div class="field readonly">
                            <?= util('Character')->status($account['connected']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-password">Senha:</label>
                        </div>
                        <div class="field">
                            <input type="password" value="" id="account-<?= $account['name'] ?>-password" name="password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-secret-answer">Resposta:</label>
                        </div>
                        <div class="field">
                            <input type="text" id="account-<?= $account['name'] ?>-secret-answer" value="<?= $account['secretAnswer'] ?>" name="secret_answer" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                        </div>
                        <div class="field">
                            <input type="checkbox"<?= $account['confirmedEmail'] ? ' checked="checked"' : '' ?> value="1" id="account-<?= $account['name'] ?>-confirm_email" name="confirmed_email" /> <label for="account-<?= $account['name'] ?>-confirm-email">E-Mail confirmado</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-pid">Chave:</label>
                        </div>
                        <div class="field">
                            <input type="text" id="account-<?= $account['name'] ?>-pid" value="<?= $account['personalId'] ?>" name="pid" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-credit">Créditos (R$):</label>
                        </div>
                        <div class="field">
                            <input type="text" class="money" value="<?= util('Number')->format($account['credit'], 2, ',') ?>" id="account-<?= $account['name'] ?>-credit" name="credit" />
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        
        
        <div class="grid">
            <div class="grid-6">
                <? if (count(config('coins', []))): ?>
                    <fieldset>
                        <legend>Moedas</legend>
                        <? foreach (config('coins', []) as $coin): ?>
                            <div class="row">
                                <div class="label">
                                    <label for="account-<?= $account['name'] ?>-coin-<?= $coin['id'] ?>"><?= $coin['name'] ?>:</label>
                                </div>
                                <div class="field">
                                    <input type="text" id="account-<?= $account['name'] ?>-coin-<?= $coin['id'] ?>" value="<?= $account['coins'][$coin['id']] ?>" name="coin_<?= $coin['id'] ?>" />
                                </div>
                            </div>
                        <? endforeach ?>
                    </fieldset>
                <? endif ?>
            </div>

            <div class="grid-6">
                <fieldset>
                    <legend>VIP</legend>
                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-vip-type">VIP:</label>
                        </div>
                        <div class="field">
                            <select id="account-<?= $account['name'] ?>-vip-type" name="vip_type">
                                <? foreach (config('vip.types', []) as $code => $name): ?>
                                    <option value="<?= $code ?>"<?= $code == $account['vipType'] ? ' selected="selected"' : '' ?>><?= $name ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="label">
                            <label for="account-<?= $account['name'] ?>-vip-expire">Vencimento:</label>
                        </div>
                        <div class="field">
                            <input type="text" class="datepicker" id="account-<?= $account['name'] ?>-vip-expire" value="<?= empty($account['vipExpire']) ? '' : date('d/m/Y', strtotime($account['vipExpire'])) ?>" name="vip_expire" />
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        
        <? if (!empty($account['ban'])): ?>
            <fieldset>
                <legend>Bloqueio</legend>
                
                <div class="row">
                    <div class="label">
                        <label>Motivo:</label>
                    </div>
                    <div class="field readonly">
                        <?= nl2br($account['ban']['cause']) ?>
                    </div>
                    <div class="label">
                        <label>Período:</label>
                    </div>
                    <div class="field readonly">
                        <?= date('d/m/Y H:i', strtotime($account['ban']['block_date'])) ?> - <?= date('d/m/Y H:i', strtotime($account['ban']['unblock_date'])) ?>
                    </div>
                </div>
            </fieldset>
        <? endif ?>
        
        <fieldset class="one-line">
            <legend>Personagens</legend>
            <table class="list">
                <thead>
                    <tr>
                        <th>Personagem</th>
                        <th>Classe</th>
                        <th>Level</th>
                        <th>Status</th>
                    </tr>
                </thead>
                
                <tbody>
                    <? if (empty($account['characters'])): ?>
                        <tr>
                            <td colspan="4">Nenhum personagem para este usuário</td>
                        </tr>
                    <? else: ?>
                        <? foreach ($account['characters'] as $character): ?>
                            <tr>
                                <td><a data-window title="Personagem: <?= $character['name'] ?>" href="<?= url_to('/admin/characters/edit/' . $character['name']) ?>"><?= $character['name'] ?></a></td>
                                <td><?= util('Character')->className($character['class']) ?></td>
                                <td><?= $character['level'] ?></td>
                                <td><?= util('Character')->status($character['connected']) ?></td>
                            </tr>
                        <? endforeach ?>
                    <? endif ?>
                </tbody>
            </table>
        </fieldset>
        
        <? notify('admin.accounts.edit.render', $account) ?>
    </div>
    
    <div class="actions">
        <a data-window data-window-width="256" data-window-height="590" class="button" title="Baú <?= $account['username'] ?>" href="<?= url_to('/admin/accounts/warehouse/' . $account['username']) ?>">Baú</a>
        
        <input type="submit" value="Salvar" />
    </div>
</form>