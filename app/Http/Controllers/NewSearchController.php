<?php

namespace App\Http\Controllers;

use App\Models\NewSearch;
use App\Http\Requests\StoreNewSearchRequest;
use App\Http\Requests\UpdateNewSearchRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */

//    public function search(Request $request)
//    {
//        // Xử lý tìm kiếm ở đây và lấy kết quả
//
//        // Sau khi có kết quả, thêm một bản ghi mới vào bảng search_topics
//        $searchTopic = new NewSearch();
//        $searchTopic->topic_name = $request->input('search_word'); // Sử dụng key 'search_word' để lấy từ khóa tìm kiếm
//        $searchTopic->acc_id = Auth::id(); // Lấy ID của người dùng đang đăng nhập
//        $searchTopic->save();
//
//        // Tiếp tục xử lý kết quả tìm kiếm và trả về view hoặc dữ liệu JSON
//    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(StoreNewSearchRequest $request)
//    {
//        // Lấy dữ liệu từ request
//        $topicName = $request->input('search_word'); // Assumed 'search_word' is the name of the input field
//        $accId = Auth::guard('account')->user()->id; // Lấy ID của người dùng đang đăng nhập
//
//
//        // Thêm bản ghi mới vào bảng 'new_searchs'
//        DB::table('new_searchs')->insert([
//            'topic_name' => $topicName,
//            'acc_id' => $accId,
//        ]);
//    }
    public function searchById($id) {
        // Lấy ID của người dùng đang đăng nhập
        $accId = Auth::guard('account')->user()->id;

        // Truy vấn tất cả các topic_name thuộc user đang đăng nhập
        $topicNames = DB::table('new_searchs')->where('acc_id', $accId)->select('id', 'topic_name')->get();

        // Trả về view với danh sách topic_name
        return view('search.search', [
            'topicNames' => $topicNames
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(NewSearch $newSearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewSearch $newSearch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewSearchRequest $request, NewSearch $newSearch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewSearch $newSearch)
    {
        //
    }
}
