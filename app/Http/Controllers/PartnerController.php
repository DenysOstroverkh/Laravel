<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function create(Request $request) {
        $partner = Partner::create(['name' => $request->name,
                                        'display_name' => $request->display_name,
                                        'description' => $request->description,
                                        'position' => $request->position,
                                        'images' => $request->images,
                                        'rrss' => $request->rrss,
                                        'type' => $request->type,
                                        'link' => $request->link]);

        return response()->json(['success' => true, 'partner' => $partner]);
    }

    public function get(Partner $partner, Request $request) {
        $with = [];
        $with_count = [];
        if(request()->with) $with = explode(',', request()->with);
        if(request()->with_count) $with_count = explode(',', request()->with_count);

        $result = $partner->with($with)->withCount($with_count)->get();
        return response()->json($result);
    }

    public function update(Partner $partner, Request $request) {
        if ($partner->update(['name' => $request->name,
                              'display_name' => $request->display_name,
                              'description' => $request->description,
                              'position' => $request->position,
                              'images' => $request->images,
                              'rrss' => $request->rrss,
                              'type' => $request->type,
                              'link' => $request->link])):
            return response()->json(['success' => true, 
                                     'name' => $request->name,
                                     'display_name' => $request->display_name,
                                     'description' => $request->description,
                                     'position' => $request->position,
                                     'images' => $request->images,
                                     'rrss' => $request->rrss,
                                     'type' => $request->type,
                                     'link' => $request->link]);
        endif;

        return response()->json(['success' => false]);
    }

    public function delete(Partner $partner) {
        if ($partner->delete()):
            return response()->json(['success' => true, 'partner' => $partner]);
        endif;

        return response()->json(['success' => false]);
    }
}
