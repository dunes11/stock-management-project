<?php

namespace App\Http\Controllers;

use App\Models\leads;
use App\Models\license;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class searchController extends Controller
{
    public function headerSearch(Request $request)
    {
        // dd($request->all());
        if ($request->type == 'licKey') {
            if (Str::length($request->search) < 12) {
                return redirect()->back()->with('error', 'invalid key length.');
            };
        }

        $data = match ($request->type) {
            'leadId' => leads::where('id', 'LIKE', "%" . $request->search . "%")
                ->orWhere('name', 'LIKE', "%" . $request->search . "%")
                ->orWhere('email', 'LIKE', "%" . $request->search . "%")
                ->orWhere('mobile', 'LIKE', "%" . $request->search . "%")
                ->with('accManager')
                ->get(),
            'licKey' => license::where('key',  'LIKE', "%" . $request->search . "%")
                ->with('lead')
                ->get(),
            default =>  false,
        };
        if ($data->count() == 0) {
            return redirect()->back()->with('warning', 'No record found ?');
        }

        if ($request->type == 'licKey') {
            $leads = leads::Where('id', $data[0]->lead->id)->with('accManager')->get();
        } else {
            $leads = $data;
        }
        // dd($leads);
        return view('search.view', compact('leads'));
    }
}
