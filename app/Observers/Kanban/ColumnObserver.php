<?php

namespace App\Observers\Kanban;

use App\Models\Kanban\Column;

class ColumnObserver
{

    public function creating(Column $column): void
    {
        $column->position = Column::where('board_id', $column->board_id)->max('position') + 1000;
    }

    public function deleting(Column $column): void
    {
        $column->cards()->delete();
    }
}
