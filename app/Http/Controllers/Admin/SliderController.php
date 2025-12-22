<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'nullable|string|max:255',
            'order' => 'integer',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/sliders/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image_path'] = "$destinationPath$profileImage";
        }

        Slider::create($input);

        return redirect()->route('admin.sliders.index')
                        ->with('success', 'Slider başarıyla oluşturuldu.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'nullable|string|max:255',
            'order' => 'integer',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            // Delete old image
            if (file_exists(public_path($slider->image_path))) {
                @unlink(public_path($slider->image_path));
            }
            
            $destinationPath = 'uploads/sliders/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image_path'] = "$destinationPath$profileImage";
        } else {
            unset($input['image_path']);
        }
        
        // Handle checkbox for is_active
        $input['is_active'] = $request->has('is_active');

        $slider->update($input);

        return redirect()->route('admin.sliders.index')
                        ->with('success', 'Slider başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if (file_exists(public_path($slider->image_path))) {
            @unlink(public_path($slider->image_path));
        }
        
        $slider->delete();

        return redirect()->route('admin.sliders.index')
                        ->with('success', 'Slider başarıyla silindi.');
    }
}
