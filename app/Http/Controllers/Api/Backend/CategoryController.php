<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('products')->paginate();

        return response()->json([
            'success' => true,
            'categories' => $categories,
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueCategorySlug($data['name']);
        $category = Category::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);
        $this->saveIcon($request, $category);

        return response()->json([
            'success' => true,
            'category' => $category->loadCount('products'),
        ], 201);
    }

    public function update(Request $request, Category $category)
    {
        $data = $this->validatedData($request, $category);
        $category->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);
        $this->saveIcon($request, $category);

        return response()->json([
            'success' => true,
            'category' => $category->loadCount('products'),
        ]);
    }

    private function validatedData(Request $request, ?Category $category = null): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['sometimes', 'nullable', 'file', 'mimes:jpeg,png,webp,avif,svg', 'max:2048'],
        ];

        if ($category) {
            $rules['slug'] = ['required', 'string', 'max:255', Rule::unique('categories', 'slug')->ignore($category->id)];
        }

        return $request->validate($rules);
    }

    private function uniqueCategorySlug(string $name): string
    {
        $baseSlug = Str::slug($name) ?: 'category';
        $slug = $baseSlug;
        $suffix = 2;

        while (Category::query()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    private function saveIcon(Request $request, Category $category): void
    {
        if ($request->hasFile('icon')) {
            $category->addMediaFromRequest('icon')->toMediaCollection('category_icon');
        }
    }

    public function destroy(Category $category)
    {
        if ($category->products()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Categories containing products cannot be deleted.',
            ], 409);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.',
        ]);
    }
}
