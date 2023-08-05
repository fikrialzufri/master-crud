<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuratJalanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kode' => $this->kode,
            'tanggal' => $this->tanggal_surat_jalan,
            'karyawan' => $this->karyawan,
            'karyawan_id' => $this->karyawan_id,
            'tujuan' => $this->kota,
            'hasKota' => $this->hasKota,
            'total_koli' => $this->total_koli,
        ];
    }
}