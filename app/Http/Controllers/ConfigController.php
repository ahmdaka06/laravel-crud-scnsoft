<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator;

class ConfigController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }       
    public function edit(Request $request)
    {
        $options = Config::all()->pluck('value','name');
        return view('admin.website-settings', compact('options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'meta_description' => 'required',
            'meta_author' => 'required',
            'meta_keywords' => 'required',
            'home_page_description' => 'required',
            'home_page_title' => 'required',
        ]);
        if ($request->hasFile('favicon')) {

            $file = $request->file('favicon');
            $fileArray = array('favicon' => $file);
            $rules = array(
                'favicon' => 'mimes:ico|required|' // max 10000kb
            );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                $errors = $validator->errors()->getMessages();
                return redirect()
                    ->back()
                    ->withErrors(['favicon' => $errors['favicon']]);

            } else {
                $favicon = Storage::putFile('admin/images', $request->file('favicon'));
                setConfig('favicon', $favicon);
            }

        }
        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $fileArray = array('logo' => $file);
            $rules = array(
                'logo' => 'mimes:png,jpg|required|' // max 10000kb
            );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                $errors = $validator->errors()->getMessages();
                return redirect()
                    ->back()
                    ->withErrors(['logo' => $errors['logo']]);

            } else {
                $logo = Storage::putFile('admin/images', $request->file('logo'));
                setConfig('logo', $logo);
            }

        }
        if ($request->hasFile('small_logo')) {

            $file = $request->file('small_logo');
            $fileArray = array('small_logo' => $file);
            $rules = array(
                'small_logo' => 'mimes:png,jpg|required|' // max 10000kb
            );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                $errors = $validator->errors()->getMessages();
                return redirect()
                    ->back()
                    ->withErrors(['small_logo' => $errors['small_logo']]);

            } else {
                $small_logo = Storage::putFile('admin/images', $request->file('small_logo'));
                setConfig('small_logo', $small_logo);
            }
        }
        setConfig('title', $request->input('title'));
        setConfig('meta_description', $request->input('meta_description'));
        setConfig('meta_keywords', $request->input('meta_keywords'));
        setConfig('meta_author', $request->input('meta_author'));
        setConfig('home_page_description', $request->input('home_page_description'));
        setConfig('home_page_title', $request->input('home_page_title'));
        
        return redirect('website-settings')->with('success', 'Pengaturan website berhasil !!.');
    }
}
