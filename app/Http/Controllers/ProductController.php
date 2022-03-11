<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Product::orderBy('id', 'desc')->paginate(10);

        return view('product.index')->with('notes', $notes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // echo 'wtf';
         return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *///'/^p{Latin}+$/    /^[A-Za-z]+$     /^[a-zA-Z0-9]+$//      /^([0-9])+[A-Za-z]+$/
    public function store(Request $request)
    {
        $request->validate([
            'NAME'    => 'required|min:10',
            'ARTICLE' => 'required|unique:products|regex:/^[a-zA-Z0-9]+$/',
        ]);

        // dd($request);

        $data = [
            'size' =>  $request->size,
            'color' =>  $request->color,
            'weight' =>  $request->weight,
        ];

        $data  = json_encode($data);

        $record = new Product();
        $record->ARTICLE = $request->ARTICLE;
        $record->NAME = $request->NAME;
        $record->STATUS = $request->select;
        $record->DATA = $data;
        $record->save();

        return redirect('product/create')->with('success','Product created successfully. Record in db № ' . $record->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record  = Product::find($id);

        // echo $record->ARTICLE;
        //  die();
        //dd($record);

        $data = $record->DATA;
        $data = (json_decode($data, true));

       // echo $data['size'];
       // die();


        $note = [];
        $note['article'] = $record->ARTICLE; ;
        $note['name']    = $record->NAME;
        $note['status']  = $record->STATUS;
        $note['size']    = $data['size'];
        $note['color']   = $data['color'];
        $note['weight']  = $data['weight'];
        $note['id']      = $record->id;

        return view('product.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NAME'    => 'required|min:10',
            'ARTICLE' => 'required|unique:products|regex:/^[a-zA-Z0-9]+$/',
        ]);

        // dd($request);

        $data = [
            'size' =>  $request->size,
            'color' =>  $request->color,
            'weight' =>  $request->weight,
        ];

        $data  = json_encode($data);

        $record =  Product::find($id);
        $record->ARTICLE = $request->ARTICLE;
        $record->NAME = $request->NAME;
        $record->STATUS = $request->select;
        $record->DATA = $data;
        $record->save();
        return$this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // echo $id;
        $deleted = Product::where('id',$id)->delete();
        return$this->index();
    }
}
