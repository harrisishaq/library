<?php

namespace App\Http\Controllers\MData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MData\Publisher;

class PublisherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function rules($id = false)
    {
        return  [
            'publisher_code' => 'required',
            'name' => 'required',
            'country' => 'required',
            'status' => 'required',
        ];
    }

    public function show()
    {
    	$publisher = Publisher::all();
        
        return view('mdata.publisher.index', ['data'=> $publisher]);
    }

    public function add()
    {
        return view('mdata.publisher.add-edit', ['edit'=> false]);
    }

    public function create(Request $request)
    {
    	$data = $this->validate($request, $this->rules());
    	$publisher = Publisher::where('publisher_code', $request->publisher_code)->first();
    	
    	if ($publisher == null)
    	{
    		Publisher::create($data);
    		return redirect('mdata/publisher')
    		->withSuccess(__('Successfully Added New Publisher Data.'));
    	} else {
    		return redirect('mdata/publisher/add')
    		->withErrors(__('Publisher Code Already Exist, Please Make Sure You Input New Unused Publisher Code.'));
    	} 
    }

    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('mdata.publisher.add-edit', ['edit' => true, 'data'=> $publisher]);
    }

    public function update(Request $request, $id)
    {
        $publisher = Publisher::findOrFail($id);
        $data = $this->validate($request, $this->rules());
        
        if ($publisher->id == $id && $publisher->publisher_code == $request->publisher_code)
    	{
    		$publisher->update($data);
    		return redirect('mdata/publisher')
    		->withSuccess(__('Successfully Update Publisher Data.'));
    	} else {
    		if ($publisher->id == $id && $publisher->publisher_code != $request->publisher_code)
    		{
    			$old_data = Publisher::where('publisher_code', $request->publisher_code)->first();

    			if ($old_data == null) 
    			{
    				$publisher->update($data);
    				return redirect('mdata/publisher')
    				->withSuccess(__('Successfully Update Publisher Data.'));
    			} else {
    				return redirect('mdata/publisher')
    				->withErrors(__('Publisher Code Already Exist, Please Make Sure You Input New Unused Publisher Code.'));
    			}
    		}
    		
    	}
    }

    public function delete($id)
    {
        $data = Publisher::findOrFail($id);
        $data->delete();
        return redirect()->route('mdata.publisher.index')->withSuccess('Data has been Deleted');
    }
}
