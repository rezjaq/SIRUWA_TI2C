@extends('layouts.app')
@section('content')
    <div class="book mb-5" style="margin-bottom: ">
        <div class="page" id="result">
            <table>
                <tr>
                    <td colspan="3">
                        <div style="text-align: center; font-size: 16px; font-weight: bold;">
                            KELURAHAN CANDIRENGGO <br>RUKUN WARGA 02<br>RUKUN TETANGGA<br>
                        </div>
                    </td>
                </tr>
            </table>
            <hr>
            <hr style="border: 2px solid black; margin-top: 0px;">
            <table>
                <tr>
                    <td style="width: 100px;">Nomer</td>
                    <td>:</td>
                    <td>&nbsp;
                        <span id="id-nomor-surat">......</span>/ RT /<span id="id-rw">......</span>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Lampiran</td>
                    <td>:</td>
                </tr>
                <tr>
                    <td style="width: 100px;">Perihal</td>
                    <td>:</td>
                    <td><b><u>&nbsp;Surat Pengantar</u></b></td>
                </tr>
                <tr>
                    <td style="width: 100px;">Kepada</td>
                    <td>:</td>
                    <td>Yth. Kepala Kelurahan Candirenggo</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>di</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Candirenggo</td>
                </tr>
            </table>

            <p>Bersama ini kami hadapkan seorang
                <input type="radio" id="laki-laki" name="jenis-kelamin" value="laki-laki">
                <label for="laki-laki">laki-laki</label>
                <input type="radio" id="perempuan" name="jenis-kelamin" value="perempuan">
                <label for="perempuan">perempuan</label>
            </p>
            <table>
                <tr>
                    <th>- Nama</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="nama" required></td>
                </tr>
                <tr>
                    <th>- Tempat/Tgl. Lahir</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="tempat_tgl_lahir" required></td>
                </tr>
                <tr>
                    <th>- Kebangsaan</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="kebangsaan" required></td>
                </tr>
                <tr>
                    <th>- Agama</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="agama" required></td>
                </tr>
                <tr>
                    <th>- Pekerjaan</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="pekerjaan" required></td>
                </tr>
                <tr>
                    <th>- Status Perkawinan</th>
                    <td>:</td>
                    <td>
                        <input type="radio" id="kawin" name="status_perkawinan" value="Kawin" required>
                        <label for="kawin">Kawin</label>
                        <input type="radio" id="belum_kawin" name="status_perkawinan" value="Belum Kawin" required>
                        <label for="belum_kawin">Belum Kawin</label>
                        <input type="radio" id="janda" name="status_perkawinan" value="Janda" required>
                        <label for="janda">Janda</label>
                        <input type="radio" id="duda" name="status_perkawinan" value="Duda" required>
                        <label for="duda">Duda</label>
                    </td>
                </tr>
                <tr>
                    <th>- Pendidikan Terakhir</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="pendidikan_terakhir" required></td>
                </tr>
                <tr>
                    <th>- No. KTP</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="no_ktp" required></td>
                </tr>
                <tr>
                    <th>- No. KSK</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="no_ksk" required></td>
                </tr>
                <tr>
                    <th>- Alamat</th>
                    <td>:</td>
                    <td><input class="warga-tetap" name="alamat" required></td>
                </tr>
            </table>
            
            <p style="margin-bottom: 0;">Kepada yang bersangkutan mohon dibantu dilayani surat</p>
            <table>
                <tr>
                    <td>
                        <label style="font-weight: normal;">
                            <input type="checkbox" id="ktp" name="surat" value="Kartu Tanda Penduduk (KTP)"> Kartu Tanda Penduduk (KTP)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="font-weight: normal;">
                            <input type="checkbox" id="ksk" name="surat" value="Kartu Susunan Keluarga (KSK)"> Kartu Susunan Keluarga (KSK)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="font-weight: normal;">
                            <input type="checkbox" id="pindah" name="surat" value="Surat Keterangan Pindah Tempat Tinggal"> Surat Keterangan Pindah Tempat Tinggal
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="font-weight: normal;">
                            <input type="checkbox" id="bepergian" name="surat" value="Surat Keterangan Bepergian ke"> Surat Keterangan Bepergian ke <input type="text"> selama <input type="text">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="font-weight: normal;">
                            <input type="checkbox" id="lainnya" name="surat" value="Surat Keterangan"> Surat Keterangan <input type="text">
                        </label>
                    </td>
                </tr>
            </table>

            <p class="keterangan-penyelesaian">Demikian untuk menjadikan periksa dan mohon penyelesainnya</p>
            <div class="div-ketua">
                <div style="width: 80mm;">
                    <p id="ketua-rw"></p>
                    <p style="margin-bottom: 5mm;">Ketua Rukun Tetangga (RT)</p>
                    <p style="margin-top: 25mm;">(.................................................)</p>
                </div>
            </div>
            
            <div class="div-ketua">
                <div style="width: 80mm;">
                    <p id="ketua-rw"></p>
                    <p>Ketua Rukun Warga (RW) 02</p>
                    <p style="margin-top: 25mm;">(.................................................)</p>
                </div>
            </div>

            <div style="margin-top: 10mm; float: left;" class="catatan-lampiran">
                <h3 style="margin-bottom: 0;">Catatan:</h3>
                <p style="margin-top: 0; margin-bottom: 0;">Harap dilampiri</p>
                <ol style="margin-top: 0;">
                    <li>FOTOCOPY KARTU SUSUNAN KELUARGA</li>
                    <li>FOTOCOPY KTP</li>
                    <li>PBB</li>
                </ol>
            </div>
            
            
        </div>
    </div>
@endsection

@push('css')
    <style>
        
        body {
            margin: 0;
            padding: 0;
        }

        .book {
            width: 176mm; /* Ukuran kertas B5 */
            height: 250mm; /* Ukuran kertas B5 */
            padding: 10mm; /* Padding yang lebih kecil untuk kertas B5 */
            margin: 0 auto;
            position: relative;
        }

        .page {
            margin: 0 auto;
        }

        .catatan-lampiran {
            position: absolute;
            bottom: 70px; /* Penyesuaian posisi catatan lampiran */
            left: 0;
            width: 50%;
        }

        .keterangan-penyelesaian {
            margin-bottom: 0;
        }

        .div-ketua {
            margin-top: 2mm;
            float: right;
            width: 80mm;
            text-align: center;
            line-height: 1.5;
        }

        table {
            width: 100%;
        }

        th {
            text-align: left; /* Mengatur teks di dalam th menjadi rata kiri */
            font-weight: normal;
        }

        input[class="warga-tetap"] {
            width: 100%; /* Mengisi seluruh lebar sel */
            box-sizing: border-box; /* Menghitung padding dan border ke dalam total lebar */
        }

        p {
            margin: 0; /* Menghilangkan margin bawaan untuk paragraf */
        }

        ol {
            margin-top: 0; /* Menghilangkan margin atas untuk daftar terurut */
        }

        /* Menyesuaikan lebar div dengan ukuran kertas B5 */
        .div-ketua,
        .catatan-lampiran {
            width: 50%; /* Menjadi setengah dari lebar kontainer */
        }

    </style>
@endpush