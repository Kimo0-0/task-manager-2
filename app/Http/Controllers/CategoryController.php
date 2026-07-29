<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request): JsonResponse
    {
        $categories = $request->user()->categories()->get();

        return response()->json($categories, 200);
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = $request->user()->categories()->create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category,
        ], 201);
    }

    public function show(Category $category): JsonResponse
    {
        $this->authorize('view', $category);

        return response()->json($category, 200);
    }

    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        $this->authorize('update', $category);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category,
        ], 200);
    }

    public function destroy(Category $category): JsonResponse
    {
        $this->authorize('delete', $category);
        if ($category->tasks()->exists()) {
            return response()->json([
                'message' => 'Cannot delete category that contains tasks.',
            ], 422);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
        ], 200);
    }
}
