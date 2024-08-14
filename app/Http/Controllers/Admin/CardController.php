<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.card.index');
    }

    public function create()
    {
        abort_if(Gate::denies('card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.card.create');
    }

    public function edit(Card $card)
    {
        abort_if(Gate::denies('card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.card.edit', compact('card'));
    }

    public function show(Card $card)
    {
        abort_if(Gate::denies('card_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $card->load('user', 'association', 'owner');

        return view('admin.card.show', compact('card'));
    }
}
