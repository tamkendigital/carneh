<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssociationList;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssociationListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('association_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.association-list.index');
    }

    public function create()
    {
        abort_if(Gate::denies('association_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.association-list.create');
    }

    public function edit(AssociationList $associationList)
    {
        abort_if(Gate::denies('association_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.association-list.edit', compact('associationList'));
    }

    public function show(AssociationList $associationList)
    {
        abort_if(Gate::denies('association_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $associationList->load('associationType', 'owner');

        return view('admin.association-list.show', compact('associationList'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['association_list_create', 'association_list_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new AssociationList();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
