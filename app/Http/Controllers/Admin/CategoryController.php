<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.page.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::where('parent_id', 0)->get();
        $attributes = Attribute::all();
        return view('admin.page.categories.create', compact('parentCategories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory $flasher)
    {
        $request->whenHas('is_active', function ($input) use ($request) {
            $request['is_active'] = false;
        }, function () use ($request) {
            $request['is_active'] = true;
        });
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'parent_id' => 'required',
            'is_active' => 'nullable',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'attribute_ids' => 'required',
            'attribute_is_filter_ids' => 'required',
            'variation_id' => 'required',
        ]);

        $filtered = Arr::except($data, ['attribute_ids', 'variation_id', 'attribute_is_filter_ids']);

        try {
            DB::beginTransaction();

            $category = Category::create($filtered);

            foreach ($data['attribute_ids'] as  $attribute_id) {
                $array[$attribute_id] = [
                    'is_filter' => in_array($attribute_id, $data['attribute_is_filter_ids']) ? 1 : 0,
                    'is_variation' => $attribute_id == $data['variation_id'] ? 1 : 0
                ];
            }
            $category->attributes()->attach($array);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $flasher->addError($ex->getMessage());
            return redirect()->route('admin.categories.index');
        }

        $flasher->addSuccess('دسته بندی جدید ایجاد شد');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parentCategories = Category::where('parent_id', 0)->get();
        $attributes = Attribute::all();
        return view('admin.page.categories.edit', compact('category', 'parentCategories', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, ToastrFactory $flasher)
    {
        $request->whenHas('is_active', function ($input) use ($request) {
            $request['is_active'] = false;
        }, function () use ($request) {
            $request['is_active'] = true;
        });

        $data = $request->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories')->ignore($category)],
            'parent_id' => 'required',
            'is_active' => 'nullable',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'attribute_ids' => 'required',
            'attribute_is_filter_ids' => 'required',
            'variation_id' => 'required',
        ]);

        $filtered = Arr::except($data, ['attribute_ids', 'variation_id', 'attribute_is_filter_ids']);

        try {
            DB::beginTransaction();

            $category->update($filtered);

            foreach ($data['attribute_ids'] as  $attribute_id) {
                $array[$attribute_id] = [
                    'is_filter' => in_array($attribute_id, $data['attribute_is_filter_ids']) ? 1 : 0,
                    'is_variation' => $attribute_id == $data['variation_id'] ? 1 : 0
                ];
            }
            $category->attributes()->sync($array);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $flasher->addError($ex->getMessage());
            return redirect()->route('admin.categories.index');
        }

        $flasher->addSuccess('تغییرات با موفقیت ذخیره شد');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
