<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriesController extends BaseController
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepo;

    /**
     * CategoriesController constructor.
     */
    public function __construct()
    {
        $this->categoryRepo = new CategoryRepository();
    }

    public function index(?Request  $request) {

        try {
            $category_list = $this->categoryRepo->paginate(20, ['id', 'parent_id', 'name', 'depth', 'created_at', 'updated_at']);

            return $this->api_response_success(
                trans('Category List.'),
                compact('category_list'),
                Response::HTTP_OK
            );
        } catch (\Exception $exception) {
            return $this->api_response_error(
                trans("Something went wrong"),
                trans("Something went wrong"),
                $this->getHTTPResponse()::HTTP_BAD_REQUEST
            );
        }

    }
}


/*
 * Json response.
 * {
  "status": 200,
  "message": "Category List.",
  "data": {
    "category_list": {
      "current_page": 1,
      "data": [
        {
          "id": 1,
          "parent_id": null,
          "name": "men",
          "depth": 0,
          "created_at": "2020-08-22T15:14:47.000000Z",
          "updated_at": "2020-08-22T15:14:47.000000Z"
        },
        {
          "id": 2,
          "parent_id": null,
          "name": "women",
          "depth": 0,
          "created_at": "2020-08-22T15:14:47.000000Z",
          "updated_at": "2020-08-22T15:14:47.000000Z"
        },
        {
          "id": 3,
          "parent_id": 1,
          "name": "shirt",
          "depth": 0,
          "created_at": "2020-08-22T15:14:47.000000Z",
          "updated_at": "2020-08-22T15:14:47.000000Z"
        },
        {
          "id": 4,
          "parent_id": 1,
          "name": "tshirt",
          "depth": 0,
          "created_at": "2020-08-22T15:14:48.000000Z",
          "updated_at": "2020-08-22T15:14:48.000000Z"
        },
        {
          "id": 5,
          "parent_id": 2,
          "name": "tshirt",
          "depth": 0,
          "created_at": "2020-08-22T15:14:48.000000Z",
          "updated_at": "2020-08-22T15:14:48.000000Z"
        },
        {
          "id": 6,
          "parent_id": 2,
          "name": "dress",
          "depth": 0,
          "created_at": "2020-08-22T15:14:48.000000Z",
          "updated_at": "2020-08-22T15:14:48.000000Z"
        }
      ],
      "first_page_url": "http:\/\/localhost:8000\/api\/categories?page=1",
      "from": 1,
      "last_page": 1,
      "last_page_url": "http:\/\/localhost:8000\/api\/categories?page=1",
      "next_page_url": null,
      "path": "http:\/\/localhost:8000\/api\/categories",
      "per_page": 20,
      "prev_page_url": null,
      "to": 6,
      "total": 6
    }
  },
  "error": "",
  "info": {
    "api_version": "1.0",
    "status": "success",
    "format": "json",
    "response_code": 200,
    "generated_at": "2020-08-22T15:48:53.998573Z"
  }
}
 */
