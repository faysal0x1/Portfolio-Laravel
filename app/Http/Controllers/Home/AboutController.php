<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class
AboutController extends Controller
{
    //

    public function aboutPage()
    {
        $aboutPage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutPage'));
    }

    public function updateAbout(Request $request)
    {
        $id = $request->id;
        if ($request->file('about_image')) {
            $img = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(523, 605)->save('upload/home_about/' . $name_gen);
            $save_url = 'upload/home_about/' . $name_gen;

            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'About Page updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Page updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function HomeAbout()
    {
        $aboutPage = About::find(1);
        return view('frontend.page.about', compact('aboutPage'));
    }


    public function aboutMultiImage()
    {
        $multiImages = MultiImage::find(1);
        return view('admin.about_page.about_multi_image', compact('multiImages'));
    }

    public function storeMultiImage(Request $request)
    {

        $id = $request->id;
        $images = $request->file('multi_image');

        foreach ($images as $multi_image) {


            $img = $request->file('about_image');

            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(523, 605)->save('upload/multi_image/' . $name_gen);
            $save_url = 'upload/multi_image/' . $name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);

        }
        $notification = array(
            'message' => 'About Page updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function allMultiImage()
    {
        $multiImages = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('multiImages'));
    }


    public function editMultiImage($id)
    {
        $multiImage = MultiImage::findOrFail($id);

        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }

    public function updateMultiImage(Request $request)
    {
        $id = $request->id;
        if ($request->file('multi_image')) {


            $img = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(220, 220)->save('upload/multi_image/' . $name_gen);
            $save_url = 'upload/multi_image/' . $name_gen;

            MultiImage::findOrFail($id)->update([
                'multi_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Multi Image updated  Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.multi.image')->with($notification);
        } else {
            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Page updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function deleteMultiImage($id)
    {
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;

        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Image Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
