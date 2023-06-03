<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;


class ProductRepository implements RepositoryInterface
{
    public $product;
    public $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function baseQuery($relation = [], $whithCount = [])
    {
        $query = $this->product->latest()->with($relation);
        foreach ($whithCount as $key => $value) {
            $query->withCount($value);
        }
        return $query;
    }

    public function getById($id)
    {
        return $this->product->where('id', $id)->firstOrFail();
    }

    public function store($validated)
    {
        return $this->product->create($validated);
    }

    public function update($id, $validated)
    {
        $product = $this->getById($id);
        $product->update($validated);
    }

    public function delete($validated)
    {
        $product = $this->getById($validated['id']);
        $product->delete();
    }

    public function getProducts()
    {
        return $this->product->get();
    }

    public function getCategories()
    {
        return $this->category->get();
    }

    public function getProductsByCategory($category_id)
    {
        return $this->product->where('category_id', $category_id)->get();
    }
}
