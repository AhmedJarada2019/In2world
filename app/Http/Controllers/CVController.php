<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function index(){
        return view('dashboard.cv.index');
    }
    public function add_cv(){
        return view('dashboard.cv.add_cv');
    }
    public function get_CV(){
        $document = CV::first();
        $filePath = $document->file_path;
        $pdfContent = Storage::disk('public')->get($filePath);
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'. 'test'
        ]);

    }
}
