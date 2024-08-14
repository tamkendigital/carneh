<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembershipTypeRequest;
use App\Http\Requests\UpdateMembershipTypeRequest;
use App\Http\Resources\Admin\MembershipTypeResource;
use App\Models\MembershipType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MembershipTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipTypeResource(MembershipType::with(['owner'])->get());
    }

    public function store(StoreMembershipTypeRequest $request)
    {
        $membershipType = MembershipType::create($request->validated());

        return (new MembershipTypeResource($membershipType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MembershipType $membershipType)
    {
        abort_if(Gate::denies('membership_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipTypeResource($membershipType->load(['owner']));
    }

    public function update(UpdateMembershipTypeRequest $request, MembershipType $membershipType)
    {
        $membershipType->update($request->validated());

        return (new MembershipTypeResource($membershipType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MembershipType $membershipType)
    {
        abort_if(Gate::denies('membership_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
