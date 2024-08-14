<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IdentityVerification;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IdentityVerificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('identity_verification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.identity-verification.index');
    }

    public function create()
    {
        abort_if(Gate::denies('identity_verification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.identity-verification.create');
    }

    public function edit(IdentityVerification $identityVerification)
    {
        abort_if(Gate::denies('identity_verification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.identity-verification.edit', compact('identityVerification'));
    }

    public function show(IdentityVerification $identityVerification)
    {
        abort_if(Gate::denies('identity_verification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identityVerification->load('user', 'owner');

        return view('admin.identity-verification.show', compact('identityVerification'));
    }
}
