<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements RepositoryInterface
{

    public $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function baseQuery($relation = [])
    {
        $query = $this->category->latest()->with($relation)->get();
        return $query;
    }

    public function getAllCategoriesWithParent()
    {
        return $this->category->with('parent')->get();
    }

    public function getMainCategories()
    {
        return $this->category->whereNull('parent_id')->orWhere('parent_id', 0)->get();;
    }

    public function getCategories()
    {
        return $this->category->get();
    }

    public function getCategoriesLatest()
    {
        return $this->category->latest()->get();
    }

    public function getById($id, $withCountChild = false)
    {
        $query = $this->category->where('id', $id);
        if ($withCountChild) {
            $query->withCount('child');
        }
        return $query->firstOrFail();
    }

    public function store($validated)
    {
        return $this->category->create($validated);
    }

    public function update($id, $validated)
    {
        $category = $this->getById($id);
        $category->update($validated);
    }

    public function delete($validated)
    {
        $category = $this->getById($validated);
        $category->delete();
    }
}
