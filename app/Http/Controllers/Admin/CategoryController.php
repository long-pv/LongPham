<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $category = Category::find($request->item); // lấy dữ liệu

        if ($category)
        {
            DB::beginTransaction(); //  xử lý có tuần tự các thao tác trên cơ sở dữ liệu
            try{
                DB::table('products')->where('category_id', $request->item)->delete(); 
                DB::table('categories')->where('id', $request->item)->delete();
                // $product = Product::where('category_id', $request->item)->delete(); // nếu sản phẩm có category_id trùng với id của category thì xóa
                // $category->delete(); // xóa category trước

                DB::commit(); //để lưu các thay đổi.
                return redirect()->route('admin.category.index')->with('success', 'Xoa thanh cong');
            }catch (\Throwable $e) // nếu có lỗi xảy ra
            {
                DB::rollBack(); // khôi phục lại các thay đổi.
                Log::debug($e->getMessage() . $e->__toString());  // xử lí lỗi ngoại lệ
                abort(404); //  mã lỗi HTTP từ máy chủ
            } 
            return redirect()->route('admin.category.index')->withErrors(['error', 'Co loi trong qua trinh xoa']);
        }

    }
}
