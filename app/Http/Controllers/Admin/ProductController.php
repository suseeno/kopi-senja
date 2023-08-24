<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;

use App\Models\Category;
use App\Models\product;
use Auth;
use DB;
use Str;
use Session;

class productController extends Controller
{
    public function __construct()
    {
        $this->data['statuses'] = Product::statuses();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();
        return view('admin.product.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $this->data['categories'] = $categories->toArray();
        $this->data['product'] = null;
        $this->data['categoryIDs'] = [];
        return view('admin.product.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //

        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['user_id'] = Auth::user()->id;

        $saved = false;
        $saved = DB::transaction(function () use ($params) {
            $product = Product::create($params);
            $product->categories()->sync($params['category_ids']);

            return true;
        });

        if ($saved) {
            Session::flash('success', 'Product has been saved');
        } else {
            Session::flash('error', 'Product could not be saved');
        }

        return redirect('admin/product');
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
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();

        $this->data['categories'] = $categories->toArray();
        $this->data['product'] = $product;
        $this->data['categoryIDs'] = $product->categories
            ->pluck('id')
            ->toArray();
        return view('admin.product.form', $this->data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
