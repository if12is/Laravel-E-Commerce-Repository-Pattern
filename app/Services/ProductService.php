<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Utils\ImageUpload;
use Yajra\DataTables\Facades\DataTables;

class ProductService
{

    public $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getAllProducts()
    {
        return $this->productRepository->getProducts();
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function storeProduct($validated)
    {
        if (isset($validated['image'])) {
            $validated['image'] = ImageUpload::upload($validated['image']);
        }
        return $this->productRepository->store($validated);
    }

    public function updateProduct($id, $validated)
    {
        return $this->productRepository->update($id, $validated);
    }

    public function deleteProduct($validated)
    {

        return $this->productRepository->delete($validated);
    }

    public function getProducts()
    {
        return $this->productRepository->getProducts();
    }

    public function getCategories()
    {
        return $this->productRepository->getCategories();
    }

    public function datatable()
    {
        $data = $this->productRepository->baseQuery(relation: ['category'], whithCount: ['product_color'])->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                return '
                <a href="' . route('admin.products.edit', $item->id) . '" class="btn btn-sm btn-primary">
                <i class="fas fa-pencil-alt"></i>
                </a>
                <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-toggle="modal" data-name="' . $item->name . '" data-bs-target="#deleteModal" data-id="' . $item->id . '">
                <i class="fas fa-trash"></i>
                </button>
                ';
            })
            ->addColumn('image', function ($item) {
                return '<img src="' . asset($item->image) . '" width="25px" height="25px" alt="' . $item->name . '">';
            })
            ->addColumn('description', function ($item) {
                return substr($item->description, 0, 25) . '...';
            })
            ->addColumn('category', function ($item) {
                return $item->category->name;
            })
            ->rawColumns(['action', 'image', 'description', 'category'])
            ->make();
    }

    public function getProductsByCategory($category_id)
    {
        return $this->productRepository->getProductsByCategory($category_id);
    }
}
