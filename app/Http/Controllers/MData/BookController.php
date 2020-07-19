<?php

namespace App\Http\Controllers\MData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MData\Publisher;
use App\MData\Author;
use App\MData\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function rules($id = false)
    {
        return  [
            'isbn' => 'required|numeric',
            'title' => 'required',
            'authors_id' => 'required',
            'publishers_id' => 'required',
            'year' => 'nullable',
            'status' => 'required',
        ];
    }

    public function show()
    {
        $book = Book::all();
        
        return view('mdata.book.index', ['data'=> $book]);
    }

    public function add()
    {
    	$author = Author::where('status', 1)->get();
    	$publisher = Publisher::where('status', 1)->get();

        return view('mdata.book.add-edit', ['edit'=> false, 'publisher' => $publisher, 'author' => $author]);
    }

    public function create(Request $request)
    {
    	$data = $this->validate($request, $this->rules());
    	$book = Book::where('isbn', $request->isbn)->first();
        // dd($data);

        if ($book == null)
    	{
    		Book::create($data);
    		return redirect('mdata/book')
    		->withSuccess(__('Successfully Added New Book Data.'));
    	} else {
    		return redirect('mdata/book/add')
    		->withErrors(__('Book ISBN Already Exist, Please Make Sure You Input New Unused ISBN.'));
    	} 
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $author = Author::where('status', 1)->get();
    	$publisher = Publisher::where('status', 1)->get();

        return view('mdata.book.add-edit', ['edit' => true, 'data'=> $book, 'publisher' => $publisher, 'author' => $author]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $data = $this->validate($request, $this->rules());
        
        if ($book->id == $id && $book->isbn == $request->isbn)
    	{
    		$book->update($data);
    		return redirect('mdata/book')
    		->withSuccess(__('Successfully Update Book Data.'));
    	} else {
    		if ($book->id == $id && $book->isbn != $request->isbn)
    		{
    			$old_data = Book::where('isbn', $request->isbn)->first();

    			if ($old_data == null) 
    			{
    				$book->update($data);
    				return redirect('mdata/book')
    				->withSuccess(__('Successfully Update Book Data.'));
    			} else {
    				return redirect('mdata/book')
    				->withErrors(__('Book ISBN Already Exist, Please Make Sure You Input New Unused ISBN.'));
    			}
    		}
    		
    	}
    }

    public function delete($id)
    {
        $data = Book::findOrFail($id);
        $data->delete();
        return redirect()->route('mdata.book.index')
        ->withSuccess('Data has been Deleted');
    }
}
