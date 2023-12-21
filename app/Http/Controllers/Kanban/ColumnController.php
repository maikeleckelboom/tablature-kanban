<?php

namespace App\Http\Controllers\Kanban;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kanban\ColumnStoreRequest;
use App\Http\Resources\Kanban\ColumnResource;
use App\Models\Kanban\Board;
use App\Models\Kanban\Column;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ColumnController extends Controller
{

    /**
     * @param ColumnStoreRequest $request
     * @param Board $board
     * @return JsonResponse<ColumnResource>
     */
    public function store(ColumnStoreRequest $request, Board $board): JsonResponse
    {
        $column = Column::create($request->all());
        $board->addColumn($column);
        return response()->json($column, 201);
    }

    /**
     * @param Column $column
     * @return \Illuminate\Http\Response
     */
    public function destroy(Column $column): \Illuminate\Http\Response
    {
        $column->delete();
        return response()->noContent();
    }

    /**
     * @param ColumnStoreRequest $request
     * @param Column $column
     * @return Response
     */
    public function update(ColumnStoreRequest $request, Column $column): Response
    {
        $column->update($request->validated());
        return response()->noContent();
    }
}
