<?php

namespace App\Http\Controllers\Kanban;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kanban\CardStoreRequest;
use App\Models\Kanban\Card;
use App\Models\Kanban\Column;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CardController extends Controller
{
    /**
     * @param CardStoreRequest $request
     * @param Column $column
     * @return JsonResponse
     */
    public function store(CardStoreRequest $request, Column $column): JsonResponse
    {
        $card = Card::create($request->all());
        $column->addCard($card);
        return response()->json($card, 201);
    }

    /**
     * @param CardStoreRequest $request
     * @param Card $card
     * @return Response
     */
    public function update(CardStoreRequest $request, Card $card): Response
    {
        $request->validateResolved();
        $card->update($request->validated());
        return response()->noContent();
    }

    /**
     * @param Card $card
     * @return Response
     */
    public function destroy(Card $card): Response
    {
        $card->delete();
        return response()->noContent();
    }
}
