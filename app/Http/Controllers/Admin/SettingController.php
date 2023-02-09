<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\File;



class SettingController extends Controller
{
    public function index(){
        $setting = Setting::find(1);
        return view('admin.setting.index',compact('setting'));
    }

    public function savedata(Request $request){
        $validator = Validator::make($request->all() , [
            'website_name' =>'required|max:255',
            'website_logo' =>'required',
            'website_favicon' =>'nullable',
            'description' =>'nullable',
            'meta_title' =>'required|max:255',
            'meta_keyword' =>'nullable',
            'meta_description' =>'nullable'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $setting = Setting::where('id', '1')->first();
        if($setting){
            $setting->website_name  = $request->website_name;

            if($request->hasfile('website_logo')){

                $destination = 'uploads/setting/' . $setting->logo;
                if(File::exists($destination)){
                    File::delete($destination);
                }

                $file = $request->file('website_logo');
                $file_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/setting/' , $file_name);
                $setting->logo = $file_name ;
            }

            if($request->hasfile('website_favicon')){

                $destination = 'uploads/setting/' . $setting->favicon;
                if(File::exists($destination)){
                    File::delete($destination);
                }


                $file = $request->file('website_favicon');
                $file_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/setting/' , $file_name);
                $setting->favicon = $file_name ;
            }


            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            $setting->description = $request->description;
            $setting->meta_keywords = $request->meta_keyword;

            $setting->save();

            return redirect('admin/setting')->with('message','Setting Updated Successfully');
        }else{
            $setting = new Setting;
            $setting->website_name  = $request->website_name;

            if($request->hasfile('website_logo')){
                $file = $request->file('website_logo');
                $file_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/setting/' , $file_name);
                $setting->logo = $file_name ;
            }

            if($request->hasfile('website_favicon')){
                $file = $request->file('website_favicon');
                $file_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/setting/' , $file_name);
                $setting->favicon = $file_name ;
            }


            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            $setting->description = $request->description;
            $setting->meta_keywords = $request->meta_keyword;

            $setting->save();

            return redirect('admin/setting')->with('message','Setting Added Successfully');
        }
    }
}