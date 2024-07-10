<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'file'];

    public function setFileAttribute($file)
    {
        if ($file) {
            $newFileName = uniqid().'_'.'blog'.'.'.$file->extension();

            $this->attributes['file'] = '/'.'asset/blog'.'/'.$newFileName;
            $this->attributes['type'] = $this->getFileType($file->extension());
            $file->move(public_path('asset/blog'), $newFileName);

            return $this->attributes['file'];
        }
    }

    private function getFileType($extension)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
        $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv'];

        if (in_array($extension, $imageExtensions)) {
            return 'image';
        } elseif (in_array($extension, $videoExtensions)) {
            return 'video';
        }

        return null;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'blog-user');
    }
}
