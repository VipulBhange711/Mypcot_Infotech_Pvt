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
        $data = DB::table('products')->select('*');

        return DataTables::of($data)
            ->addColumn('status', function ($row) {
                return $row->status == 1
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) {
                $editBtn = '<a href="'.route('edit.product', $row->id).'" class="btn btn-sm btn-primary">Edit</a>';
                $deleteBtn = '<button type="button" data-id="'.$row->id.'" class="btn btn-sm btn-danger deleteBtn">Delete</button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['status', 'action']) // allow HTML
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
}
