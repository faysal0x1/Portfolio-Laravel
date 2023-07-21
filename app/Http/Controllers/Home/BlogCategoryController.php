<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Exception;
use Illuminate\Http\Request;

/**
 * Class BlogCategoryController
 * This is the model class for table "blog_categories".
 */
class BlogCategoryController extends Controller
{
    public function blogCategory()
    {
        $blog = BlogCategory::latest()->get();

        return view('admin.blog-category.blog_category_all', compact('blog'));
    }

    public function addBlogCategory()
    {


        return view('admin.blog-category.blog_category_add',);
    }

    public function storeBlogCategory(Request $request)
    {

        $request->validate([
            'category' => 'required',
        ], [
            'category.required' => 'Please Input Category Name',
        ]);

        BlogCategory::insert([
            'category' => $request->category,
        ]);

        $notification = array(
            'message' => 'Category Name Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }


    public function editBlogCategory($id)
    {
        $blog = BlogCategory::findOrFail($id);
        return view('admin.blog-category.blog_category_edit', compact('blog'));
    }

    public function updateBlogCategory(Request $request)
    {
        $id = $request->id;

        BlogCategory::findOrFail($id)->update([
            'category' => $request->category,
        ]);

        $notification = array(
            'message' => 'Portfolio Data updated With Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function deleteBlogCategory($id)
    {
        try {
            BlogCategory::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Blog Category Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog.category')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->route('all.blog.category')->with($notification);
        }
    }
}
