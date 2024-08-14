<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssociationType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssociationTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('association_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.association-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('association_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.association-type.create');
    }

    public function edit(AssociationType $associationType)
    {
        abort_if(Gate::denies('association_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.association-type.edit', compact('associationType'));
    }

    public function show(AssociationType $associationType)
    {
        abort_if(Gate::denies('association_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.association-type.show', compact('associationType'));
    }
}
