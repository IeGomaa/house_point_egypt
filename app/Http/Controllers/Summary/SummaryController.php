<?php

namespace App\Http\Controllers\Summary;

use App\Http\Controllers\Controller;
use App\Http\Requests\Summary\CheckSummaryIdRequest;
use App\Http\Requests\Summary\CreateSummaryRequest;
use App\Http\Requests\Summary\UpdateSummaryRequest;
use App\Http\Traits\SummaryTrait;
use App\Models\Summary;
use RealRashid\SweetAlert\Facades\Alert;

class SummaryController extends Controller
{
    private $summaryModel;
    use SummaryTrait;
    public function __construct(Summary $summary)
    {
        $this->summaryModel = $summary;
    }

    public function index()
    {
        $summaries = $this->getSummaries();
        return view('pages.summary.index', compact('summaries'));
    }

    public function create()
    {
        return view('pages.summary.create');
    }

    public function store(CreateSummaryRequest $request)
    {
        $this->summaryModel::create([
            'summary' => [
                'en' => $request->summary_en,
                'ar' => $request->summary_ar,
            ]
        ]);
        Alert::toast('Summary Was Created Successfully', 'success');
        return redirect(route('admin.summary.index'));
    }

    public function delete(CheckSummaryIdRequest $request)
    {
        $this->findSummaryById($request->id)->delete();
        Alert::toast('Summary Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckSummaryIdRequest $request)
    {
        $summary = $this->findSummaryById($request->id);
        return view('pages.summary.edit', compact('summary'));
    }

    public function update(UpdateSummaryRequest $request)
    {
        $this->findSummaryById($request->id)->update([
            'summary' => [
                'en' => $request->summary_en,
                'ar' => $request->summary_ar,
            ]
        ]);
        Alert::toast('Summary Was Updated Successfully', 'success');
        return redirect(route('admin.summary.index'));
    }
}
