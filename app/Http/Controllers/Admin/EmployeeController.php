<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
class EmployeeController extends Controller
{
    public function index(Request $request){
        $query_peram = [];
        if($request->has('search')){
            $query_peram = $request->search;
        }
        $employees = Admin::with('role')->when($request->has('search'),function($query)use($request){
            return $query->where('name','LIKE','%'.$request->search.'%')
                          -> orWhere('email','LIKE','%'.$request->search.'%') ;
        })->where('id','!=',1)->paginate(15)->appends($query_peram);
        return view('admin.employee.index',compact('employees'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'       =>'required',
            'email'   => 'required',
            'password'   => 'required',
            'role'   => 'required',
            'modules'   => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $role_id = DB::table('admin_roles')->insertGetId([
            'name'     => $request->role,
            'module_access'     => json_encode($request['modules']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('admins')->insertGetId([
            'name'     => $request->name,
            'email'    => $request->email,
            'admin_role_id'    => $role_id,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('message.success','Employe Create Successfully');

    }
    public function edit(Request $request){
        $employee = Admin::with('role')->where('id',$request->id)->first();
        return view('admin.employee.edit',compact('employee'));
    }
    public function delete(Request $request){
        Admin::where('id',$request->id)->delete();
        return redirect()->back()->with('message.info','Successfully Deleted');
    }
    public function update(Request $request){
        $admin = Admin::with('role')->where('id',$request->id)->first();
        $validator = Validator::make($request->all(),[
            'name'       =>'required',
            'email'   => 'required',
            'password'   => 'required',
            'role'   => 'required',
            'modules'   => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        DB::table('admin_roles')->where('id',$admin->role->id)->update([
            'name'     => $request->role,
            'module_access'     => json_encode($request['modules']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('admins')->where('id',$request->id)->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'updated_at' => now(),
        ]);
        return redirect('admin/employee')->with('message.success','Employe Update Successfully');
    }

}
