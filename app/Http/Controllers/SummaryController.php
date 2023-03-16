<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\CreateAreaRequest;
use App\Http\Requests\Area\DeleteAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Http\Requests\Summary\CreateSummaryRequest;
use App\Http\Requests\Summary\DeleteSummaryRequest;
use App\Http\Requests\Summary\UpdateSummaryRequest;
use App\Http\Traits\AreaTrait;
use App\Http\Traits\SummaryTrait;
use App\Models\Area;
use App\Models\Summary;

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
        return view('Pages.Summary.index', compact('summaries'));
    }

    public function create()
    {
        return view('Pages.Summary.create');
    }

    public function store(CreateSummaryRequest $request)
    {
        $this->summaryModel::create([
            'summary' => $request->summary
        ]);
        return redirect(route('summary.index'));
    }

    public function delete(DeleteSummaryRequest $request)
    {
        $this->findSummaryById($request->id)->delete();
        return back();
    }

    public function edit(DeleteSummaryRequest $request)
    {
        $summary = $this->findSummaryById($request->id);
        return view('Pages.Summary.edit', compact('summary'));
    }

    public function update(UpdateSummaryRequest $request)
    {
        $this->findSummaryById($request->id)->update([
            'summary' => $request->summary
        ]);
        return redirect(route('summary.index'));
    }
}
