<?php

namespace App\Observers\Kanban;

use App\Models\Kanban\Card;

class CardObserver
{
    public function creating(Card $card)
    {
        $card->position = Card::where('column_id', $card->column_id)->max('position') + 1000;
    }
}
