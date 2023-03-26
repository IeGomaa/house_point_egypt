<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CheckBlogIdRequest;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Http\Services\Blog\BlogCheckImageService;
use App\Http\Services\Blog\BlogDeleteImageService;
use App\Http\Services\Blog\BlogUploadImageService;
use App\Http\Traits\BlogTrait;
use App\Models\Blog;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    private $blogModel;
    use BlogTrait;
    public function __construct(Blog $blog)
    {
        $this->blogModel = $blog;
    }

    public function index()
    {
        $blogs = $this->getBlogs();
        return view('pages.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('pages.blog.create');
    }

    public function store(CreateBlogRequest $request, BlogUploadImageService $service)
    {
        $image_name = $service->uploadImage($request->image);
        $this->blogModel::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name
        ]);
        Alert::toast('Blog Was Created Successfully', 'success');
        return redirect(route('admin.blog.index'));
    }

    public function delete(CheckBlogIdRequest $request, BlogDeleteImageService $service)
    {
        $blog = $this->findBlogById($request->id);
        $service->deleteImageInLocal($blog->image);
        $blog->delete();
        Alert::toast('Blog Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckBlogIdRequest $request)
    {
        $blog = $this->findBlogById($request->id);
        return view('pages.blog.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, BlogCheckImageService $service)
    {
        $blog = $this->findBlogById($request->id);
        $image_name = $service->checkImage($request->image, $blog);
        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name
        ]);
        Alert::toast('Blog Was Updated Successfully', 'success');
        return redirect(route('admin.blog.index'));
    }
}
