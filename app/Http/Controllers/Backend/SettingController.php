<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;
use File;

class SettingController extends Controller {

    public function edit(Request $request, $id) {
        $data['title'] = "Update Setting";
        $data['selected'] = Setting::find($id);
        return view("backend.pages.setting.edit")->with($data);
    }

    public function update(Request $request) {
        $id = $request->input("id");
        $photo1 = $request->file("pic");
        if ($photo1) {
            $ext = strtolower($photo1->getClientOriginalExtension());
        } else {
            $ext = $request->input("ext");
        }
        $photo2 = $request->file("pic2");
        if ($photo2) {
            $ext2 = strtolower($photo2->getClientOriginalExtension());
        } else {
            $ext2 = $request->input("ext2");
        }
        $arr = [
            "email" => $request->input("email"),
            "cc" => $request->input("cc"),
            "bcc" => $request->input("bcc"),
            "phone" => $request->input("phone"),
            "address" => $request->input("address"),
            "schedule" => $request->input("schedule"),
            "details" => $request->input("details"),
            "map" => $request->input("map"),
            "logo" => $ext,
            "ficon" => $ext2,
        ];
        //dd($arr);
        if (Setting::where('id', $id)->update($arr)) {
            $path1 = ("assets/images/logo/" . $id . '-' . 'logo' . '.' . $ext);
            $path2 = ("assets/images/logo/" . $id . '-' . 'ficon' . '.' . $ext2);
            $move_path1 = ("assets/images/logo/" . $id . '-' . 'logo' . '.' . $ext);
            $move_path2 = ("assets/images/logo/" . $id . '-' . 'ficon' . '.' . $ext2);
            if ($photo1) {
                if (is_file($path1)) {
                    unlink($path1);
                }
                Image::make($photo1)->resize(160, 60)->save("assets/images/logo/" . $id . '-' . 'logo' . '.' . $ext);
            } else {
                if (is_file($path1)) {
                    File::move($path1, $move_path1);
                }
            }
            if ($photo2) {
                if (is_file($path2)) {
                    unlink($path2);
                }
                Image::make($photo2)->resize(36, 36)->save("assets/images/logo/" . $id . '-' . 'ficon' . '.' . $ext2);
            } else {
                if (is_file($path2)) {
                    File::move($path2, $move_path2);
                }
            }
            return redirect()->back()->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("msg", "Some Error Occurs");
    }

}
