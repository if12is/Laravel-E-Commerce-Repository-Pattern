<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Utils\ImageUpload;

class CategoryService
{
    public $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getMainCategories()
    {
        return $this->categoryRepository->getMainCategories();
    }
    public function getCategories()
    {
        return  $this->categoryRepository->getCategories();
    }

    public function getAll()
    {
        return $this->categoryRepository->baseQuery(['parent']);
    }

    public function getAllCategories()
    {
        $data = $this->categoryRepository->baseQuery(relation: ['parent']);
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                return '
                <a href="' . route('admin.categories.edit', $item->id) . '" class="btn btn-sm btn-primary">
                <i class="fas fa-pencil-alt"></i>
                </a>
                <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-toggle="modal" data-name="' . $item->name . '" data-bs-target="#deleteModal" data-id="' . $item->id . '">
                <i class="fas fa-trash"></i>
                </button>
                ';
            })
            ->addColumn('parent', function ($item) {
                return $item->parent ? $item->parent->name : 'Main Category ';
            })
            ->addColumn('image', function ($item) {
                return '<img src="' . asset($item->image) . '" width="20px" height="20px" alt="' . $item->name . '">';
            })

            ->rawColumns(['parent', 'action', 'image'])
            ->make(true);
    }

    public function storeCategory($validated)
    {
        $category = new Category();
        $category->name = $validated['name'];
        $category->slug = $validated['slug'];
        $category->parent_id = $validated['parent_id'];
        if ($validated['image']) {
            $category->image = ImageUpload::upload($validated['image']);
        }
        $category->save();
    }

    public function getCategoryById($id, $child = false)
    {
        return $this->categoryRepository->getById($id, $child);
    }

    //   function update category
    public function updateCategory($id, $validated)
    {
        // dd($validated);
        $category = $this->categoryRepository->getById($id);
        $category->name = $validated['name'];
        $category->slug = $validated['slug'];
        $validated['parent_id'] == null ? $category->parent_id = null : $category->parent_id = $validated['parent_id'];
        if (isset($validated['image'])) {
            $category->image = ImageUpload::upload($validated['image']);
        }
        $category->save();
    }
    //  function delete category
    public function deleteCategory($validated)
    {
        $category = $this->getCategoryById($validated);
        $category->delete();
    }
}
