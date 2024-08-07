<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function listCategory(){
        $category = Category::get();
        return view('admin.categories.list-category')->with([
            'category' => $category
        ]);
    }

    public function addCategory(){
        return view('admin.categories.add-category');
    }

    public function addPostCategory(Request $req){
        $req->validate([
            'name' => 'required'
        ], [
            'name.required' => "Tên danh mục không được bỏ trống"
        ]);

        $data = [
            'name' => $req->name
        ];
        Category::create($data);

        return redirect()->route('admin.category.listCategory')->with([
            'message' => 'Thêm mới danh mục thành công'
        ]);
    }

    public function deleteCategory(Request $req){
        Category::find($req->id)->delete();
        return redirect()->route('admin.category.listCategory')->with([
            'message' => 'Xóa danh mục thành công'
        ]);
    }

    public function updateCategory($idCategory){
        $category = Category::find($idCategory);
        return view('admin.categories.update-category')->with([
            'category'  => $category
        ]);
    }

    public function updatePatchCategory(Request $req){
        $req->validate([
            'idCategory' => 'required|exists:category,id',
            'name'  => 'required'
        ],[
            'idCategory.required' => 'Không tìm thấy id',
            'idCategory.exists' => 'Danh mục không tồn tại',
            'name.required'     => 'Tên không được để trống'
        ]);

        $data = [
            'name'  => $req->name
        ];
        $category = Category::find($req->idCategory)->update($data);

        return redirect()->route('admin.category.listCategory')->with([
            'message'   => 'Chỉnh sửa thành công'
        ]);
    }
}
