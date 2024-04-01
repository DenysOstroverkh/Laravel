<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function fetch()
    {
        return response()->json(['languages' => Language::all()]);
    }

    public function active()
    {
        return response()->json(['languages' => Language::whereActive(1)->get()]);
    }

    public function store(Request $request)
    {
        dd($request->all());

        $language = Language::create([
            'locale' => $request->locale,
            'name' => $request->name,
            'flag' => $request->flag,
            'active' => $request->active ? $request->active : 0,
            'translations' => $request->translations,
        ]);

        return response()->json(['language' => $language]);
    }

    public function update(Language $language, Request $request)
    {
        dd($request->all());
        
        $language->update([
            'locale' => $request->locale,
            'name' => $request->name,
            'flag' => $request->flag,
            'active' => $request->active ? $request->active : 0,
            'translations' => $request->translations,
        ]);

        return response()->json(['language' => $language]);
    }
}
