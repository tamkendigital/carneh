<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIdentityVerificationRequest;
use App\Http\Requests\UpdateIdentityVerificationRequest;
use App\Http\Resources\Admin\IdentityVerificationResource;
use App\Models\IdentityVerification;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IdentityVerificationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('identity_verification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdentityVerificationResource(IdentityVerification::with(['user', 'owner'])->get());
    }

    public function store(StoreIdentityVerificationRequest $request)
    {
        $identityVerification = IdentityVerification::create($request->validated());

        return (new IdentityVerificationResource($identityVerification))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IdentityVerification $identityVerification)
    {
        abort_if(Gate::denies('identity_verification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdentityVerificationResource($identityVerification->load(['user', 'owner']));
    }

    public function update(UpdateIdentityVerificationRequest $request, IdentityVerification $identityVerification)
    {
        $identityVerification->update($request->validated());

        return (new IdentityVerificationResource($identityVerification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IdentityVerification $identityVerification)
    {
        abort_if(Gate::denies('identity_verification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identityVerification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
