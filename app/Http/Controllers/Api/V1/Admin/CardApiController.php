<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Card;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CardResource(Card::with(['user', 'association', 'owner'])->get());
    }

    public function store(StoreCardRequest $request)
    {
        $card = Card::create($request->validated());

        return (new CardResource($card))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Card $card)
    {
        abort_if(Gate::denies('card_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CardResource($card->load(['user', 'association', 'owner']));
    }

    public function update(UpdateCardRequest $request, Card $card)
    {
        $card->update($request->validated());

        return (new CardResource($card))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Card $card)
    {
        abort_if(Gate::denies('card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $card->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
