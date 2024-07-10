<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Interfaces\Admin\BlogInterface;

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->blog->deleteBlog($id);
    }
}
