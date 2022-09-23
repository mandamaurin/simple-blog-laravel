<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;

class CategoryController extends Controller
{
    public function index()
    {
    	return view('admin.category.index');
    }

    public function getCategories(Request $request)
    {
		if ($request->ajax()) {
	        $data = Category::get();
	        return DataTables::of($data)
	            ->addIndexColumn()
	            ->addColumn('action', function($row){
	                $actionBtn = '<a href="'. route('category.edit', $row->id) .'" class="edit btn btn-success btn-sm">Edit</a>';
	                return $actionBtn;
	            })
	            ->rawColumns(['action'])
	            ->make(true);   
	    } 
    }

    public function create()
    {
    	return view('admin.category.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
    	    'name' => 'required|unique:categories',
    	    'active' => 'required',
    	]);

	    $category = new Category;
	    $category->name = $request->name;
	    $category->active = $request->active == 'on' ? 'yes' : 'no';
	    $category->user_id = \Auth::user()->id;
	    $category->save();

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
    	$data = Category::find($id);
    	return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
    	    'name' => 'required|unique:categories',
    	    'active' => 'required',
    	]);

    	$category = Category::find($id);
    	$category->name = $request->name;
    	$category->active = $request->active == 'on' ? 'yes' : 'no';
    	$category->user_id = \Auth::user()->id;
        $category->updated_at = Carbon::now();
    	$category->save();

    	return redirect()->route('category.index');
    }

    public function active($id)
    {

    }

    public function destroy($id)
    {

    }
}
