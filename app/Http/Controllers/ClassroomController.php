<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom as MainModel;
use App\Models\Classroom;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function index()
    {
        $dataClass = Classroom::all();
        $ids = [];
        $ids1 = [];
        $datas = StudentProfile::all();
        foreach ($dataClass as $class) {
            if (empty($data)) {
                $ids1[] = $class->id;
            }
            foreach ($datas ?? [] as $data) {
                if (!in_array($class->id, $data['class_id'])) {
                    $ids1[] = $class->id;
                }
                foreach ($data['class_id'] as $value) {
                    $ids[] = $value;
                }
            }

        }
        
        $arr = array_count_values($ids);
        $arr1 = array_count_values($ids1);

        foreach ($arr1 as $key =>  $ids11) {
            if (!in_array($key, array_keys($arr))) {
                $arr += [$key => 0];
            }
        }

        $rows = [];
        foreach ($arr as $key => $value1) {
            $dataClass = Classroom::find($key);
            $rows[] = [
                'id' => $key,
                'count' => $value1/2,
                'name' => $dataClass['name']
            ];
        }

        $keyword = trim(request()->keywords);
        if ($keyword) {
            $rows = collect($rows)->where('name', $keyword);
        }

        return view('classes.index', compact('rows'));
    }
    public function find(Request $request)
    {
        $keyword = $request->keywords;
        $data['rows'] = MainModel::where('name', 'like', '%'.$keyword.'%')->get();
        return view('classes.index', $data);
    }
    public function findstudentbyclass(Request $request)
    {
        $keyword = $request->keywords;
        $data['rec'] = MainModel::where('name', 'like', '%'.$keyword.'%')->get();
        return view('classes.student_list', $data);

    }
    public function add()
    {
        return view('classes.form');
    }

    public function view($id) {
        $rec = Classroom::findOrFail($id);
        $datas = StudentProfile::query()
                    ->join('users', function($join) {
                        $join->on('users.profile_id', 'student_profiles.id')
                            ->where('users.role', 'student');
                    })
                    ->select('student_profiles.dob', 'student_profiles.code', 'student_profiles.class_id', 'users.name', 'users.id')
                    ->get();
        $arr = [];
        foreach($datas as $data) {
            if (in_array($id, $data['class_id'])) {
                $arr[] = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'code' => $data['code'],
                    'dob' => $data['dob'],
                ];
            }
        }
        
        $keyword = trim(request()->keywords);
        if ($keyword) {
            $arr = collect($arr)->where('code', $keyword);
        }
        return view('classes.student_list', compact('arr', 'rec'));
    }

    public function create(Request $request)
    {
        try {
            $params = $request->all();
            DB::transaction(function () use ($params) {
                MainModel::create($params);
            });
            return redirect()->route('classes')->withSuccess("Added");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $data['rec'] = MainModel::findOrFail($id);
        return view('classes.form')->with($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $rec = MainModel::findOrFail($id);
            $params = $request->all();
            DB::transaction(function () use ($params, $rec) {
                $rec->update($params);
            });
            return redirect()->route('classes')->withSuccess("Updated");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $rec = MainModel::findOrFail($id);
            if($rec->students->count() > 0)
                throw new \Exception('You must remove all students from the class before deleting the class');
            $rec->delete();
            return redirect()->back()->withSuccess("Deleted");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
