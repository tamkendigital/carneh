<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('card_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.card-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('card_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.card-type.create');
    }

    public function edit(CardType $cardType)
    {
        abort_if(Gate::denies('card_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.card-type.edit', compact('cardType'));
    }

    public function show(CardType $cardType)
    {
        abort_if(Gate::denies('card_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardType->load('owner');

        return view('admin.card-type.show', compact('cardType'));
    }
}
