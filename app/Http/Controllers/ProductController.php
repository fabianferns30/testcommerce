<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
    /**
     * @var ProductRepository
     */
    private $productsRepo;

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->productsRepo = new ProductRepository();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(?Request  $request)
    {

        $product_list = $this->productsRepo->with('category', 'category.category')
        ->paginate(20, ['id', 'name', 'sku', 'price', 'created_at', 'updated_at']);
        return $this->api_response_success(trans('Product List'), compact('product_list'));
    }

    /*
     * {
  "status": 200,
  "message": "Product List",
  "data": {
    "product_list": {
      "current_page": 1,
      "data": [
        {
          "id": 1,
          "name": "Addidas shirt",
          "sku": "SADAD1123SAD",
          "price": 12,
          "created_at": "2020-08-22T16:18:05.000000Z",
          "updated_at": "2020-08-22T16:18:05.000000Z",
          "category": [
            {
              "id": 1,
              "product_id": 1,
              "category_id": 1,
              "created_at": "2020-08-22T16:27:13.000000Z",
              "updated_at": "2020-08-22T16:27:13.000000Z",
              "category": {
                "id": 1,
                "parent_id": null,
                "depth": 0,
                "name": "men",
                "created_at": "2020-08-22T15:14:47.000000Z",
                "updated_at": "2020-08-22T15:14:47.000000Z",
                "deleted_at": null
              }
            },
            {
              "id": 2,
              "product_id": 1,
              "category_id": 3,
              "created_at": "2020-08-22T16:27:13.000000Z",
              "updated_at": "2020-08-22T16:27:13.000000Z",
              "category": {
                "id": 3,
                "parent_id": 1,
                "depth": 0,
                "name": "shirt",
                "created_at": "2020-08-22T15:14:47.000000Z",
                "updated_at": "2020-08-22T15:14:47.000000Z",
                "deleted_at": null
              }
            }
          ]
        },
        {
          "id": 2,
          "name": "Addidas tshirt",
          "sku": "SADAD1sas123SAD",
          "price": 12,
          "created_at": "2020-08-22T16:18:05.000000Z",
          "updated_at": "2020-08-22T16:18:05.000000Z",
          "category": [
            {
              "id": 3,
              "product_id": 2,
              "category_id": 4,
              "created_at": "2020-08-22T16:27:14.000000Z",
              "updated_at": "2020-08-22T16:27:14.000000Z",
              "category": {
                "id": 4,
                "parent_id": 1,
                "depth": 0,
                "name": "tshirt",
                "created_at": "2020-08-22T15:14:48.000000Z",
                "updated_at": "2020-08-22T15:14:48.000000Z",
                "deleted_at": null
              }
            },
            {
              "id": 4,
              "product_id": 2,
              "category_id": 1,
              "created_at": "2020-08-22T16:27:14.000000Z",
              "updated_at": "2020-08-22T16:27:14.000000Z",
              "category": {
                "id": 1,
                "parent_id": null,
                "depth": 0,
                "name": "men",
                "created_at": "2020-08-22T15:14:47.000000Z",
                "updated_at": "2020-08-22T15:14:47.000000Z",
                "deleted_at": null
              }
            }
          ]
        },
        {
          "id": 3,
          "name": "Dress",
          "sku": "SADAD11231231SAD",
          "price": 12,
          "created_at": "2020-08-22T16:18:05.000000Z",
          "updated_at": "2020-08-22T16:18:05.000000Z",
          "category": [
            {
              "id": 5,
              "product_id": 3,
              "category_id": 2,
              "created_at": "2020-08-22T16:27:14.000000Z",
              "updated_at": "2020-08-22T16:27:14.000000Z",
              "category": {
                "id": 2,
                "parent_id": null,
                "depth": 0,
                "name": "women",
                "created_at": "2020-08-22T15:14:47.000000Z",
                "updated_at": "2020-08-22T15:14:47.000000Z",
                "deleted_at": null
              }
            }
          ]
        },
        {
          "id": 4,
          "name": "Nike shorts",
          "sku": "SA1231DAsasD1123SAD",
          "price": 12,
          "created_at": "2020-08-22T16:18:05.000000Z",
          "updated_at": "2020-08-22T16:18:05.000000Z",
          "category": [
            {
              "id": 6,
              "product_id": 4,
              "category_id": 2,
              "created_at": "2020-08-22T16:27:14.000000Z",
              "updated_at": "2020-08-22T16:27:14.000000Z",
              "category": {
                "id": 2,
                "parent_id": null,
                "depth": 0,
                "name": "women",
                "created_at": "2020-08-22T15:14:47.000000Z",
                "updated_at": "2020-08-22T15:14:47.000000Z",
                "deleted_at": null
              }
            },
            {
              "id": 7,
              "product_id": 4,
              "category_id": 1,
              "created_at": "2020-08-22T16:27:14.000000Z",
              "updated_at": "2020-08-22T16:27:14.000000Z",
              "category": {
                "id": 1,
                "parent_id": null,
                "depth": 0,
                "name": "men",
                "created_at": "2020-08-22T15:14:47.000000Z",
                "updated_at": "2020-08-22T15:14:47.000000Z",
                "deleted_at": null
              }
            }
          ]
        }
      ],
      "first_page_url": "http:\/\/localhost:8000\/api\/products?page=1",
      "from": 1,
      "last_page": 1,
      "last_page_url": "http:\/\/localhost:8000\/api\/products?page=1",
      "next_page_url": null,
      "path": "http:\/\/localhost:8000\/api\/products",
      "per_page": 20,
      "prev_page_url": null,
      "to": 4,
      "total": 4
    }
  },
  "error": "",
  "info": {
    "api_version": "1.0",
    "status": "success",
    "format": "json",
    "response_code": 200,
    "generated_at": "2020-08-22T16:36:27.874873Z"
  }
}
     * */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(?Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sku' => 'required',
            'name' => 'required',
            'price' => 'required'
        ]);

//        Validator return Json error
        if ($validator->fails()) {
            return $this->api_response_error(
                $validator->errors()->first(),
                $validator->errors()->first(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $name = $request->get('name', null);
        $sku = $request->get('sku', null);
        $price = $request->get('price', null);
        $product_details = $this->productsRepo->create([
            'name' => $name,
            'sku' => $sku,
            'price' => $price,
        ]);
        if ($product_details->exists) {
           return $this->api_response_success(trans('Product added.'), compact('product_details'));
        }else{
            return $this->api_response_error(
                $validator->errors()->first(),
                $validator->errors()->first(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(?Request  $request, $product_id)
    {
        if (empty($product_id)) {
            return $this->api_response_error(trans('Product not found.'),trans('Product not found.'), Response::HTTP_BAD_REQUEST);
        }
        $product_details = $this->productsRepo->where('id', $product_id);
        if ($product_details->exists) {
            $this->api_response_success(trans('Product detials.'), compact('product_details'));
        }else{
            return $this->api_response_error(trans('Product not found.'),trans('Product not found.'), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($product_id)
    {
        try {
            $deletedResponse = $this->productsRepo->deleteById($product_id);

            if ($deletedResponse) {
                return $this->api_response_success(trans('Product deleted.'), []);
            }
            else{
                return $this->api_response_error(trans('Product not found.'),trans('Product not found.'), Response::HTTP_BAD_REQUEST);
            }
        }catch (\Exception $exception){
            return $this->api_response_error(trans('Something went wrong.'),trans('Something went wrong.'), Response::HTTP_BAD_REQUEST);
        }
    }
}
