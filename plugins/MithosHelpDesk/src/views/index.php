<h1 class="title">Atendimento</h1>

<div class="margin-bottom">
    <a data-ajax href="<?= url_to('/support/tickets/add') ?>" class="btn">Abrir novo ticket</a>
</div>

<h2 class="title">Meus tickets</h2>
<div class="box">
    <table class="list">
        <thead>
            <tr>
                <th width="40"></th>
                <th>Departamento</th>
                <th width="100">Criado em</th>
                <th width="100">Atualizado em</th>
                <th width="80">Situação</th>
                <th></th>
            </tr>
        </thead>
    
        <tbody>
            <? if (empty($tickets)): ?>
                <tr>
                    <td colspan="6">Nenhum ticket encontrado</td>
                </tr>
            <? else: ?>
                <? foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><a data-ajax href="<?= url_to('/support/tickets/view/' . $ticket['id']) ?>">#<?= $ticket['id'] ?></a></td>
                        <td><?= $ticket['department'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($ticket['create_date'])) ?></td>
                        <td><?= empty($ticket['update_date']) ? '' : date('d/m/Y H:i', strtotime($ticket['update_date'])) ?></td>
                        <td><?= util('MithosHelpDesk.HelpDesk')->ticketStatus($ticket['status']) ?></td>
                        <td width="10">
                            <a data-ajax href="<?= url_to('/support/tickets/view/' . $ticket['id']) ?>">View</a>
                        </td>
                    </tr>
                <? endforeach ?>
            <? endif ?>
        </tbody>
    </table>
</div>