<?php

namespace App\Http\Controllers;

use App\Mahasiswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
        die();
        $jml   = collect(['Interval 0.00-2.45', 'Interval 2.46-2.79', 'Interval 2.80-3.13', 'Interval 3.14-4.00']);
        $int1  = Mahasiswa::whereBetween('ipk_smt_1', array(0.00, 2.45))->count();
        $int2  = Mahasiswa::whereBetween('ipk_smt_1', array(2.46, 2.79))->count();
        $int3  = Mahasiswa::whereBetween('ipk_smt_1', array(2.80, 3.13))->count();
        $int4  = Mahasiswa::whereBetween('ipk_smt_1', array(3.14, 4.00))->count();
        $int12 = Mahasiswa::whereBetween('ipk_smt_2', array(0.00, 2.41))->count();
        $int22 = Mahasiswa::whereBetween('ipk_smt_2', array(2.42, 2.69))->count();
        $int32 = Mahasiswa::whereBetween('ipk_smt_2', array(2.70, 2.97))->count();
        $int42 = Mahasiswa::whereBetween('ipk_smt_2', array(2.98, 4.00))->count();
        $int13 = Mahasiswa::whereBetween('ipk_smt_3', array(0.00, 2.584))->count();
        $int23 = Mahasiswa::whereBetween('ipk_smt_3', array(2.585, 2.96))->count();
        $int33 = Mahasiswa::whereBetween('ipk_smt_3', array(2.97, 3.335))->count();
        $int43 = Mahasiswa::whereBetween('ipk_smt_3', array(3.336, 4.00))->count();
        $int14 = Mahasiswa::whereBetween('ipk_smt_4', array(0.00, 2.75))->count();
        $int24 = Mahasiswa::whereBetween('ipk_smt_4', array(2.76, 3.05))->count();
        $int34 = Mahasiswa::whereBetween('ipk_smt_4', array(3.06, 3.35))->count();
        $int44 = Mahasiswa::whereBetween('ipk_smt_4', array(3.36, 4.00))->count();
        $com   = collect([$int1, $int2, $int3, $int4]);
        $com2  = collect([$int12, $int22, $int32, $int42]);
        $com3  = collect([$int13, $int23, $int33, $int43]);
        $com4  = collect([$int14, $int24, $int34, $int44]);
        return view('home', compact('jml', 'com', 'com2', 'com3', 'com4'));
    }
}
