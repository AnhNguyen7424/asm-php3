<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct(){
        $products = Product::with('images:id,product_id,image_url')->with('category:id,name')->get();
        return view('admin.products.list-product')->with([
            'products'  => $products
        ]);
    }

    public function addProduct(){
        $categories = Category::get();
        return view('admin.products.add-product')->with([
            'categories'  => $categories
        ]);
    }

    public function addPostProduct(Request $req){
        $req->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'  => 'required',
            'price' => 'required',
            'category'  => 'required',
            'description'   => 'present'
        ],[
            'images.*.required'   => 'Ảnh không được để trống',
            'images.*.image'  => 'File gửi lên không phải ảnh',
            'images.*.mimes'  => 'File gửi lên không phải ảnh',
            'images.*.max'  => 'File ảnh quá dung lượng cho phép',
            'name.required'  => 'Name bắt buộc phải nhập',
            'price.required'  => 'Price bắt buộc phải nhập',
            'category.required'  => 'Category bắt buộc phải nhập',
            'description.present'  => 'Description phải có mặt trong dữ liệu yêu cầu',
        ]);

        $data = [
            'name'  => $req->name,
            'price' => $req->price,
            'description'   => $req->description,
            'category_id'   => $req->category
        ];
        $product = Product::create($data);

        if ($req->hasFile('images')) {
            $images = $req->file('images');
            foreach ($images as $key => $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('imagesProduct'), $imageName);


                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => 'imagesProduct/' . $imageName,
                    'image_type'    => $key == 0 ? 'main' : 'secondary'
                ]);
            }
        }

        return redirect()->route('admin.products.listProduct')->with([
            'message'   => 'Thêm sản phẩm thành công'
        ]);
    }

    public function deleteProduct(Request $req){
        $imageProduct = ProductImage::where('product_id', $req->idProduct)->select('image_url')->get();
        foreach($imageProduct as $value){
            File::delete(public_path($value->image_url));
        }
        Product::find($req->idProduct)->delete();
        return redirect()->route('admin.products.listProduct')->with([
            'message'   => 'Xóa sản phẩm thành công'
        ]);
    }

    public function updateProduct($idProduct){
        $product = Product::with('images:id,product_id,image_url')->find($idProduct);
        $categories = Category::get();
        return view('admin.products.update-product')->with([
            'product'   => $product,
            'categories'    => $categories
        ]);
    }

    public function updatePatchProduct(Request $req){
        $req->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'  => 'required',
            'price' => 'required',
            'category'  => 'required',
            'description'   => 'present',
            'idProduct' => 'required'
        ],[
            'images.*.required'   => 'Ảnh không được để trống',
            'images.*.image'  => 'File gửi lên không phải ảnh',
            'images.*.mimes'  => 'File gửi lên không phải ảnh',
            'images.*.max'  => 'File ảnh quá dung lượng cho phép',
            'name.required'  => 'Name bắt buộc phải nhập',
            'price.required'  => 'Price bắt buộc phải nhập',
            'category.required'  => 'Category bắt buộc phải nhập',
            'description.present'  => 'Description phải có mặt trong dữ liệu yêu cầu',
        ]);

        $data = [
            'name'  => $req->name,
            'price' => $req->price,
            'description'   => $req->description,
            'category_id'   => $req->category
        ];
        Product::find($req->idProduct)->update($data);

        if ($req->hasFile('images')) {
            $images = $req->file('images');
            // Xóa ảnh cũ
            $productImage = ProductImage::where('product_id', $req->idProduct)->select('image_url');
            foreach($productImage->get() as $value){
                File::delete(public_path($value->image_url));
            }
            $productImage->delete();

            foreach ($images as $key => $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('imagesProduct'), $imageName);


                ProductImage::create([
                    'product_id' => $req->idProduct,
                    'image_url' => 'imagesProduct/' . $imageName,
                    'image_type'    => $key == 0 ? 'main' : 'secondary'
                ]);
            }
        }

        return redirect()->route('admin.products.listProduct')->with([
            'message'   => 'Sửa sản phẩm thành công'
        ]);
    }
}