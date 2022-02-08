<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
Use Session;

class SettingController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $settings = Setting::first();
        return view('admin.setting.index',compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $setting = Setting::first();
        $setting->title = $request->title;
        $setting->subtitle = $request->subtitle;
        $setting->description = $request->description;
        $setting->save();

        Session::flash('success','Изменения успешно применены');

        return redirect()->back();
        return view('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
