<h1 class="title">Ticket #<?= $ticket['id'] ?> - <?= $ticket['department'] ?></h1>

<?= nl2br($ticket['message']) ?>

<? if (!empty($ticket['messages'])): ?>
    
    <h2 class="title margin-top">Mensagens</h2>
    <div class="box">
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
    </div>
<? endif ?>

<? if ($ticket['status'] != 3): ?>
    
    <h2 class="title margin-top">Deixe uma mensagem</h2>
    <form data-ajax action="<?= url_to('/support/tickets/add_message/' . $ticket['id']) ?>" class="form" method="post">
        <div class="box">
            <div class="row">
                <div class="field block">
                    <textarea id="ticket-message" name="message"></textarea>
                </div>
            </div>
        </div>
        
        <div class="submit">
            <input type="submit" value="Enviar mensagem" class="btn" />
        </div>
    </form>
    
<? endif ?>