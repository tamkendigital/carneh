<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MembershipTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('membership_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership-type.create');
    }

    public function edit(MembershipType $membershipType)
    {
        abort_if(Gate::denies('membership_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership-type.edit', compact('membershipType'));
    }

    public function show(MembershipType $membershipType)
    {
        abort_if(Gate::denies('membership_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipType->load('owner');

        return view('admin.membership-type.show', compact('membershipType'));
    }
}
