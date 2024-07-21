<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Intervention\Image\Laravel\Facades\Image;
class FileService
{

    public function fileUpload($path, $file)
    {
        try {
            $store_path = Storage::disk('local')->put('public/' . $path, $file, 'public');
            return str_replace("public/", "storage/", $store_path);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function fileDelete($path)
    {
        try {
            if ($path != NULL && file_exists(public_path($path))) {
                return Storage::disk('local')->delete('public/' . str_replace('storage/', '', $path));
            }
            return false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function downloadFile($path)
    {
        // Specify the file path
        $filePath = public_path($path);
        // Check if the file exists
        if (file_exists($filePath)) {
            // Return the file as a download response
            return response()->download($filePath);
        } else {
            // If the file doesn't exist, return a 404 response
            abort(404);
        }
    }
    public function downloadZip($fileName, $files)
    {
        $zip = new ZipArchive();
        if ($zip->open($fileName, ZipArchive::CREATE) == TRUE) {
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }

        return response()->download($fileName);
    }
    public function makeDirectory($path): void
    {
        try {
            // Define the directory path
            $directoryPath = public_path($path);

            // Check if the directory exists
            if (!File::exists($directoryPath)) {
                // If it doesn't exist, create the directory
                File::makeDirectory($directoryPath, 0777, true, true);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @param $mergedImageName merged image save name
     * @param $firstImage first image merge with public_path
     * @param $imagePaths other images path with public_path
     */
    public function mergeImages($mergedImageName, $firstImage, array $imagePaths)
    {
        // Load the first image
        $baseImage = Image::read($firstImage);
        
        $rmoveFirstImage = $imagePaths;
        array_shift($rmoveFirstImage);

        // Initialize the height of the resulting image
        $totalHeight = $baseImage->height();

        // Calculate the total height by adding the heights of all images
        foreach ($rmoveFirstImage as $path) {
            $img = Image::read($path);
            $totalHeight += $img->height();
        }
        // Create a new empty image with the combined height
        $mergedImage = Image::create($baseImage->width(), $totalHeight);

        // Paste the base image at the top
        $mergedImage->place($baseImage);

        // Paste each image below the previous one
        $currentHeight = $baseImage->height();
        foreach ($rmoveFirstImage as $path) {
            $img = Image::read($path);
            $mergedImage->place($img, 'top-left', 0, $currentHeight);
            $currentHeight += $img->height();
        }

        // Save the merged image
        $mergedImagePath = public_path('storage/pdf/images/'.$mergedImageName);
        $mergedImage->save($mergedImagePath);

        foreach ($imagePaths as $path) {
            $newPath = str_replace(public_path(), '', $path);
            $this->fileDelete($newPath);
        }
    }
}
