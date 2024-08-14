<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InquiryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inquiry.index');
    }

    public function create()
    {
        abort_if(Gate::denies('inquiry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inquiry.create');
    }

    public function edit(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inquiry.edit', compact('inquiry'));
    }

    public function show(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiry->load('user', 'association', 'owner');

        return view('admin.inquiry.show', compact('inquiry'));
    }
}
