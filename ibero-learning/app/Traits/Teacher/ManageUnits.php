<?php
namespace App\Traits\Teacher;

use App\Helpers\Uploader;
use App\Http\Requests\UnitRequest;
use App\Models\Course;
use App\Models\Unit;
use Exception;
use Illuminate\Support\Facades\Storage;

trait ManageUnits {
    public function units(){
        $units = Unit::forTeacher();
        return view('teacher.units.index',compact('units'));
    }
    public function createUnit(){
        $title = __("Nueva unidad");
        $textButton = "Crear unidad";
        $courses = Course::forTeacher();
        $unit = new Unit;
        $options = ['route'=>["teacher.units.store"],"files"=>true];
        return view('teacher.units.create', compact('title', 'courses', 'unit', 'options', 'textButton'));
    }
    public function storeUnit(UnitRequest $request) {
        $file = null;
        if ($request->hasFile("file")) {
            $file = Uploader::uploadFile("file", "units");
            // $file = Storage::put('units', $request->file('file'));
        }

        $unit = Unit::create([
            'course_id'=>$request->course_id,
            'title'=>$request->title,
            'content'=>$request->content,
            'file'=>$file,
            'unit_type'=>$request->unit_type,
            'unit_time'=>$request->unit_time,
        ]);
  

        session()->flash(
            "message", [
                "success",
                __("Unidad dada de alta satisfactoriamente")
            ]
        );
        return redirect(route('teacher.units'));
    }
    public function editUnit(Unit $unit){
        $title = __("Editar unidad :unit",["unit"=>$unit->id]);
        $textButton = __("Actualizar unidad");
        $courses = Course::forTeacher();
        $options = ["route"=>[
            'teacher.units.update',["unit"=>$unit->id]],'files'=>true
        ];
        $update = true;
        return view('teacher.units.edit',compact('title','courses','unit','options','textButton','update'));
    }
    public function updateUnit(UnitRequest $request, Unit $unit){
        $file  = $unit->file;
        if($request->hasFile('file')){
            if($unit->file){
                Uploader::removeFile("units",$unit->file);
            }
            $file = Uploader::uploadFile("file","units");
        }
        $unit->fill([
            "course_id"=>$request->course_id,
            "title" => $request->title,
            "content" => $request->content,
            "file" => $file,
            "unit_type" => $request->unit_type,
            "unit_time" => $request->unit_time,
        ])->save();
        session()->flash("message",["success",__("Unidad actualizada satisfactoriamente")]);
        return redirect()->route("teacher.units");
    }
    public function destroyUnit(UnitRequest $request,Unit $unit){
        try{
            if(request()->ajax()){
                if($unit->file){
                    Uploader::removeFile("units",$unit->file);
                }
                $unit->delete();
            }else{
                abort(401);
            }
            session()->flash("message",["success",__("La unidad :id del curso :course ha sido eliminada exitosamente",[
                "id"=>$unit->id,
                "course"=>$unit->course->title,
            ])]);
        }catch(\Exception $ex){
            session()->flash("message",["danger",$ex->getMessage()]);
            return response()->json($ex->getMessage());
        }
    }
}
?>