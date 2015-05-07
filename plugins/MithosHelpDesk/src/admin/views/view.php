<form data-ajax class="form" action="<?= url_to('/admin/helpdesk/tickets/add_message/' . $ticket['id']) ?>" method="post">
    <div class="fields">
        <fieldset>
            <legend>Ticket #<?= $ticket['id'] ?></legend>
            <div class="row">
                <div class="label">
                    <label>Departamento:</label>
                </div>
                <div class="field readonly">
                    <?= $ticket['department'] ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Autor:</label>
                </div>
                <div class="field readonly">
                    <?= $ticket['account'] ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Situação:</label>
                </div>
                <div class="field readonly">
                    <?= $ticket['status'] ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Criado em:</label>
                </div>
                <div class="field readonly">
                    <?= date('d/m/Y H:i', strtotime($ticket['create_date'])) ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Atualizado em:</label>
                </div>
                <div class="field readonly">
                    <?= empty($ticket['update_date']) ? '-' : date('d/m/Y H:i', strtotime($ticket['update_date'])) ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Mensagem:</label>
                </div>
                <div class="field readonly">
                    <?= $ticket['message'] ?>
                </div>
            </div>
        </fieldset>
        
        <? if (!empty($ticket['messages'])): ?>
            <fieldset>
                <legend>Mensagens</legend>
        
                <ul class="list">
                    <? foreach ($ticket['messages'] as $message): ?>
                        <li>
                            <div class="desc">
                                <span class="name"><?= $message['account_name'] ?></span>
                                <span class="created"><?= date('d/m/Y H:i', strtotime($message['create_date'])) ?></span>
                                <p><?= nl2br($message['message']) ?></p>
                            </div>
                        </li>
                    <? endforeach ?>
                </ul>
            </fieldset>
        <? endif ?>
        
        <? if ($ticket['status'] != 3): ?>
            <fieldset>
                <legend>Adicionar mensagem</legend>
            
                <div class="row">
                    <div class="label">
                        <label for="ticket-<?= $ticket['id'] ?>-status">Situação:</label>
                    </div>
                    <div class="field">
                        <select id="ticket-<?= $ticket['id'] ?>-status" name="status">
                            <? foreach ($status as $key => $value): ?>
                                <option value="<?= $key ?>"<?= $ticket['status'] == $key ? ' selected="selected"' : '' ?>><?= $value ?></option>
                            <? endforeach ?>
                        </select>
                    </div>
                </div>
            
                <div class="row">
                    <div class="field block">
                        <textarea name="message"></textarea>
                    </div>
                </div>
            </fieldset>
        <? endif ?>
    </div>
    
    <div class="actions">
        <? if ($ticket['status'] != 3): ?>
            <input type="submit" value="Responder" />
        <? endif ?>
    </div>
</form>