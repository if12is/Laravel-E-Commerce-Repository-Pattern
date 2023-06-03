<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CategoryDeleteRequest;
use App\Http\Requests\Admin\Categories\CategoryStoreRequest;
use App\Http\Requests\Admin\Categories\CategoryUpdateRequest;
use App\Services\CategoryService;


class CategoryController extends Controller
{
    //  variable to bin CategoryService class
    protected $categoryService;

    //  constructor to bin CategoryService class
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainCategories = app(CategoryService::class)->getMainCategories();
        $categories = app(CategoryService::class)->getCategories();
        return view('admin.categories.index', compact('categories', 'mainCategories'));
    }

    public function getAllCategories()
    {
        return $this->categoryService->getAllCategories();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $this->categoryService->storeCategory($request->validated());
        // dd($request->validated());
        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return $id;
        $category = $this->categoryService->getCategoryById($id, true);
        $mainCategories = $this->categoryService->getMainCategories();
        return view('admin.categories.edit', compact('category', 'mainCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->categoryService->updateCategory($id, $request->validated());
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryDeleteRequest $request)
    {
        $this->categoryService->deleteCategory($request->validated());
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

}
