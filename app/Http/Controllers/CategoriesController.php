<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $category_list = $this->categoryRepo->paginate();

        return view('category.index', compact('category_list'));
    }
}
