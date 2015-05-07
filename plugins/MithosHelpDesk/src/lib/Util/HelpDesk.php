<?php

namespace MithosHelpDesk\Util;

class HelpDesk {

    public static function ticketStatus($status) {
        switch ($status) {
            case 1: return '<span class="ticket-status-p">Pendente</span>'; break;
            case 2: return '<span class="ticket-status-a">Em andamento</span>'; break;
            case 3: return '<span class="ticket-status-c">Concluído</span>'; break;
            case 4: return '<span class="ticket-status-r">Cancelado</span>'; break;
        }
    }

}