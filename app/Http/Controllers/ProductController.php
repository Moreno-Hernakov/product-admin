<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use App\Supports\ResponseValidation;
use App\Validations\UserValidation;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private ProductService $product_service;

    public function __construct()   
    {
        $this->product_service = new ProductService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get(Request $request)
    {
        $users = $this->product_service->get_list_paged($request);
        $count = $this->product_service->get_list_count($request);

        $data = [];
        $no = $request->start;
        foreach ($users as $user) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $user->product_name;
            // $row[] = $user->product_description;
            $row[] = $user->product_price_capital;
            $row[] = $user->product_price_sell;
            $button = "<a href='" . \route("app.Products.show", $user->id) . "' class='btn btn-info btn-sm m-1'>Detail</a>";
            if ($user->role_id != 1 || $user->id != \auth()->user()->id) {
            $button .= form_delete("formUser$user->id", route("app.Products.destroy", $user->id));
            }
            $row[] = $button;
            $data[] = $row;
        }

        $output = [
            "draw" => $request->draw,
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $data
        ];

        return \response()->json($output, 200);
    }
    
    public function index()
    {
        return $this->view_admin("admin.products.index", "Product Management", [], TRUE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view_admin("admin.products.create", "Tambah Product", []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $response = $this->product_service->store($request);
        return \response_json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
        $data = [
            "product" => $Product
        ];

        // return $data;
        return $this->view_admin("admin.products.show", "Detail product", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product)
    {
        $data = [
            "product" => $Product,
        ];
    
        return $this->view_admin("admin.products.edit", "Edit product", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $Product)
    {
        $response = $this->product_service->update($request, $Product);
        return \response_json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        $Product->delete();
        $response = \response_success_default("Berhasil hapus Product!", FALSE, \route("app.Products.index"));
        return \response_json($response);
    }
}
