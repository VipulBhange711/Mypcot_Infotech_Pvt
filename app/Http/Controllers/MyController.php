<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class MyController extends Controller
{
    public function test()
    {
        return view('welcome');
    }

    public function AdminDash()
    {
        return view('adminDashboard');
    }

    public function CreateProject()
    {
        return view('product.createView');
    }
    public function viewList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('products')->orderBy('created_at', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('product.ListView');
    }


    public function submitProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'category_name' => 'required|string',
            'status' => 'required|boolean',
        ]);

        DB::table('products')->insert([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'category_name' => $request->category_name,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
       $data = DB::table('products')
            ->orderBy('id', 'desc')
            ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('product.test');
    }

    public function update(Request $request)
    {
       
        $request->validate([
            'id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'category_name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        DB::table('products')
            ->where('id', $request->id)
            ->update([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'category_name' => $request->category_name,
                'status' => $request->status,
                'updated_at' => now(),
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully!'
        ]);
    }
    public function destroy($id)
{

    DB::table('products')->where('id', $id)->delete();

    return response()->json([
        'success' => true,
        'message' => 'Product deleted successfully!'
    ]);
}
}
