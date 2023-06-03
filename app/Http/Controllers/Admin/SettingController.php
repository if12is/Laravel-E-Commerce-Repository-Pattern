<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingUpdateRequest;
use App\Models\Setting;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        // dd($request->all());
        $setting->update($request->validated());
        if ($request->hasFile('logo')) {
            $setting->logo = ImageUpload::upload($request->logo, null, null, 'images/logo/logo-');
            $setting->save();
        }
        if ($request->hasFile('favicon')) {
            $setting->favicon = ImageUpload::upload($request->favicon, 32, 32, 'images/favicon/favicon-');
            $setting->save();
        }
        flash()
            ->translate('ar')
            ->option('position', 'bottom-center')
            ->addSuccess('Your request was processed successfully.', 'Congratulations!');
        // flash()->option('position', 'bottom-center')->addSuccess('Setting updated successfully');
        return redirect()->back();
    }
}
