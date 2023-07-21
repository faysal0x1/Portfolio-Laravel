<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function AllPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    }

    public function AddPortfolio()
    {
        return view('admin.portfolio.portfolio_add',);
    }

    public function StorePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ], [
            'portfolio_name.required' => 'Please Input Portfolio Name',
            'title.required' => 'Please Input Portfolio Title',
            'description.required' => 'Please Input Portfolio Description',
        ]);

        if ($request->file('image')) {
            $img = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(1020, 519)->save('upload/Portfolio_data/' . $name_gen);
            $save_url = 'upload/Portfolio_data/' . $name_gen;

            Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Portfolio Data updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            Portfolio::insert([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'Portfolio Data updated Without Image Successfully',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function editPortfolio($id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));
    }

    public function UpdatePortfolio(Request $request)
    {

        $id = $request->id;
        if ($request->file('image')) {
            $img = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(1020, 519)->save('upload/portfolio_data/' . $name_gen);
            $save_url = 'upload/portfolio_data/' . $name_gen;

            Portfolio::findOrFail($id)->update([
                'portfolio_name' => $request->portfolio_name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Portfolio Data updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Portfolio::findOrFail($id)->update([
                'portfolio_name' => $request->portfolio_name,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Home Slide updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.portfolio')->with($notification);
        }
    }

    public function deletePortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function PortfolioDetails($id)
    {
        $portfolio = Portfolio::find($id);

        return view('frontend.portfolio.portfolio_details', compact('portfolio'));
    }
}
