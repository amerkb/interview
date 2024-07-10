<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Interfaces\user\BlogInterface;

class BlogController extends Controller
{
    public function __construct(protected BlogInterface $blog)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->blog->indexBlog();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->blog->createBlog();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        return $this->blog->storeBlog($request->validated());

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->blog->editBlog($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $id)
    {
        return $this->blog->updateBlog($request->validated(), $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->blog->deleteBlog($id);
    }
}
