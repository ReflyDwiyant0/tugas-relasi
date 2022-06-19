<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        return response()->json($data, 200);
    }

    //cara pertama menampilkan data secara simpel
    // public function show(Customer $id)
    // {
    //     return response()->json($id, 200);
    // }

    //cara kedua menampilkan data secara detail
    public function show($id)
    {
        $data = Customer::where('id',$id)->first();
        //cek data dengan id yang dikirimkan
        if(empty($data)){
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }
        return response()->json([
            'pesan' => 'Data ditemukan',
            'data' => $data        
        ], 200);
    }

    public function store(Request $request)
    {
        //Proses Validasi
        $validate = Validator::make($request->all(),[
            'name' => 'required', 
            'phone' => 'required', 
            'email' => 'required', 
            'address' => 'required', 
        ]);
        if ($validate->fails()){
            return $validate->errors();
        } 
    }
    //Proses simpan perubahan data
    $data = Customer::create($request->all());
    return response()->json([
        'pesan' => 'Data berhasil disimpan',
        'data' => $data
    ], 201);

    public function delete($id)
    {
        $data = Customer::where('id',$id)->first();
        //cek data dengan id yang dikirimkan
        if(empty($data)){
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }
    
        $data->delete();

        return response()->json([
            'pesan' => 'Data berhasil di hapus',
            'data' => $data
        ], 200);
    }
}

   
