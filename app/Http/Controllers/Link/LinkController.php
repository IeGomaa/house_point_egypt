<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\CheckLinkIdRequest;
use App\Http\Requests\Link\CreateLinkRequest;
use App\Http\Requests\Link\UpdateLinkRequest;
use App\Http\Traits\LinkTrait;
use App\Models\Link;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LinkController extends Controller
{
    use LinkTrait;
    private $linkModel;
    public function __construct(Link $link)
    {
        $this->linkModel = $link;
    }

    public function index()
    {
        $links = $this->getLinks();
        return view('pages.link.index', compact('links'));
    }

    public function create()
    {
        return view('pages.link.create');
    }

    public function store(CreateLinkRequest $request)
    {
        $this->linkModel::create([
            'link' => $request->link,
            'position' => $request->position
        ]);
        Alert::toast('Link Was Created Successfully' , 'success');
        return redirect(route('admin.link.index'));
    }

    public function delete(CheckLinkIdRequest $request)
    {
        $this->findLinkById($request->id)->delete();
        Alert::toast('Link Was Deleted Successfully' , 'success');
        return back();
    }

    public function edit(CheckLinkIdRequest $request)
    {
        $link = $this->findLinkById($request->id);
        return view('pages.link.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request)
    {
        $this->findLinkById($request->id)->update([
            'link' => $request->link,
            'position' => $request->position
        ]);
        Alert::toast('Link Was Updated Successfully' , 'success');
        return redirect(route('admin.link.index'));
    }
}
