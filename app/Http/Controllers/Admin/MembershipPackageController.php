<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipPackage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MembershipPackageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership-package.index');
    }

    public function create()
    {
        abort_if(Gate::denies('membership_package_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership-package.create');
    }

    public function edit(MembershipPackage $membershipPackage)
    {
        abort_if(Gate::denies('membership_package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership-package.edit', compact('membershipPackage'));
    }

    public function show(MembershipPackage $membershipPackage)
    {
        abort_if(Gate::denies('membership_package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipPackage->load('membershipType', 'cardType', 'owner');

        return view('admin.membership-package.show', compact('membershipPackage'));
    }
}
