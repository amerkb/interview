<?php

namespace App\Repository\Admin;

use App\Abstract\BaseRepositoryImplementation;
use App\Interfaces\Admin\BlogInterface;
use App\Models\Blog;
use App\Models\User;
use App\Statuses\UserStatus;
use Illuminate\Support\Facades\Storage;

class BlogRepository extends BaseRepositoryImplementation implements BlogInterface
{
    public function model()
    {
        return Blog::class;
    }

    public function indexBlog()
    {
        $this->with = ['users'];
        $data['blogs'] = $this->all();

        return view('page.admin.blog.index', $data);
    }

    public function createBlog()
    {
        $data['users'] = User::where('role', UserStatus::USER)->get();

        return view('page.admin.blog.create', $data);

    }

    public function storeBlog($data)
    {
        $blog = $this->create($data);
        $blog->users()->sync($data['users']);

        return redirect()->route('admin.blog.index');
    }

    public function deleteBlog($id)
    {
        $blog = $this->getById($id);
        if (isset($blog['file'])) {
            Storage::delete(public_path($blog['file']));

        }
        $this->deleteById($id);

        return redirect()->route('admin.blog.index');
    }
}
