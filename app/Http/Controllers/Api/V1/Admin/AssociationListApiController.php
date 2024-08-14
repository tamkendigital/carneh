<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreAssociationListRequest;
use App\Http\Requests\UpdateAssociationListRequest;
use App\Http\Resources\Admin\AssociationListResource;
use App\Models\AssociationList;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssociationListApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('association_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssociationListResource(AssociationList::with(['associationType', 'owner'])->get());
    }

    public function store(StoreAssociationListRequest $request)
    {
        $associationList = AssociationList::create($request->validated());

        if ($request->input('association_list_association_logo', false)) {
            $associationList->addMedia(storage_path('tmp/uploads/' . basename($request->input('association_list_association_logo'))))->toMediaCollection('association_list_association_logo');
        }

        return (new AssociationListResource($associationList))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AssociationList $associationList)
    {
        abort_if(Gate::denies('association_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssociationListResource($associationList->load(['associationType', 'owner']));
    }

    public function update(UpdateAssociationListRequest $request, AssociationList $associationList)
    {
        $associationList->update($request->validated());

        if ($request->input('association_list_association_logo', false)) {
            if (! $associationList->association_list_association_logo || $request->input('association_list_association_logo') !== $associationList->association_list_association_logo->file_name) {
                if ($associationList->association_list_association_logo) {
                    $associationList->association_list_association_logo->delete();
                }
                $associationList->addMedia(storage_path('tmp/uploads/' . basename($request->input('association_list_association_logo'))))->toMediaCollection('association_list_association_logo');
            }
        } elseif ($associationList->association_list_association_logo) {
            $associationList->association_list_association_logo->delete();
        }

        return (new AssociationListResource($associationList))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AssociationList $associationList)
    {
        abort_if(Gate::denies('association_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $associationList->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
