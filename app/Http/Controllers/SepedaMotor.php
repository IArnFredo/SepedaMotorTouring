<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;

class SepedaMotor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // User
    public function store(Request $request)
    {
          $rules = [
              'fname' => 'required',
              'harga' => 'required|not_in:0',
              'ban' => 'required|not_in:0',
          ];
          $customMessages = [
              'fname.required' => 'Nama Depan harus diisi !!',
              'harga.required' => 'Range Harga harus diisi !!',
              'ban.required' => 'Tipe Ban harus diisi !!',

          ];
          $this->validate($request, $rules, $customMessages);


          $data = $request->all();
          $w_c = array();
          $totalbobotawal = 0;
          $totalbobotakhir = 0;
          // dd($data);
          $kriteria = array($data['kapasitasbensin'],$data['ergonomis'],$data['mesin'],$data['sukucadang'],$data['servicecenter']);
          foreach ($kriteria as $i => $value) {
            $totalbobotawal += $kriteria[$i];
          }

          foreach ($kriteria as $i => $value) {
              $w_c[$i] =round($kriteria[$i]/$totalbobotawal,2);
          }
          foreach ($w_c as $i => $value) {
              $totalbobotakhir += $w_c[$i];
          }

          $irit[] = array();
          $ergonomis[] = array();
          $mesin[] = array();
          $sukucadang[] = array();
          $service[] = array();

          $query = DB::table('listmotor')->where('range_harga',$data['harga'])->where('tipe_ban',$data['ban'])->get();
          foreach ($query as $key => $value) {
            $irit[$key] = $query[$key]->keiritan_bensin;
            $ergonomis[$key] = $query[$key]->ergonomis;
            $mesin[$key] = $query[$key]->mesin;
            $sukucadang[$key] = $query[$key]->suku_cadang;
            $service[$key] = $query[$key]->service_center;
          }

          $irit_max = max($irit);
          $ergonomis_max = max($ergonomis);
          $mesin_max = max($mesin);
          $sukucadang_max = max($sukucadang);
          $service_max = max($service);

          $irit_R = array();
          $ergonomis_R = array();
          $mesin_R = array();
          $sukucadang_R = array();
          $service_R = array();

          foreach ($irit as $i => $value) {
            $irit_R[$i] = round($irit[$i] / $irit_max ,2);
            $ergonomis_R[$i] = round( $ergonomis[$i] / $ergonomis_max,2);
            $mesin_R[$i] = round($mesin[$i] / $mesin_max ,2);
            $sukucadang_R[$i] = round($sukucadang[$i]/ $sukucadang_max  ,2);
            $service_R[$i] = round($service[$i] / $service_max ,2);
          }

          /*Matriks normalisasi terbobot (v) */
          $irit_V = array();
          $ergonomis_V = array();
          $mesin_V = array();
          $sukucadang_V = array();
          $service_V = array();

          foreach ($irit_R as $i => $value) {
              $irit_V[$i] = round(pow($irit_R[$i], $w_c[$i]), 2);
              $ergonomis_V[$i] = round(pow($ergonomis_R[$i], $w_c[$i]), 2);
              $mesin_V[$i] = round(pow($mesin_R[$i], $w_c[$i]), 2);
              $sukucadang_V[$i] = round(pow($sukucadang_R[$i], $w_c[$i]), 2);
              $service_V[$i] = round(pow($service_R[$i], $w_c[$i]), 2);
          }
          $Performance_score = array();

          foreach ($query as $i => $value) {
            $Performance_score[$i] = round($irit_V[$i] * $ergonomis_V[$i] * $mesin_V[$i] * $sukucadang_V[$i] * $service_V[$i] ,2);
          }

          $ordered_values = $Performance_score;
          rsort($ordered_values);
          $x = 0;
          $y = -1;
          $key2 = array();
          foreach ($Performance_score as $key => $Performance_score) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($Performance_score === $ordered_value) {
                  $key  = $ordered_key;
                  $key2 = array();
                  $x++;
                  $y++;
                  break;
                }
            }
            if ((int)$key+1 == 1) {
                $motor = DB::table('listmotor')->where('tipe_motor',$query[$y]->tipe_motor)->first();
                // Ergonomis change
                switch ($motor->ergonomis) {
                  case 1:
                    $motor->ergonomis = 'Sangat Tidak Nyaman';
                    break;
                  case 2:
                    $motor->ergonomis = 'Tidak Nyaman';
                    break;
                  case 3:
                    $motor->ergonomis = 'Biasa';
                    break;
                  case 4:
                    $motor->ergonomis = 'Nyaman';
                    break;
                  case 5:
                    $motor->ergonomis = 'Sangat Nyaman';
                    break;
                  default:
                  echo"Tidak ada data";
                }
                // Suku cadang change
                switch ($motor->suku_cadang) {
                  case 1:
                    $motor->suku_cadang = 'Sangat Sulit Dicari';
                    break;
                  case 2:
                    $motor->suku_cadang = 'Sulit Dicari';
                    break;
                  case 3:
                    $motor->suku_cadang = 'Biasa';
                    break;
                  case 4:
                    $motor->suku_cadang = 'Mudah Dicari';
                    break;
                  case 5:
                    $motor->suku_cadang = 'Sangat Mudah Dicari';
                    break;
                  default:
                  echo"Tidak ada data";
                }
                // service_center change
                switch ($motor->service_center) {
                  case 1:
                    $motor->service_center = 'Sangat Sedikit';
                    break;
                  case 2:
                    $motor->service_center = 'Sedikit';
                    break;
                  case 3:
                    $motor->service_center = 'Biasa';
                    break;
                  case 4:
                    $motor->service_center = 'Banyak';
                    break;
                  case 5:
                    $motor->service_center = 'Sangat Banyak';
                    break;
                  default:
                  echo"Tidak ada data";
                }
                $pengguna = DB::table('listpengguna')->insert([
                    'id_motor' => $motor->id,
                    'nama_depan' => $data['fname'],
                    'nama_belakang' => $data['lname'],
                    'merk_motor' => $motor->merk_motor,
                    'tipe_motor' => $motor->tipe_motor,
                ]);
                return view('result', compact('motor'));
            }
          }
    }

    public function show(Request $request){
        $harga = DB::table('range_harga')->get();
        $ban = DB::table('tipe_ban')->get();
        $listpengguna = DB::table('listpengguna')->get();
        return view('main', compact('harga','ban','listpengguna'));
    }



    // ADMIN

    public function dashboard(Request $request){
      if ($request->session()->has('login')) {
          $nama = $request->session()->get('nama_admin');
          $data = DB::table('listmotor')->get();
          return view('/admin/admindashboard', compact('data'));
      }else {
          return redirect('/adminlogin');
      }

    }

    public function admin(Request $request){
      if ($request->session()->has('login')){
        return redirect('/admin/dashboard');
      }else {
        return view('/admin/adminlogin');
      }
    }

    public function adminlogin(Request $request)
    {
      if ($request->session()->has('login')) {
        return back()->withInput();
      }else {
        $rules = [
            'password' => 'required',
            'username' => 'required',
        ];
        $customMessages = [
            'username.required' => 'Username harus diisi !!',
            'password.required' => 'Password harus diisi !!',

        ];
        $this->validate($request, $rules, $customMessages);
        $hashed = $request->password;
        $username = $request->username;

        $data = DB::table('admin')->where('username',$username)->first();
        $request->session()->put('nama_admin',$data->username);
        if (Hash::check($hashed,$data->password)) {
          $request->session()->put('login','true');
          return redirect('/admin/dashboard');
        }else {
          return back()->with('gagal','Email atau Password salah !!');
        }
        // $id = uniqid();
      }
    }

    public function adminlogout(Request $request){
      $request->session()->flush();
      return redirect('/adminlogin');
    }

    public function tambahdataadmin(Request $request){
      if ($request->session()->has('login')) {
          $ban = DB::table('tipe_ban')->get();
          return view('/admin/admintambah',compact('ban'));
      }else {
        return view('/admin/adminlogin');
      }
    }

    public function tambahdatamotor(Request $request){
      if ($request->session()->has('login')) {
          $data = $request->all();
          $id = uniqid();
          Storage::putFileAs('/public/'.$request->tipemotor, $request->file('uploadgambar'),$request->tipemotor.'.jpg');
          $db = DB::table('listmotor')->insert([
              'id' => $id,
              'merk_motor' => $data['merk'],
              'tipe_motor' => $data['tipemotor'],
              'range_harga' => $data['rangeharga'],
              'harga' => $data['harga'],
              'tipe_ban' => $data['tipeban'],
              'kapasitas_bensin' => $data['kapasitasbensin'],
              'keiritan_bensin' => $data['iritbensin'],
              'pemakaian_bensin' => $data['pemakaianbensin'],
              'ergonomis' => $data['ergonomis'],
              'mesin' => $data['mesin'],
              'mesin_cc' => $data['ccmesin'],
              'suku_cadang' => $data['sukucadang'],
              'service_center' => $data['servicecenter'],
              'photomotor' => '/storage/'.$request->tipemotor.'/'.$request->tipemotor.'.jpg',
          ]);
          if ($db) {
            return redirect('/admin/dashboard')->with('berhasil','Data berhasil dimasukkan !!');
          }else {
            return back()->with('gagal','Data tidak berhasil dimasukkan');
          }

      }else {
        return view('/admin/adminlogin');
      }
    }


    public function edit(Request $request ,$id)
    {
      if ($request->session()->has('login')) {
        $data = DB::table('listmotor')->where('id',$id)->first();
        $ban = DB::table('tipe_ban')->get();
        $banpilih = DB::table('tipe_ban')->where('id',$data->tipe_ban)->first();
        return view('/admin/adminedit', compact('data','ban','banpilih'));
      }else {
        return view('/admin/adminlogin');
      }
    }

    /**

     */
    public function update(Request $request, $id)
    {
      if ($request->session()->has('login')) {
        $base = DB::table('listmotor')->where('id',$id)->first();
        $data = $request->all();
        $db = DB::table('listmotor')->where('id', $id)->limit(1)->update([
            'id' => $id,
            'merk_motor' => $data['merk'],
            'tipe_motor' => $data['tipemotor'],
            'range_harga' => $data['rangeharga'],
            'harga' => $data['harga'],
            'tipe_ban' => $data['tipeban'],
            'kapasitas_bensin' => $data['kapasitasbensin'],
            'keiritan_bensin' => $data['iritbensin'],
            'pemakaian_bensin' => $data['pemakaianbensin'],
            'ergonomis' => $data['ergonomis'],
            'mesin' => $data['mesin'],
            'mesin_cc' => $data['ccmesin'],
            'suku_cadang' => $data['sukucadang'],
            'service_center' => $data['servicecenter'],
            'photomotor' => '/storage/'.$request->tipemotor.'/'.$request->tipemotor.'.jpg',
        ]);
        if ($db) {
          Storage::deleteDirectory('public/'.$base->tipe_motor);
          Storage::putFileAs('/public/'.$request->tipemotor, $request->file('uploadgambar'),$request->tipemotor.'.jpg');

          return redirect('/admin/dashboard')->with('berhasil','Data berhasil diubah !!');
        }else {
          return back()->with('gagal','Data tidak berhasil dimasukkan');
        }

      }else {
        return view('/admin/adminlogin');
      }
    }

    /**

     */
    public function destroy(Request $request, $id)
    {
      if ($request->session()->has('login')) {
        $data = DB::table('listmotor')->where('id',$id)->first();
        DB::table('listmotor')->where('id', $id)->delete();
        Storage::deleteDirectory('public/'.$data->tipe_motor);
        return back()->with('delete','Data berhasil dihapus !!');
      }else {
        return view('/admin/adminlogin');
      }
    }
}
