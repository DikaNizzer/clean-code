<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function getAllMenu()
    {
        $menus = Menu::all();
        if(count($menus)){
            return $this->responseSuccessWithData('Success', $menus);

        }
        else{
            return $this->responseError('Course not found', 404);
        }
    }

    public function getAllCategory()
    {
        $categories = Category::all();
        if(count($categories)){
            return $this->responseSuccessWithData('Success', $categories);

        }
        else{
            return $this->responseError('Course not found', 404);
        }
    }

    public function getCategoryMenu()
    {
        $categories = Category::with('menus')->get();
        if(count($categories)){
            return $this->responseSuccessWithData('Success', $categories);

        }
        else{
            return $this->responseError('Course not found', 404);
        }
    }

    public function createCategory(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                "category_title" => "required|string",
                "category_description" => "required",
                'category_picture' => 'required|image|mimes:jpg,png,jpeg,PNG',
                "category_status" => "required",
            ]
        );

        if ($validator->fails()) {
            return $this->responseFailValidation($validator->errors());
        }

        $validData = $validator->validated();
        if ($request->file('category_picture')) {
            $validData['category_picture'] = $request->file('category_picture')->storeAs('/categoryPicture', Str::slug($request->input('title'), "-") . "_" . date('Y-m-d') . '.' . $request->file('category_picture')->extension());
        }

        try {
            $category = Category::create($validData);
            return $this->responseSuccessWithData('Success', $category);
        } catch (QueryException $e) {
            return $this->responseError("Internal Server Error", 500, $e->errorInfo);
        }
    }

    public function update(Request $request)
    {
        $category = Category::find($request->category_id);
        if (!$category) {
            return $this->responseError('Category not found', 404);
        } 
        
        $validator = Validator::make(
            $request->all(),
            [
                "category_title" => "required|string",
                "category_description" => "required",
                'category_picture' => 'required|image|mimes:jpg,png,jpeg,PNG',
                "category_status" => "required",
            ]
        );

        if ($validator->fails()) {
            return $this->responseFailValidation($validator->errors());
        }

        $validData = $validator->validated();
        if ($request->file('category_picture')) {
            $validData['category_picture'] = $request->file('category_picture')->storeAs('/categoryPicture', Str::slug($request->input('title'), "-") . "_" . date('Y-m-d') . '.' . $request->file('category_picture')->extension());
        }

        try {
            $category->update($validData);
            return $this->responseSuccessWithData('Category updated successfully', $category);

        } catch (QueryException $e) {
            return $this->responseError("Internal Server Error", 500, $e->errorInfo);
        }
    }

    public function show(Request $req)
    {
        $category = Category::find($req->category_id);
        if ($category) {
            return $this->responseSuccessWithData('Success', $category);
        } else {
            return $this->responseError('Category not found', 404);
        }
    }
}
