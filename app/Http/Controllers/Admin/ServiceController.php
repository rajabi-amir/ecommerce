<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Flasher\Toastr\Prime\ToastrFactory;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.page.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ToastrFactory $flasher)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required|max:200',
            'icon'          => 'required',
            'service_order' => 'required',
        ]);

        $service = new Service();
        $service->title         = $request->title;
        $service->description   = $request->description;
        $service->icon          = $request->icon;
        $service->service_order = $request->service_order;
        $service->save();

        $flasher->addSuccess( 'سرویس با موفقیت ثبت شد');
        return redirect()->route('admin.services.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.page.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service ,ToastrFactory $flasher)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required|max:200',
            'icon'          => 'required',
            'service_order' => 'required',
        ]);

        $service->title         = $request->title;
        $service->description   = $request->description;
        $service->icon          = $request->icon;
        $service->service_order = $request->service_order;
        $service->save();

        $flasher->addSuccess('سرویس با موفقیت تغییر کرد');
        return redirect()->route('admin.services.index');
      


Visit::where('id', 1)->update(['visitor' => 'visitor+1']);
$ip = $_SERVER['REMOTE_ADDR'];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service,ToastrFactory $flasher)
    {
        $service->delete();

        $flasher->addSuccess('سرویس با موفقیت حذف شد');
        return back();
    }
}