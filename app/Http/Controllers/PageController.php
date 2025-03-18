<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\BillDetail;
class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $newProducts = Product::where('new', 1)->get(); // Lấy sản phẩm mới
        $topProducts = Product::orderBy('unit_price', 'desc')->take(10)->get(); // Lấy 10 sản phẩm có giá cao nhất
        return view('page.trangchu', compact('slide', 'newProducts', 'topProducts'));
    }
				
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $type_product = ProductType::all();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
    
        return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }
                
  
    public function getChiTietSanPham($id) {
        $sanpham = Product::find($id);
        $relatedProducts = $sanpham->relatedProducts();
        $newProducts = $sanpham->newProducts();
        return view('page.chitiet_sanpham', compact('sanpham', 'relatedProducts', 'newProducts'));
    }           
    public function getLienHe(){					
    	return view('page.lienhe');				
    }					
    public function getAbout(){					
    	return view('page.about');				
    }					
    public function getDangKy(){					
    	return view('page.dangky');				
    }					
    public function getDangNhap(){					
    	return view('page.dangnhap');				
    }					
    public function getThanhToan(){					
    	return view('page.thanhtoan');				
    }	
    
    public function getIndexAdmin()
    {
    
        $products = Product::all();
        return view('pageadmin.admin')->with(['products'=>$products, 'sumSold' => count(BillDetail::all())]);
    }

    public function getAdminAdd()
    {
        return view('pageadmin.formAdd');
    }													
												

    public function postAdminAdd(Request $request)
    {
    $product = new Product();
    $file_name = null;
    if ($request->hasFile('inputImage')) {
        $file = $request->file('inputImage');
        $file_name = $file->getClientOriginalName(); 
        $file->move(public_path('source/image/product'), $file_name);
    }
    $product->name = $request->input('inputName');
    $product->image = $file_name;
    $product->description = $request->input('inputDescription');
    $product->unit_price = $request->input('inputPrice');
    $product->promotion_price = $request->input('inputPromotionPrice');
    $product->unit = $request->input('inputUnit');
    $product->new = $request->input('inputNew');
    $product->id_type = $request->input('inputType');
    $product->save();
    return redirect()->route('admin.index'); 
    }
 
    public function getAdminEdit($id)											
    {											
    $product = Product::find($id);											
    return view('pageadmin.formEdit')->with('product', $product);											
    }

    public function postAdminEdit(Request $request)
    {
        $id = $request->editId;
        $product = Product::find($id);
        
        if ($request->hasFile('editImage')) {
            $file = $request->file('editImage'); 
            $fileName = $file -> getClientOriginalName('editImage');
            $file->move('source/image/product', $fileName); 
        }
        if ($request ->file('editImage') != null){
            $product -> image = $fileName;
        }
        $product->name = $request->editName;
        $product->description = $request->editDescription;
        $product->unit_price = $request->editPrice;
        $product->promotion_price = $request->editPromotionPrice;
        $product->unit = $request->editUnit;
        $product->new = $request->editNew;
        $product->id_type = $request->editType;

        
        $product->save();
        
        return $this-> getIndexAdmin();
    }
    public function postAdminDelete($id){
        $product = Product ::find($id);
        $product ->delete();
        return $this -> getIndexAdmin();
    }

}					
					