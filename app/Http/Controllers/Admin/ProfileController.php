<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Updatelog;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    public function index(Request $request)
    {
        $cond_name =$request->cond_name;
        if($cond_name != '') {
            // 検索されたら検索結果を取得する
            $profile = Profile::where('name', $cond_name)->get();
        }
        else {
            // それ以外は全てのプロフィールを取得する
            $profile = Profile::all();
        }
        return view('admin.profile.index', ['profile' => $profile, 'cond_name' => $cond_name]);
    }
    
    public function edit(Request $request)
    {
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたデータをフォームデータに格納する
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        $updatelog = new Updatelog;
        $updatelog->profile_id = $profile->id;
        $updatelog->edited_at = Carbon::now();
        $updatelog->save();
       
        return redirect('admin/profile');
    }
    public function delete(Request $request) 
    {
        $profile = Profile::find($request->id);
        $profile->delete();
        return redirect('admin/profile');
    }
}
