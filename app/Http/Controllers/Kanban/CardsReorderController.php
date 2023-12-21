<?php

namespace App\Http\Controllers\Kanban;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kanban\CardsReorderRequest;
use App\Models\Kanban\Card;
use Illuminate\Http\Response;

class CardsReorderController extends Controller
{
    public function __invoke(CardsReorderRequest $request): Response
    {
        $validated = $request->validated();

        $data = collect($validated['columns'])
            ->map(fn($column) => collect($column['cards'])
                ->map(fn($card) => [
                    'id' => $card['id'],
                    'position' => $card['position'],
                    'column_id' => $column['id']]))
            ->flatten(1)
            ->toArray();

        Card::query()->upsert(
            $data,
            ['id'],
            ['position', 'column_id']
        );

        return response()->noContent();
    }
}
