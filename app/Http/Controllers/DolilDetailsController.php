<?php

namespace App\Http\Controllers;

use App\Models\DolilInformation;
use Illuminate\Http\Request;
use Validator;
class DolilDetailsController extends Controller
{
    public function index()
    {
        $dolils = DolilInformation::all();
        dd($dolils);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'name'    => 'required',
            'daag_number' => 'required',
            'mouja' => 'required',
            'khotian' => 'required'
        ];
        $messages = [
            'name.required' => 'name is required',
            'daag_number.required' => 'daag_number is required',
            'mouja.required' => 'mouja is required',
            'khotian.required' => 'khotian is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->errors()->first()){
            return response()->json([
                'message' => $validator->errors(),
                'status' => 422,
            ],422);
        }
        $name = $request->name;
        $daag_number = $request->daag_number;
        $mouja = $request->mouja;
        $khotian = $request->khotian;
        $buyer = $request->buyer;
        $seller = $request->seller;

        $dolil_store = DolilInformation::create([
            'name' => $name,
            'daag_number' => $daag_number,
            'mouja' => $mouja,
            'khotian' => $khotian,
            'buyer' => $buyer,
            'seller' => $seller
        ]);

        return response()->json([
            'success' => true,
            'status' => 200,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $rules = [
            'name'    => 'required',
            'daag_number' => 'required',
            'mouja' => 'required',
            'khotian' => 'required'
        ];
        $messages = [
            'name.required' => 'name is required',
            'daag_number.required' => 'daag_number is required',
            'mouja.required' => 'mouja is required',
            'khotian.required' => 'khotian is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->errors()->first()){
            return response()->json([
                'message' => $validator->errors(),
                'status' => 422,
            ],422);
        }

        $name = $request->name;
        $daag_number = $request->daag_number;
        $mouja = $request->mouja;
        $khotian = $request->khotian;
        $buyer = $request->buyer;
        $seller = $request->seller;

        $dolil_update = [
            'name' => $name,
            'daag_number' => $daag_number,
            'mouja' => $mouja,
            'khotian' => $khotian,
            'buyer' => $buyer,
            'seller' => $seller
        ];
        $dolil_update = DolilInformation::find($id)
            ->update($dolil_update);

        return response()->json([
            'success' => true,
            'data' => $dolil_update,
            'status' => 200,
        ]);
    }

    public function destroy($id)
    {
        $dolil_delete = DolilInformation::find($id);
        $dolil_delete->delete();
        return response()->json([
            'message' => 'Deleted',
            'status' => 200,
        ]);
    }

    public function search_dolil(Request $request)
    {
        $search_key = $request->search_key;

        $search_results = DolilInformation::where('id', $search_key)
            ->orWhere('name', 'like', $search_key)
            ->orWhere('daag_number', 'like', $search_key)
            ->orWhere('mouja', 'like', $search_key)
            ->orWhere('khotian', 'like', $search_key)
            ->orWhere('buyer', 'like', $search_key)
            ->orWhere('seller', 'like', $search_key)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $search_results,
            'status' => 200,
        ]);
    }
}
