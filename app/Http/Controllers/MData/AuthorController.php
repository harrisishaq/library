<?php

namespace App\Http\Controllers\MData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MData\Author;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function rules($id = false)
    {
        return  [
            'name' => 'required',
            'country' => 'required',
            'status' => 'required',
        ];
    }

    public function show()
    {
        $author = Author::all();
        
        return view('mdata.author.index', ['data'=> $author]);
    }

    public function add()
    {
        return view('mdata.author.add-edit', ['edit'=> false]);
    }

    public function create(Request $request)
    {
        $data = $this->validate($request, $this->rules());
        Author::create($data);
        return redirect('mdata/author')
        ->withSuccess(__('Successfully Added New Author Data.'));
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('mdata.author.add-edit', ['edit' => true, 'data'=> $author]);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $data = $this->validate($request, $this->rules());
        Author::findOrFail($id)->update($data);
        
        return redirect()->route('mdata.author.index')->withSuccess('Successfully Update Author Data.');
    }

    public function delete($id)
    {
        $data = Author::findOrFail($id);
        $data->delete();
        return redirect()->route('mdata.author.index')->withSuccess('Data has been Deleted');
    }
}
