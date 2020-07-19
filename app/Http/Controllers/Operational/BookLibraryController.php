<?php

namespace App\Http\Controllers\Operational;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MData\Library;
use App\MData\Book;
use App\Operational\BookLibrary;
use DB;

class BookLibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $library = Library::all();
        
        return view('operational.book_library.index', ['data'=> $library]);
    }

    public function detail($id)
    {
    	$data['data'] = BookLibrary::where('libraries_id', $id)->get();
    	$data['library'] = Library::where('id', $id)->first();
        
        return view('operational.book_library.detail_index', $data);
    }

    public function add($id)
    {
    	// dd($id);
    	$data['data'] = Book::where('status', 1)->get();
    	$data['library'] = Library::where('id', $id)->first();

        return view('operational.book_library.add_book', $data);
    }

    public function addBook(Request $request, $id)
    {
    	$book = Book::where('id', $request->id)->first();
    	$library = Library::where('id', $id)->first();

    	// dd($library);

    	$data = new BookLibrary;
    	$data->books_id = $book->id;
    	$data->libraries_id = $library->id;
    	$data->status = 1;

    	$data->save();

    	$data['data'] = BookLibrary::where('libraries_id', $id)->get();
    	$data['library'] = Library::where('id', $id)->first();
    	
    	return view('operational.book_library.detail_index', $data)->withSuccess(__('Successfully Add Book to Library.'));
    }

    public function delete(Request $request, $id)
    {
        $book = BookLibrary::findOrFail($request->id);
        $data['data'] = BookLibrary::where('libraries_id', $id)->get();
    	$data['library'] = Library::where('id', $id)->first();
    	// dd($data);

        $book->delete();
        return redirect()->route('operational.book_library.index')
        ->withSuccess('Data has been Deleted');
    }
}
