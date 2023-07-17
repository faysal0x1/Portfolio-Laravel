<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    //
    public function homeSlider()
    {
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide', compact('homeslide'));
    }

    public function updateSlider(Request $request)
    {
        $id = $request->id;

        if ($request->file('home_slide')) {
            $img = $request->file('home_slide');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/' . $name_gen;
            HomeSlide::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,
            ]);

            $notification = array(
                'message' => 'Home Slide updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } else {
            HomeSlide::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slide updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

        // return view('admin.home_slide.home_slide', compact('homeslide'));
    }
}
