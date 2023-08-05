<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PelangganResource extends JsonResource
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
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'kota_id' => $this->kota_id,
            'limit' => $this->limit,
            'plafon' => $this->plafon,
            'total_hutang' => $this->total_hutang,
            'data' => [
                'id' => $this->id,
                'nama' => $this->nama,
                'no_hp' => $this->no_hp,
                'email' => $this->email,
                'alamat' => $this->alamat,
                'kota_id' => $this->kota_id,
                'limit' => $this->limit,
                'plafon' => $this->plafon,
                'total_hutang' => $this->total_hutang,
            ],
        ];
    }
}