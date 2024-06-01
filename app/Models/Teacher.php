<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    private static $teacher, $image, $imageUrl, $directory, $imageName;

    public static function imageUpload($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = 'upload/teacher-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newTeacher($request)
    {
        if ($request->file('image'))
        {
            self::$imageUrl = self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = null;
        }
        self::saveBasicInfo(new Teacher(), $request, self::$imageUrl);
    }

    public static function updateTeacher($request, $id)
    {
        self::$teacher = Teacher::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$teacher->image))
            {
                unlink(self::$teacher->image);
            }
            self::$imageUrl = self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = self::$teacher->image;
        }
        self::saveBasicInfo(self::$teacher, $request, self::$imageUrl);
    }

    public static function deleteTeacher($id)
    {
        self::$teacher = Teacher::find($id);
        if (file_exists(self::$teacher->image))
        {
            unlink(self::$teacher->image);
        }
        self::$teacher->delete();
    }

    private static function saveBasicInfo($teacher, $request, $imageUrl)
    {
        $teacher->category_id = $request->category_id;
        $teacher->name        = $request->name;
        $teacher->email       = $request->email;
        if ($request->password)
        {
            $teacher->password    = bcrypt($request->password);
        }
        $teacher->mobile      = $request->mobile;
        $teacher->image       = $imageUrl;
        $teacher->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
