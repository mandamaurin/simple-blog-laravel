<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;

class TagController extends Controller
{
        public function index()
        {
        	return view('admin.tag.index');
        }

        public function getTags(Request $request)
        {
    		if ($request->ajax()) {
    	        $data = Tag::get();
    	        return DataTables::of($data)
    	            ->addIndexColumn()
    	            ->addColumn('action', function($row){
    	                $actionBtn = '<a href="'. route('tag.edit', $row->id) .'" class="edit btn btn-success btn-sm">Edit</a>';
    	                return $actionBtn;
    	            })
    	            ->rawColumns(['action'])
    	            ->make(true);   
    	    } 
        }

        public function create()
        {
        	return view('admin.tag.create');
        }

        public function store(Request $request)
        {
        	$request->validate([
        	    'name' => 'required|unique:tags',
        	]);

    	    $tag = new tag;
    	    $tag->name = $request->name;
    	    $tag->user_id = \Auth::user()->id;
    	    $tag->save();

            return redirect()->route('tag.index');
        }

        public function edit($id)
        {
        	$data = Tag::find($id);
        	return view('admin.tag.edit', compact('data'));
        }

        public function update(Request $request, $id)
        {
        	$request->validate([
        	    'name' => 'required|unique:tags',
        	]);

        	$tag = Tag::find($id);
        	$tag->name = $request->name;
        	$tag->user_id = \Auth::user()->id;
            $tag->updated_at = Carbon::now();
        	$tag->save();

        	return redirect()->route('tag.index');
        }

        public function active($id)
        {

        }

        public function destroy($id)
        {

        }
}
