<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TopperStudent ;
use App\Models\Admin\TopperStudentImage;

class TopperStudentImagesController extends Controller
{
    public function delete_image($id){
        $data=TopperStudentImage::find($id);
        if (!$data) {
            return redirect()->back()->withError('Image not found');
        }
        $image_path = public_path('/admin/upload/topperstudent/image/') . $data->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        $data->delete();
        }
        return redirect()->back()->withSuccess('Image deleted Successfully!!!');
    }
    
public function update_image(Request $request)
{
   
    $request->validate([
        'image_id' => 'required|exists:topper_student_images,id',
        'new_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);
    $imageId = $request->input('image_id');
    $newImage = $request->file('new_image');
    // Find the image data by ID
    $image = TopperStudentImage::findOrFail($imageId);
    // Delete the existing image file, if any
    if (!empty($image->image)) {
        $imagePath = public_path('/admin/upload/topperstudent/image/') . $image->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    // Upload the new image file
    $imageName = time() . '_' . uniqid() . '.' . $newImage->getClientOriginalExtension();
    $newImage->move(public_path('/admin/upload/topperstudent/image/'), $imageName);
    // Update the image data in the database
    $image->image = $imageName;
    $image->save();
    // Return success response
    return redirect()->back()->withSuccess('Image updated Successfully!!!');
}
}
