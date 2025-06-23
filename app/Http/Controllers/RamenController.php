<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ramen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RamenController extends Controller
{
      //認証
       public function __construct()
    {
        $this->middleware('auth');
    }

//////index表示
public function index(Request $request)
{
    //検索用
    $keyword = $request->input('keyword');
    $query = Ramen::query();

    //キーワードがある場合
    if (!empty($keyword)) {
        $query->where('shop_name', 'like', "%{$keyword}%")
              ->orWhere('review', 'like', "%{$keyword}%")
              ->orWhere('prefecture_name', 'like', "%{$keyword}%")
              ->orwhere('ate_on','like',"%{$keyword}%");

        $ramens = $query->latest('ate_on')->paginate(10)->appends(['keyword' => $keyword]);

        return view('ramens.search', compact('ramens', 'keyword'));
    //ない場合はindex表示
    } else {
        $ramens = $query->latest('ate_on')->paginate(9);
        return view('ramens.index', compact('ramens'));
    }
}

//////ラーメン登録
    public function store(Request $request)
{
    // 1. バリデーション
    $validated = $request->validate([
        'shop_name' => 'required|string|max:100',
        'prefecture_name' => 'required|string|max:20',
        'ate_on' => 'required|date',
        'review' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048', // 2MBまで
        'shop_url'=>'nullable|string',
        'is_recommended' => 'boolean',
    ]);

    // 2. 画像の保存（任意）
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/images');
        $validated['image_path'] = basename($path); // ファイル名だけ保存
    }

    // 3.ユーザーIDをログインIDに
    $validated['user_id'] = auth()->id();

    // 4.登録処理(SQLエラーをtrycatchで確認)
     try {
    Ramen::create($validated);
    $ramen = Ramen::create($validated);
    // 5.完了後に一覧ページへリダイレクト
    return redirect()->route('ramens.index')->with('success', $ramen->shop_name.'のラーメン情報を登録しました！');

     } catch (\Exception $e) {
        //6.SQLエラーの場合はログにエラー出力し編集画面にリダイレクト
        \Log::error('ラーメン情報登録エラー: '.$e->getMessage());

        return back()->withInput()->with('error', 'ラーメン情報の登録に失敗しました。もう一度お試しください。');
    }
}

//////登録画面表示
    public function create(){
        return view('ramens.create'/*,compact('ramens')*/);
    }

//////自分の一覧表示
   public function mylist(){
        //全件表示$ramens=Ramen::all();
        $ramens = Auth::user()->ramens()->latest('ate_on')->paginate(10);
        return view('ramens.mylist',compact('ramens'));
    }


//////編集画面表示(ifで登録ユーザかどうかを確認)
      public function edit(Ramen $ramen)
{
     if ($ramen->user_id !== Auth::id()) {
        abort(403, 'このラーメンを編集する権限がありません。');
    }

   $prefectures = config('prefectures');
    return view('ramens.edit', compact('ramen', 'prefectures'));
}

//////情報更新
    public function update(Request $request, Ramen $ramen)
{
    //1.バリデーション
    $validated = $request->validate([
        'shop_name' => 'required|string|max:100',
        'ate_on' => 'required|date',
        'review' => 'required|string|max:255',
        'prefecture_name' => 'required|string|max:10',
        'shop_url'=>'nullable|string',
        'is_recommended' => 'boolean',
        'image' => 'nullable|image|max:2048', // 2MBまで
    ]);
    
    
    //2.画像が新しくアップロードされた場合の処理
    if ($request->hasFile('image')) {
        // 元の画像を削除（任意）
        if ($ramen->image_path) {
            Storage::delete('public/images/' . $ramen->image_path);
        }

        // 新しい画像を保存
        $path = $request->file('image')->store('public/images');
        $validated['image_path'] = basename($path);
    }

    ///3.SQLエラーを確認
    try {
    // 4.DBを更新して一覧画面にリダイレクト
    $ramen->update($validated);
    return redirect()->route('ramens.index')->with('success', $ramen->shop_name.'のラーメン情報を更新しました！');

     } catch (\Exception $e) {
    //5.SQLエラーの場合はログにエラー出力し編集画面にリダイレクト
        \Log::error('ラーメン情報更新エラー: '.$e->getMessage());
        return back()->withInput()->with('error', 'ラーメン情報の更新に失敗しました。もう一度お試しください。');
    }

}

//////ラーメン情報削除(ifで登録ユーザかどうかを確認)
public function destroy(Ramen $ramen)
{
    // 自分の投稿でなければ削除させない
    if ($ramen->user_id !== Auth::id()) {
        abort(403, 'このラーメンを削除する権限がありません。');
    }
    //画像がnullでない時だけ削除
    if($ramen->image_path){
    Storage::delete('public/images/' . $ramen->image_path);
}
    $ramen->delete();
    return redirect()->route('ramens.index')->with('success', '削除しました');
}

//////地図表示
   public function showmap(){
    //総数を取得
    $totalCount=Ramen::count();
    // 都道府県別の件数を取得（例：['北海道' => 5, '東京都' => 8, ...]）
    $prefectureCounts = $this->getPrefectureCounts();

    return view('ramens.map',compact('totalCount','prefectureCounts'));
    }

//////県別データ取得と表示(セッション情報から総件数と県別件数を再取得)
    public function map($prefecture){
        
        $ramens = Ramen::where('prefecture_name', $prefecture)->latest('ate_on')->paginate(10)->appends(['prefecture' => $prefecture]);
        $count = $ramens->total();

        //共通部を再取得
        $totalCount=Ramen::count();
        // 都道府県別の件数を取得（例：['北海道' => 5, '東京都' => 8, ...]）
        $prefectureCounts = $this->getPrefectureCounts();


        return view('ramens.map',compact('ramens','prefecture','count','totalCount','prefectureCounts'));
    }

//////おすすめ取得と表示（ログインユーザのみのお気に入り表示）
    public function recomend(){
        //$ramens = Ramen::where('is_recommended',true)->latest()->paginate(10);(全件表示)
        $ramens = Auth::user()->ramens()->where('is_recommended', 1)->latest('ate_on')->paginate(10);
        return view('ramens.recomend',compact('ramens'));
    }

//////一覧から詳細をモーダルで取得
public function showrecord($id)
{
    $ramen = Ramen::findOrFail($id);

    return response()->json([
        'shop_name' => $ramen->shop_name,
        'date' => $ramen->ate_on,
        'prefecture' => $ramen->prefecture_name,
        'review' => $ramen->review,
        'is_recomended' => $ramen->is_recommended,
        'shop_url' => $ramen->shop_url,
        'image_path' =>$ramen->image_path,
    ]);
}

//県別カウント共通化
private function getPrefectureCounts()
{
    return Ramen::select('prefecture_name')
        ->selectRaw('count(*) as count')
        ->groupBy('prefecture_name')
        ->pluck('count', 'prefecture_name')
        ->toArray();
}



}
