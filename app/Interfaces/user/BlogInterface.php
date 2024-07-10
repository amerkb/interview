<?php

namespace App\Interfaces\user;

interface BlogInterface
{
    public function indexBlog();

    public function createBlog();

    public function storeBlog($data);

    public function editBlog($id);

    public function updateBlog($data, $id);

    public function deleteBlog($id);
}
