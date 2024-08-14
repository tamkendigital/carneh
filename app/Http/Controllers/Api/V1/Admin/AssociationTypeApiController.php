<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssociationTypeRequest;
use App\Http\Requests\UpdateAssociationTypeRequest;
use App\Http\Resources\Admin\AssociationTypeResource;
use App\Models\AssociationType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssociationTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('association_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssociationTypeResource(AssociationType::all());
    }

    public function store(StoreAssociationTypeRequest $request)
    {
        $associationType = AssociationType::create($request->validated());

        return (new AssociationTypeResource($associationType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AssociationType $associationType)
    {
        abort_if(Gate::denies('association_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssociationTypeResource($associationType);
    }

    public function update(UpdateAssociationTypeRequest $request, AssociationType $associationType)
    {
        $associationType->update($request->validated());

        return (new AssociationTypeResource($associationType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AssociationType $associationType)
    {
        abort_if(Gate::denies('association_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $associationType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
