<?php

namespace App\Http\Controllers\Kanban;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kanban\ColumnsReorderRequest;
use App\Models\Kanban\Column;
use Illuminate\Http\Response;

class ColumnsReorderController extends Controller
{
    public function __invoke(ColumnsReorderRequest $request): Response
    {
        $validated = $request->validated();

        $data = collect($validated['columns'])
            ->map(fn($column) => [
                'id' => $column['id'],
                'position' => $column['position'],
                'board_id' => $validated['id']
            ])
            ->toArray();

        Column::query()->upsert(
            $data,
            ['id'],
            ['position', 'board_id']
        );

        return response()->noContent();
    }
}
