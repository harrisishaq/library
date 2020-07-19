<?php

namespace App\Http\Controllers\MData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MData\Library;

class LibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function rules($id = false)
    {
        return  [
            'name' => 'required',
            'status' => 'required',
        ];
    }

    public function show()
    {
        $library = Library::all();
        
        return view('mdata.library.index', ['data'=> $library]);
    }

    public function add()
    {
        return view('mdata.library.add-edit', ['edit'=> false]);
    }

    public function create(Request $request)
    {
        $data = $this->validate($request, $this->rules());
        Library::create($data);
        return redirect('mdata/library')
        ->withSuccess(__('Successfully Added New Library Data.'));
    }

    public function edit($id)
    {
        $library = Library::findOrFail($id);
        return view('mdata.library.add-edit', ['edit' => true, 'data'=> $library]);
    }

    public function update(Request $request, $id)
    {
        $library = Library::findOrFail($id);
        $data = $this->validate($request, $this->rules());
        Library::findOrFail($id)->update($data);
        
        return redirect()->route('mdata.library.index')->withSuccess('Successfully Update Library Data.');
    }

    public function delete($id)
    {
        $data = Library::findOrFail($id);
        $data->delete();
        return redirect()->route('mdata.library.index')->withSuccess('Data has been Deleted');
    }
}
