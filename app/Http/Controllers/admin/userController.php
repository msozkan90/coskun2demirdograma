<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
class userController extends Controller
{
   public function User(){
       $users=User::paginate(5);
       return view('admin.user',compact('users'));
   }
    public function UserAdd(userRequest $request){
        $user = $request->except('_token');
        $email_check = User::where('email','=',$user['email'])->count();
        if ($user['password'] !== $user['password_confirmation']){
            return redirect()->back()->with('status-danger', 'Parolalar eşleşmiyor!');
        }
        if ($email_check !== 0){
            return redirect()->back()->with('status-danger', 'Bu email zaten kullanılıyor!');
        }
        $user['password'] = bcrypt($user['password']);
        $insert = User::create($user);
            if ($insert) {
                return redirect()->back()->with('status-success', 'Yeni kullanıcı başarılı bir şekilde eklendi');
            } else {
                return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
            }
    }
    public function UserEdit(Request $request,$id){
        $users=User::paginate(5);
        $c = User::where('id', '=', $id)->count();
        if ($c != 0) {
            $user_data = User::where('id', '=', $id)->where('id','=',$id)->get();
            return view('admin.user_edit', compact('users','user_data'));
        } else {
            return redirect('admin.user');
        }
    }
    public function UserUpdate(userRequest $request){
        $id = $request->route('id');
        $old_user_info= User::where('id','=',$id)->get();
        $old_user_count= User::where('id','=',$id)->count();
        $user = $request->except('_token');
        if ($old_user_count !== 0){
            $call_service= new UserService();
            $call_service->UserUpdate($request,$user);
        if ($user['password'] !== $user['password_confirmation']){
            return redirect()->back()->with('status-danger', 'Parolalar eşleşmiyor!');
        }
        $user = $request->except('_token','password_confirmation');
        $user['password'] = bcrypt($user['password']);
        $old_user_info['name'] = $user['name'];
        $old_user_info['password'] = $user['password'];
        $old_user_info['email'] = $user['email'];
        if ($user['password'] !== $old_user_info['password']){
                return redirect()->back()->with('status-danger', 'Hatalı Parola!');
            }
        else{
            $update = User::where('id', '=', $id)->update($user);
            if ($update) {

                return redirect()->back()->with('status-success', 'Kullanıcı başarılı bir şekilde güncellendi');
            } else {
                return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
            }
        }
        }
        else{
            return redirect()->back()->with('status-danger', 'Böyle bir kullanıcı bulunmamaktadır.');
        }
    }
    public function UserDelete(Request $request,$id){
        $c = User::where('id', '=', $id)->count();
        if ($c != 0) {
            $delete = User::where('id', '=', $id)->delete();
            if($delete){
                $users=User::all();
                return redirect('admin/kullanici')->with('status-success', 'Kullanıcı başarılı bir şekilde silindi');
            }
        }
        else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }
}
