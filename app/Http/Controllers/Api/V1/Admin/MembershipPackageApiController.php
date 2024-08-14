<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembershipPackageRequest;
use App\Http\Requests\UpdateMembershipPackageRequest;
use App\Http\Resources\Admin\MembershipPackageResource;
use App\Models\MembershipPackage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MembershipPackageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipPackageResource(MembershipPackage::with(['membershipType', 'cardType', 'owner'])->get());
    }

    public function store(StoreMembershipPackageRequest $request)
    {
        $membershipPackage = MembershipPackage::create($request->validated());
        $membershipPackage->membershipType()->sync($request->input('membershipType', []));
        $membershipPackage->cardType()->sync($request->input('cardType', []));

        return (new MembershipPackageResource($membershipPackage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MembershipPackage $membershipPackage)
    {
        abort_if(Gate::denies('membership_package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipPackageResource($membershipPackage->load(['membershipType', 'cardType', 'owner']));
    }

    public function update(UpdateMembershipPackageRequest $request, MembershipPackage $membershipPackage)
    {
        $membershipPackage->update($request->validated());
        $membershipPackage->membershipType()->sync($request->input('membershipType', []));
        $membershipPackage->cardType()->sync($request->input('cardType', []));

        return (new MembershipPackageResource($membershipPackage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MembershipPackage $membershipPackage)
    {
        abort_if(Gate::denies('membership_package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipPackage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
