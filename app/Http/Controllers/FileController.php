<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\HearingDate;
use App\Models\Upload;
use App\Traits\ImageStore;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FileController extends Controller
{
    use ImageStore;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Cases::with('allFiles')->findOrFail(request()->case);
        return view('case.file.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $case_id = request()->case;
        Cases::findOrFail($case_id);
        $date_id = request()->date;
        if ($date_id){
           HearingDate::findOrFail($date_id);
        }

        return view('file.create', compact('date_id', 'case_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $case = Cases::find(request()->case);
        if (!$case){
            throw ValidationException::withMessages(['message' => __('common.Something Went Wrong')]);
        }
        $goto = route('file.index', ['case' => $case->id]);

        $date_id = request()->date;
        if ($date_id){
            $date = HearingDate::find($date_id);
            if (!$date){
                throw ValidationException::withMessages(['message' => __('common.Something Went Wrong')]);
            }
            $goto = route('case.show', $case->id);
        }

        $validate_rules =  [
            'file.*' => 'sometimes|nullable|mimes:jpg,bmp,png,doc,docx,pdf,jpeg,txt',
        ];
        $request->validate($validate_rules, validationMessage($validate_rules));

        if ($request->file){
            $getSystemStorage = isStorageLimitExceeded();
            if($getSystemStorage['status']){
                throw ValidationException::withMessages(['message' => $getSystemStorage['message']]);
                return false;
            }
            $index=0;
            foreach($request->file as $file){
                $client2view = request()->{'checkViewTo'.$index};
                if($client2view!=1)$client2view=0;
                $this->storeFile($file, $case->id,$client2view, $date_id);
                $index++;
            }

        }

        $response = [
            'goto' => $goto,
            'message' => __('common.Successfully Updated'),
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = Upload::where('uuid', $id)->firstOrFail();
        return view('file.show', compact('file'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $file = Upload::where('uuid', $id)->firstOrFail();
        $filename = 'temp-image.jpg';
        $tempFile = tempnam(sys_get_temp_dir(), $filename);
        copy($file->filename, $tempFile);
        $headers = ['Content-Type: '.$file->file_type];
        return response()->download($tempFile, $file->user_filename, $headers);
        
    }
    public function client2view(Request $request,$id)
    {
        if ($request->ajax()) {
            $file = Upload::where('uuid', $id)->firstOrFail();
            if($file->client2view==1)
                $file->client2view = 0;
            else
                $file->client2view = 1;
            $file->save();
            return response()->json(['message' => __('common.Successfully Updated'), 'client2view' => $file->client2view]);
        }
        exit;
    }   
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = Upload::where('uuid', $id)->firstOrFail();
        return view('file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate_rules =  [
            'file.*' => 'sometimes|nullable|mimes:jpg,bmp,png,doc,docx,pdf,jpeg,txt',
        ];
        $request->validate($validate_rules, validationMessage($validate_rules));

        $file = Upload::where('uuid', $id)->first();
        if (!$file){
            throw ValidationException::withMessages(['file' => __('common.Something Went Wrong')]);
        }
        if ($request->has('file')){
            
            $getSystemStorage = isStorageLimitExceeded();
            if($getSystemStorage['status']){
                throw ValidationException::withMessages(['message' => $getSystemStorage['message']]);
                return false;
            }
            
            $this->updateFile($request->file, $file);
        }

        return response()->json(['message' => __('common.Successfully Updated'), 'goto' => route('case.show', $file->case_id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Upload::where('uuid', $id)->first();
        if (!$file){
            throw ValidationException::withMessages(['message' => __('common.Something Went Wrong')]);
        }
        if (\Illuminate\Support\Facades\File::exists($file->filepath)){
            \Illuminate\Support\Facades\File::delete($file->filepath);
        }
        $case_id = $file->case_id;
        $file->delete();
        return response()->json(['message' => __('common.Successfully deleted'), 'goto' => route('case.show', $case_id)]);
    }
}
