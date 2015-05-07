<form data-ajax data-name="character<?= $character['name'] ?>" class="form" method="post" action="<?= url_to('/admin/characters/edit/' . $character['name']) ?>">
    <div class="fields">
        <fieldset>
            <legend>Dados do personagem</legend>
            
            <div class="grid">
                <div class="grid-6">
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-name">Nome: <span class="required">*</span></label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['name'] ?>" name="name" id="character-<?= $character['name'] ?>-name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-level">Level: <span class="required">*</span></label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['level'] ?>" name="level" id="character-<?= $character['name'] ?>-level" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-class">Classe:</label>
                        </div>
                        <div class="field">
                            <select name="class" id="character-<?= $character['name'] ?>-class">
                                <? foreach (config('characters.classes', []) as $code => $name): ?>
                                    <option value="<?= $code ?>"<?= $character['class'] == $code ? ' selected="selected"' : '' ?>><?= $name ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-map">Mapa:</label>
                        </div>
                        <div class="field">
                            <select name="map" id="character-<?= $character['name'] ?>-map">
                                <? foreach (config('maps', []) as $code => $name): ?>
                                    <option value="<?= $code ?>"<?= $character['map'] == $code ? ' selected="selected"' : '' ?>><?= $name ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-strength">Força:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['strength'] ?>" name="strength" id="character-<?= $character['name'] ?>-strength" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-energy">Energia:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['energy'] ?>" name="energy" id="character-<?= $character['name'] ?>-energy" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-command">Liderança:</label>
                        </div>
                        <? if (isset($character['command'])): ?>
                            <div class="field">
                                <input type="text" value="<?= $character['command'] ?>" name="command" id="character-<?= $character['name'] ?>-command" />
                            </div>
                        <? else: ?>
                            <div class="field readonly">
                                -
                            </div>
                        <? endif ?>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-money">Zen:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['money'] ?>" name="money" id="character-<?= $character['name'] ?>-money" />
                        </div>
                    </div>

                </div>
                
                <div class="grid-6">
                    <div class="row">
                        <div class="label">
                            <label>Usuário:</label>
                        </div>
                        <div class="field readonly">
                            <a data-name="account<?= $character['username'] ?>" data-window title="Usuário: <?= $character['username'] ?>" href="<?= url_to('/admin/accounts/edit/' . $character['username']) ?>"><?= $character['username'] ?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-experience">Experiência:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['experience'] ?>" name="experience" id="character-<?= $character['name'] ?>-experience" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-points">Pontos disp.:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['points'] ?>" name="points" id="character-<?= $character['name'] ?>-points" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-x">Coordenadas: <span class="required">*</span></label>
                        </div>
                        <div class="field">
                            <input type="text" style="width:48%" value="<?= $character['positionX'] ?>" name="x" id="character-<?= $character['name'] ?>-x" />
                            <input type="text" style="width:49%;float:right" value="<?= $character['positionY'] ?>" name="x" id="character-<?= $character['name'] ?>-y" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-agility">Agilidade:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['agility'] ?>" name="agility" id="character-<?= $character['name'] ?>-agility" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-vitality">Vitalidade:</label>
                        </div>
                        <div class="field">
                            <input type="text" value="<?= $character['vitality'] ?>" name="vitality" id="character-<?= $character['name'] ?>-vitality" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-code">Tipo:</label>
                        </div>
                        <div class="field">
                            <select name="code" id="character-<?= $character['name'] ?>-code">
                                <? foreach (config('characters.code_types', []) as $code => $name): ?>
                                    <option value="<?= $code ?>"<?= $character['code'] == $code ? ' selected="selected"' : '' ?>><?= $name ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="character-<?= $character['name'] ?>-pk">PK Level:</label>
                        </div>
                        <div class="field">
                            <select name="code" id="character-<?= $character['name'] ?>-pk">
                                <? foreach (config('characters.pk_levels', []) as $code => $name): ?>
                                    <option value="<?= $code ?>"<?= $character['pkLevel'] == $code ? ' selected="selected"' : '' ?>><?= $name ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        
        <?// \Mithos\Plugin::notify('admin.characters.edit.render', $character) ?>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>