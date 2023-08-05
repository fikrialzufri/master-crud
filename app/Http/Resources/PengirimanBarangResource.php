<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PengirimanBarangResource extends JsonResource
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
            'tanggal' => $this->tanggal,
            'tanggal_resi' => $this->tanggal_resi,
            'pengirim' => $this->pengirim,
            'pengirim_kirim_id' => $this->pengirim_kirim_id,
            'penerima' => $this->penerima,
            'penerima_kirim_id' => $this->penerima_kirim_id,
            'koli_berat' => $this->koli_berat,
            'total_qty' => $this->total_qty,
            'total_bayar' => $this->total_bayar,
            'total_transaksi' => $this->total_transaksi,
            'sub_total_harga_kubikasi' => $this->sub_total_harga_kubikasi,
            'sub_total_harga_berat' => $this->sub_total_harga_berat,
            'cash' => $this->cash,
            'transfer' => $this->transfer,
            'tujuan' => $this->tujuan,
            'asal' => $this->asal,
        ];
    }
}