<?php

namespace App\Interfaces\Admin;

interface BlogInterface
{
    public function indexBlog();

    public function createBlog();

    public function storeBlog($data);

    public function deleteBlog($id);
}
