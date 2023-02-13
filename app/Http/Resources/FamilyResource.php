<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FamilyResource extends JsonResource
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
            "id"                => $this->id,
            "nama"              => $this->nama,
            "jenis_kelamin"     => ($this->jenis_kelamin == 1) ? 'Laki-laki' : 'Perempuan',
            "orang_tua"         => $this->parent->nama ?? '',
        ];
    }
}
