<?php

namespace App\Http\Controllers\Keyword;

use App\Http\Controllers\Controller;
use App\Http\Requests\Keyword\CheckKeywordIdRequest;
use App\Http\Requests\Keyword\CreateKeywordRequest;
use App\Http\Requests\Keyword\UpdateKeywordRequest;
use App\Http\Traits\KeywordTrait;
use App\Models\Keyword;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KeywordController extends Controller
{
    use KeywordTrait;
    private $keywordModel;
    public function __construct(Keyword $keyword)
    {
        $this->keywordModel = $keyword;
    }

    public function index()
    {
        $keywords = $this->getKeywords();
        return view('pages.keyword.index', compact('keywords'));
    }

    public function create()
    {
        return view('pages.keyword.create');
    }

    public function store(CreateKeywordRequest $request)
    {
        $this->keywordModel::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar
            ],
            'keyword' => [
                'en' => $request->keyword_en,
                'ar' => $request->keyword_ar
            ],
            'tag' => [
                'en' => $request->tag_en,
                'ar' => $request->tag_ar
            ]
        ]);
        Alert::toast('Keyword Was Created Successfully' , 'success');
        return redirect(route('admin.keyword.index'));
    }

    public function delete(CheckKeywordIdRequest $request)
    {
        $this->findKeywordById($request->id)->delete();
        Alert::toast('Keyword Was Deleted Successfully' , 'success');
        return back();
    }

    public function edit(CheckKeywordIdRequest $request)
    {
        $keyword = $this->findKeywordById($request->id);
        return view('pages.keyword.edit', compact('keyword'));
    }

    public function update(UpdateKeywordRequest $request)
    {
        $this->findKeywordById($request->id)->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar
            ],
            'keyword' => [
                'en' => $request->keyword_en,
                'ar' => $request->keyword_ar
            ],
            'tag' => [
                'en' => $request->tag_en,
                'ar' => $request->tag_ar
            ]
        ]);
        Alert::toast('Keyword Was Updated Successfully' , 'success');
        return redirect(route('admin.keyword.index'));
    }
}
