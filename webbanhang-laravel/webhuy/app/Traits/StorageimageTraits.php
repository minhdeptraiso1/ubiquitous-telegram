<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageimageTraits
{
    public function storageTraitUpload($request, $fieldName, $foderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            
            // Kiểm tra file có hợp lệ không
            if (!$file->isValid()) {
                throw new \Exception('File upload không hợp lệ');
            }
            
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            
            // Tạo thư mục nếu chưa tồn tại
            $folder = 'public/product/' . $foderName . '/' . auth()->id();
            
            $filePath = $request->file($fieldName)->storeAs($folder, $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }

    public function storageTraitUploadMutiple( $file, $foderName)
    {
        // Kiểm tra file có hợp lệ không
        if (!$file->isValid()) {
            throw new \Exception('File upload không hợp lệ: ' . $file->getClientOriginalName());
        }
        
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
        
        // Tạo thư mục nếu chưa tồn tại  
        $folder = 'public/' . $foderName . '/' . auth()->id();
        
        $filePath = $file->storeAs($folder, $fileNameHash);
        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadTrait;
    }
    }