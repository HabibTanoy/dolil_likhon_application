<?php

namespace App\Http\Controllers;

use App\Models\DolilInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class DolilDetailsController extends Controller
{
    public function index(Request $request)
    {
            if ($request->ajax()) {
                $data = DolilInformation::select('*');
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                        return $btn;
                    })
                    ->addColumn('action', function ($dolil) {
                        return "<div class='row'>".
                            "<a class='btn btn-info m-1' href='". route('dolil-edit', $dolil->id) ."'><i class='fas fa-eye'></i></a>".
                            "<a class='btn btn-primary m-1' href='". route('dolil-edit', $dolil->id) ."'><i class='fas fa-edit'></i></a>" .
                            "<a class='btn btn-danger m-1' href='". route('dolil-delete', $dolil->id) ."'><i class='fas fa-trash'></i></a>". "</div>";
                    })
                    ->editColumn('created_at', function ($dolil) {
                        return Carbon::parse($dolil->created_at)->format('Y-m-d');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('frontend.dolil_list');
    }

    public function home()
    {
        $total_saved = DolilInformation::count();
        $total_this_month = DolilInformation::where('created_at', '>=', Carbon::now()->startOfMonth()->toDateString())
            ->where('created_at', '<=', Carbon::now()->endOfMonth()->toDateString())
            ->count();
        return view('frontend.index', compact('total_saved', 'total_this_month'));
    }

    public function create()
    {
        return view('frontend.create');
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

        return redirect()->route('dolil-list');
    }

    public function edit($id, Request $request)
    {
        $dolil = DolilInformation::find($id);
        return view('frontend.edit', compact('dolil'));
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

        return redirect()->route('dolil-list');
    }

    public function destroy($id)
    {
        $dolil_delete = DolilInformation::find($id);
        $dolil_delete->delete();

        return redirect()->route('dolil-list');
    }

//    public function search_dolil(Request $request)
//    {
//        $search_key = $request->search_key;
//
//        $search_results = DolilInformation::where('id', $search_key)
//            ->orWhere('name', 'like', $search_key)
//            ->orWhere('daag_number', 'like', $search_key)
//            ->orWhere('mouja', 'like', $search_key)
//            ->orWhere('khotian', 'like', $search_key)
//            ->orWhere('buyer', 'like', $search_key)
//            ->orWhere('seller', 'like', $search_key)
//            ->get();
//
//        return response()->json([
//            'success' => true,
//            'data' => $search_results,
//            'status' => 200,
//        ]);
//    }
}
