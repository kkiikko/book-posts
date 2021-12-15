<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BookController extends Controller
{
  public function index(Request $request)
    {
       
        $data = [];
        
        $item = null;
        
        
        if (!empty($request->keyword))
        {
             
 
            // 検索キーワードあり
 
            // 日本語で検索するためにURLエンコードする
            $title = urlencode($request->keyword);
 
            // APIを発行するURLを生成
            $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $title . '&country=JP&tbm=bks';
    
            $client = new Client();
 
            // GETでリクエスト実行
            $response = $client->request("GET", $url);
    
            $body = $response->getBody();
            
            // レスポンスのJSON形式を連想配列に変換
            $bodyArray = json_decode($body, true);
    
            // 書籍情報部分を取得
           $items = $bodyArray['items'];
        //   1つ目の配列を取得
          $item = $items[0];
 
            // レスポンスの中身を見る
            // dd($items);
        
           $data = [
            'item' => $item,
            'keyword' => $request->keyword,
        ];
        // dd($data);
        return view('posts/create', $data);
        }else{
          
           $data = [
            'item' => $item,
            'keyword' => $request->keyword,
        ];
          return view('books/index',$data);
        }
       
        
    }
    
    
}
