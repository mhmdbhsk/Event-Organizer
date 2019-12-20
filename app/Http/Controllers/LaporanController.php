<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;

class LaporanController extends Controller
{
    public function eventpdf()
    {
        $pdf = PDF::loadView('admin.event.laporan');
        return $pdf->download('event.pdf');
    }

    public function eventexcel()
    {
        $event=\App\Event::all();
        Excel::create('Export Data', function($excel) use($event){
            $excel->sheet('event', function($sheet) use($event){
            $sheet->fromArray($event);
            });
        })->export('xlsx');
    }

    public function userpdf()
    {
        $pdf = PDF::loadView('admin.user.laporan');
        return $pdf->download('user.pdf');
    }

    public function userexcel()
    {
        $user=\App\User::all();
        Excel::create('Export Data', function($excel) use($user){
            $excel->sheet('user', function($sheet) use($user){
            $sheet->fromArray($user);
            });
        })->export('xlsx');
    }
}
