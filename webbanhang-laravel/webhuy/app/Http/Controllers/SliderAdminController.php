<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class SliderAdminController extends Controller
{
    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(4);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
    
            if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
                $file = $request->file('image_path');
                $fileNameOrigin = $file->getClientOriginalName();
                $fileNameHash = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/slider/' . auth()->id(), $fileNameHash);
                $filePath = Storage::url($path);
                $dataInsert['image_name'] = $fileNameOrigin;
                $dataInsert['image_path'] = $filePath;
            }
    
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi' .$exception->getMessage() . '---Line: ' . $exception->getFile());

        }
        
    }

    public function edit($id){
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));

    }
    public function update(Request $request, $id)
{
    try {
        $dataUpdate = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
            $file = $request->file('image_path');
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/slider/' . auth()->id(), $fileNameHash);
            $filePath = Storage::url($path);
            $dataUpdate['image_name'] = $fileNameOrigin;
            $dataUpdate['image_path'] = $filePath;
        }

        $slider = $this->slider->find($id);
        if (!$slider) {
            return redirect()->route('slider.index')->with('error', 'Slider not found.');
        }

        $this->slider->find($id)->update($dataUpdate);
        return redirect()->route('slider.index');
        } catch (\Exception $exception) {
        Log::error('Error: ' . $exception->getMessage() . ' --- Line: ' . $exception->getFile());
        return redirect()->route('slider.index')->with('error', 'Something went wrong, please try again later.');
        }
    }
    public function delete($id){
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' =>200,
                'message'=>'success'
            ], status: 200);

        } catch (\Exception $exception) {
            Log::error('Message' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
            return response()->json([
                'code' =>500,
                'message'=>'fall'
            ], status: 500);

        }
    }
    
}


