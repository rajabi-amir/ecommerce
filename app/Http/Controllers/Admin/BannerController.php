<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.banners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory $flasher)
    {
        $request->whenHas('is_active', function ($input) use ($request) {
            $request['is_active'] = false;
        }, function () use ($request) {
            $request['is_active'] = true;
        });

        $data = $request->validate([
            'title' => 'required|string|max:191',
            'text' => 'nullable|string|max:255',
            'is_active' => 'nullable',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
            'priority' => 'required|integer',
            'type' => 'required|string|max:255',
            'button_icon' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
            'button_text' => 'nullable|string|max:191'
        ]);

        $image_controller = new ImageController();
        $data['image'] = $image_controller->UploadeImage($request->image, "banners");

        Banner::create($data);
        $flasher->addSuccess('بنر جدید ایجاد شد');

        return redirect()->route('admin.banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.page.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner, ToastrFactory $flasher)
    {
        $request->whenHas('is_active', function ($input) use ($request) {
            $request['is_active'] = false;
        }, function () use ($request) {
            $request['is_active'] = true;
        });

        $data = $request->validate([
            'title' => 'required|string|max:191',
            'text' => 'nullable|string|max:255',
            'is_active' => 'nullable',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg',
            'priority' => 'required|integer',
            'type' => 'required|string|max:255',
            'button_icon' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
            'button_text' => 'nullable|string|max:191'
        ]);

        if (isset($request->image)) {
            if (Storage::exists('banners/' . $banner->image)) {
                Storage::delete('banners/' . $banner->image);
            }
            $image_controller = new ImageController();
            $data['image'] = $image_controller->UploadeImage($request->image, "banners");
        } else {
            $data['image'] = $banner->image;
        }
        
        $banner->update($data);
        $flasher->addSuccess('تغییرات با موفقیت ذخیره شد');

        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
