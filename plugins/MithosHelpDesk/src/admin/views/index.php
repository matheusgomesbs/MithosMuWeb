<table data-table class="list">
    <thead>
        <tr>
            <th width="40">#</th>
            <th width="70">Usuário</th>
            <th>Departamento</th>
            <th width="130">Criado em</th>
            <th width="90">Situação</th>
            <th width="10"></th>
        </tr>
    </thead>
    
    <tbody>
        <? foreach ($tickets as $ticket): ?>
            <tr>
                <td><?= $ticket['id'] ?></td>
                <td><a data-name="account<?= $ticket['account'] ?>" title="Usuário: <?= $ticket['account'] ?>" data-window href="<?= url_to('/admin/accounts/edit/' . $ticket['account']) ?>"><?= $ticket['account'] ?></a></td>
                <td><?= $ticket['department'] ?></td>
                <td><?= date('d/m/Y H:i', strtotime($ticket['create_date'])) ?></td>
                <td><?= util('MithosHelpDesk.HelpDesk')->ticketStatus($ticket['status']) ?></td>
                <td class="record-actions">
                    <a class="button" data-window data-window-width="500" data-window-height="600" data-name="tickets.view.<?= $ticket['id'] ?>" title="Ticket #<?= $ticket['id'] ?>" href="<?= url_to('/admin/helpdesk/tickets/view/' . $ticket['id']) ?>">Visualizar</a>
                </td>
            </tr>
        <? endforeach ?>
    </tbody>
</table>