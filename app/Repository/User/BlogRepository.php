<?php

namespace App\Repository\User;

use App\Abstract\BaseRepositoryImplementation;
use App\Interfaces\user\BlogInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogRepository extends BaseRepositoryImplementation implements BlogInterface
{
    public function model()
    {
        return Blog::class;
    }

    public function indexBlog()
    {
        $user=Auth::user();
        $data['blogs'] = $user->blogs;
        return view('page.user.index', $data);
    }

    public function createBlog()
    {
        return view('page.user.create');
    }

    public function storeBlog($data)
    {
        $blog=$this->create($data);
        $blog->users()->attach(Auth::id());


        return redirect()->route('blog.index');

    }

    public function editBlog($id)
    {
        $data['blog'] = $this->getById($id);

        return view('page.user.edit', $data);
    }

    public function updateBlog($data, $id)
    {
        if (isset($data['file'])) {
            Storage::delete(public_path($data['file']));

        }

        $this->updateById($id, $data);

        return redirect()->route('blog.index');
    }

    public function deleteBlog($id)
    {
        $blog = $this->getById($id);
        if (isset($blog['file'])) {
            Storage::delete(public_path($blog['file']));

        }
        $this->deleteById($id);

        return redirect()->route('blog.index');
    }
}
