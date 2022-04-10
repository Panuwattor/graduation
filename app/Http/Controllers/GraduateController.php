<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Graduate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraduateController extends Controller
{
    public function index()
    {
        $graduates = Graduate::orderBy('numberGraduate')->get();

        return view('graduate.index', compact('graduates'));
    }

    public function branch()
    {
        $graduates = Graduate::select('description', DB::raw('count(*) as cnt'))->groupBy('description')->get();

        return view('graduate.branch', compact('graduates'));
    }
    public function description($description)
    {
        $graduates = Graduate::where('description',$description)->orderBy('numberGraduate')->get();

        return view('graduate.description', compact('graduates','description'));
    }

    public function store()
    {

        if (!request('studentCode') || !request('numberGraduate') || !request('name') || !request('description')) {
            alert()->error('ผิดพลาด', 'ข้อมูลไม่ครบ');
            return back();
        }
        if (request('type_photo') == 1) {
            if (!request('photo_url')) {
                alert()->error('ผิดพลาด', 'ใส่ URL ด้วย');
                return back();
            }else{
                $photo = request('photo_url');
            }
        }else{
            if (!request('photo_server')) {
                alert()->error('ผิดพลาด', 'เพิ่มรูปภาพด้วย');
                return back();
            }else{
                $photo = request('photo_server')->store('graduate','public');
            }
        }
        Graduate::create([
            'studentCode'=> request('studentCode'),
            'numberGraduate'=> request('numberGraduate'),
            'name'=> request('name'),
            'description'=> request('description'),
            'type_photo'=> request('type_photo'),
            'photo'=> $photo,
            'stauts'=>request('status')
        ]);

        alert()->success('สำเร็จ', 'เพิ่มรายการเรียบร้อย');
        return back();
    }

    public function update(Graduate $graduate)
    {

        if (!request('description')) {
            alert()->error('ผิดพลาด', 'ข้อมูลไม่ครบ');
            return back();
        }

        if (request('background')) {
            Storage::disk('public')->delete($graduate->background);
        } else {
            $background = $graduate->background;
        }

        $graduate->update(array_merge(request()->all(), ['background' => $background]));
        alert()->success('สำเร็จ', 'แก้ไขรายการเรียบร้อย');
        return back();
    }

    public function print($description)
    {
        if(!request('ids')){
            alert()->error('ผิดพลาด', 'ไม่ได้เลือกรายการ');
            return back();
        }
        $branch = Branch::where('status',1)->where('description',$description)->first();
        if(!$branch){
            alert()->error('ผิดพลาด', 'ไม่พบสาขาปริญญา');
            return back();
        }

        $graduates = Graduate::whereIn('id',request('ids'))->get();
        return view('graduate.print', compact('graduates','branch'));
    }
}
