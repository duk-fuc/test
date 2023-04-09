<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User as MainModel;
use App\Models\TeacherProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $data['rows'] = MainModel::where('role', 'teacher')->get();
        return view('teachers.index', $data);
    }

    public function add()
    {
        return view('teachers.form');
    }

    public function create(Request $request)
    {
        try {
            $params = $request->all();
            $params['password'] = Hash::make($params['password']);
            $params['role'] = 'teacher';
            DB::transaction(function () use ($params) {
                $params['profile_id'] = TeacherProfile::create([])->id;
                MainModel::create($params);
            });
            return redirect()->route('teachers')->withSuccess("Added");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $data['rec'] = MainModel::findOrFail($id);
        return view('teachers.form')->with($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $rec = MainModel::findOrFail($id);
            $params = $request->all();
            if (strlen($params['password']))
                $params['password'] = Hash::make($params['password']);
            else
                unset($params['password']);
            $params['role'] = 'teacher';
            DB::transaction(function () use ($params, $rec) {
                // $rec->profile->update($params);
                $rec->update($params);
            });
            return redirect()->route('teachers')->withSuccess("Updated");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
    }

    public function find(Request $request)
    {
        $keyword = $request->keywords;
        // $data['rows'] = MainModel::where('name', 'like', '%'.$keyword.'%')
        // ->orWhereHas('teacherprofile', function ($query) use ($keyword) {
        // $query->where('code', 'like', '%'.$keyword.'%');
        // })->get();
        $data['rows'] = MainModel::where('role', 'teacher')->where('name','like', '%'.$request->keywords.'%')->orwhere('username','like', '%'.$request->keywords.'%')
        ->get();
     
        return view('teachers.find', $data);

    }

    public function delete($id)
    {
        try {
            $rec = MainModel::findOrFail($id);
            $rec->profile->delete();
            $rec->delete();
            return redirect()->back()->withSuccess("Deleted");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
