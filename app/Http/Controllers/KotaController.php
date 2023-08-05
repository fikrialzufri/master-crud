<?php

namespace App\Http\Controllers;

use App\Http\Resources\KotaResource;
use App\Models\Kota;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    use CrudTrait;

    public function __construct()
    {
        $this->route = 'kota';
        $this->middleware('permission:view-' . $this->route, ['only' => ['index', 'show']]);
        $this->middleware('permission:create-' . $this->route, ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-' . $this->route, ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-' . $this->route, ['only' => ['delete']]);
    }

    public function configHeaders()
    {
        return [
            [
                'name'    => 'nama',
                'alias'    => 'Nama Kota',
            ],
            [
                'name'    => 'provinsi',
                'alias'    => 'Provinsi',
            ],
        ];
    }
    public function configSearch()
    {
        return [
            [
                'name'    => 'provinsi_id',
                'input'    => 'combo',
                'alias'    => 'Provinsi',
                'value' => $this->combobox('Provinsi', null, null, null, 'nama'),
                'validasi'    => ['required']
            ],
            [
                'name'    => 'nama',
                'input'    => 'text',
                'alias'    => 'Nama Kota',
                'value'    => null
            ],
        ];
    }
    public function configForm()
    {

        return [
            [
                'name'    => 'provinsi_id',
                'input'    => 'combo',
                'alias'    => 'Provinsi',
                'value' => $this->combobox('Provinsi', null, null, null, 'nama'),
                'validasi'    => ['required']
            ],
            [
                'name'    => 'nama',
                'input'    => 'text',
                'alias'    => 'Nama Kota',
                'validasi'    => ['required', 'min:1'],
            ],
        ];
    }

    public function model()
    {
        return new Kota();
    }

    // function untuk menampilkan data kota dengann parameter query

    public function getKota(Request $request)
    {
        $search = $request->search;
        $kota = Kota::where('nama', 'like', '%' . $search . '%')->get();
        $data = KotaResource::collection($kota);
        return response()->json($data);
    }
}
