<?php

namespace App\Http\Controllers;

use App\Models\Warga;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $warga = Warga::where('nik', $user->nik)->firstOrFail();

        $breadcrumb = [
            'title' => 'Profil',
            'list' => [
                [
                    'label' => 'Profil',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('profil'), 'label' => 'Profil'],
                    ],
                ],
                ['label' => 'Detail Profil', 'url' => route('profil')],
            ],
        ];

        return view('warga.profil', [
            'breadcrumb' => $breadcrumb,
            'warga' => $warga,
        ]);
    }

}
