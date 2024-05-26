<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            bottom: 70px; 
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
            text-align: left; 
            font-weight: normal;
        }

        input[class="warga-tetap"] {
            width: 100%; 
            box-sizing: border-box; 
        }

        p {
            margin: 0; 
        }

        ol {
            margin-top: 0; 
        }

        
        .div-ketua,
        .catatan-lampiran {
            width: 50%; 
        }

        @media screen and (max-width: 768px) {
            .book {
                width: auto;
                height: auto;
                padding: 5mm;
            }

            .page {
                margin: 0;
            }

            .div-ketua,
            .catatan-lampiran {
                width: 100%;
            }

            .keterangan-penyelesaian {
                margin-top: 10px;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
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
                        <span id="id-nomor-surat">......</span>/ RT {{ $user->no_rt }} /<span id="id-rw"> RW 02</span>
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

            <!-- Jenis Kelamin -->
            <p>Bersama ini kami hadapkan seorang
                <input type="radio" id="laki-laki" name="jenis-kelamin" value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                <label for="laki-laki">laki-laki</label>
                <input type="radio" id="perempuan" name="jenis-kelamin" value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
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
                    <td><input class="warga-tetap" type="text" name="tempat_tgl_lahir" value="{{ $user->tanggal_lahir }}" required></td>
                </tr>
                <tr>
                    <th>- Kebangsaan</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="kebangsaan" value="{{ $user->kebangsaan }}" required></td>
                </tr>
                <tr>
                    <th>- Agama</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="agama" value="{{ $user->agama }}" required></td>
                </tr>
                <tr>
                    <th>- Pekerjaan</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="pekerjaan" value="{{ $user->pekerjaan }}" required></td>
                </tr>
                <tr>
                    <th>- Status Perkawinan</th>
                    <td>:</td>
                    <td>
                        <input type="radio" id="kawin" name="status_perkawinan" value="Kawin" {{ $user->statusKawin == 'Kawin' ? 'checked' : '' }} required>
                        <label for="kawin">Kawin</label>
                        <input type="radio" id="belum_kawin" name="status_perkawinan" value="Belum Kawin" {{ $user->statusKawin == 'Belum Kawin' ? 'checked' : '' }} required>
                        <label for="belum_kawin">Belum Kawin</label>
                        <input type="radio" id="janda" name="status_perkawinan" value="Janda" {{ $user->statusKawin == 'Janda' ? 'checked' : '' }} required>
                        <label for="janda">Janda</label>
                        <input type="radio" id="duda" name="status_perkawinan" value="Duda" {{ $user->statusKawin == 'Duda' ? 'checked' : '' }} required>
                        <label for="duda">Duda</label>
                    </td>
                </tr>
                <tr>
                    <th>- Pendidikan Terakhir</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="pendidikan_terakhir" value="{{ $user->pendidikan_terakhir }}" required></td>
                </tr>
                <tr>
                    <th>- No. KTP</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="no_ktp" value="{{ $user->no_ktp }}" required></td>
                </tr>
                <tr>
                    <th>- No. KSK</th>
                    <td>:</td>
                    <td><input class="warga-tetap" type="text" name="no_ksk" value="{{ $user->no_ksk }}" required></td>
                </tr>
                <tr>
                    <th>- Alamat</th>
                    <td>:</td>
                    <td><input class="warga-tetap" name="alamat" value="{{ $user->alamat }}" required></td>
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
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
       var user = @json(Auth::user());
       if (user) {
       document.querySelector('input[name="nama"]').value = user.nama;
       document.querySelector('input[name="tempat_tanggal_lahir"]').value = user.tempat_lahir + ', ' + user.tanggal_lahir;
       document.querySelector('input[name="kebangsaan"]').value = user.kebangsaan;
       document.querySelector('input[name="agama"]').value = user.agama;
       document.querySelector('input[name="pekerjaan"]').value = user.pekerjaan;
       document.querySelector('input[name="pendidikan_terakhir"]').value = user.pendidikan_terakhir;
       document.querySelector('input[name="no_ktp"]').value = user.no_ktp;
       document.querySelector('input[name="no_ksk"]').value = user.no_ksk;
       document.querySelector('input[name="alamat"]').value = user.alamat;

       // Jenis Kelamin
       document.querySelector(`input[name="jenis-kelamin"][value="${user.jenis_kelamin}"]`).checked = true;
       
       // Status Perkawinan
       document.querySelector(`input[name="status_perkawinan"][value="${user.status_perkawinan}"]`).checked = true;
   }
});

</script>
