<?php

namespace App\Http\Controllers\Kanban;

use App\Http\Controllers\Controller;
use App\Http\Resources\Kanban\BoardResource;
use App\Models\Kanban\Board;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BoardController extends Controller
{
    /**
     * @return AnonymousResourceCollection<BoardResource>
     */
    public function index(): AnonymousResourceCollection
    {
        $boards = Board::all()->loadMissing(['columns.cards']);
        return BoardResource::collection($boards);
    }

    /**
     * @param Request $request
     * @param Board $board
     * @return BoardResource
     */
    public function show(Request $request, Board $board): BoardResource
    {
        if (!$board->exists) {
            $board = $request->user()?->boards()->first();
        }

        $board?->loadMissing(['columns.cards']);

        return BoardResource::make($board);
    }

    /**
     * @param Request $request
     * @param Board $board
     * @return BoardResource
     */
    public function store(Request $request, Board $board): BoardResource
    {
        $board->fill($request->all());
        $board->save();

        return BoardResource::make($board);
    }

    /**
     * @param Request $request
     * @param Board $board
     * @return BoardResource
     */
    public function destroy(Request $request, Board $board): BoardResource
    {
        $board->delete();

        return BoardResource::make($board);
    }
}
