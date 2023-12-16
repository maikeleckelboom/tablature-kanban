<?php

namespace App\Http\Controllers\Kanban;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kanban\ColumnStoreRequest;
use App\Models\Kanban\Board;
use App\Models\Kanban\Column;
use Symfony\Component\HttpFoundation\Response;

class ColumnController extends Controller
{

    /**
     * @param ColumnStoreRequest $request
     * @param Board $board
     * @return int
     */
    public function store(ColumnStoreRequest $request, Board $board): int
    {
        $board->addColumn(Column::create($request->all()));
        return Response::HTTP_CREATED;
    }

    /**
     * @param Column $column
     * @return int
     */
    public function destroy(Column $column): int
    {
        $column->delete();
        return Response::HTTP_NO_CONTENT;
    }

    /**
     * @param ColumnStoreRequest $request
     * @param Column $column
     * @return int
     */
    public function update(ColumnStoreRequest $request, Column $column): int {
        $column->update($request->all());
        return Response::HTTP_NO_CONTENT;
    }
}
