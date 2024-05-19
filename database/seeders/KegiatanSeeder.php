<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [ 
                'nama_kegiatan' => 'Senam Sehat',
                'tanggal_kegiatan' => '2024-04-19',
                'waktu_mulai' => '06:00:00',
                'waktu_selesai' => null,
                'lokasi_kegiatan' => 'Lapangan Utara',
                'deskripsi' => 'Senam sehat merupakan agenda rutin yang diadakan untuk mempromosikan gaya hidup sehat dan aktif. Kegiatan ini dirancang untuk semua kalangan, mulai dari anak-anak hingga dewasa, dan bertujuan untuk meningkatkan kebugaran fisik serta kesadaran akan pentingnya olahraga. Acara akan dimulai dengan sesi pemanasan, diikuti oleh senam utama dengan gerakan-gerakan yang menyenangkan dan menyehatkan, serta ditutup dengan sesi pendinginan dan peregangan. Selain itu, terdapat juga sesi tanya jawab mengenai kesehatan dan kebugaran yang dipandu oleh ahli kesehatan. Kegiatan ini akan diadakan di Lapangan Utara dan terbuka untuk umum. Diharapkan warga yang mengikuti kegiatan ini datang tepat waktu dan membayar iuran sebesar Rp7.000',
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Kerja Bakti',
                'tanggal_kegiatan' => '2024-04-21',
                'waktu_mulai' => '06:00:00',
                'waktu_selesai' => '11:00:00',
                'lokasi_kegiatan' => 'Seluruh Wilayah RW. 02',
                'deskripsi' => 'Kerja Bakti merupakan kegiatan gotong royong yang diadakan untuk membersihkan dan memperbaiki lingkungan di seluruh wilayah RW. 02. Kegiatan ini bertujuan untuk meningkatkan kebersihan, kenyamanan, dan keindahan lingkungan sekitar serta mempererat hubungan antarwarga. Acara ini melibatkan semua warga RW. 02 dan mencakup berbagai aktivitas seperti pembersihan jalan dan selokan, perbaikan fasilitas umum, penanaman pohon, dan penghijauan area terbuka. Warga diharapkan membawa alat kebersihan masing-masing dan berpartisipasi aktif dalam kegiatan ini. Kerja Bakti ini tidak hanya bermanfaat untuk lingkungan, tetapi juga menjadi ajang silaturahmi dan kebersamaan antarwarga.',
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Maulid Nabi',
                'tanggal_kegiatan' => '2024-03-20',
                'waktu_mulai' => '19:00:00',
                'waktu_selesai' => '22:00:00',
                'lokasi_kegiatan' => 'Masjid Al-Kautsar',
                'deskripsi' => 'Maulid Nabi adalah perayaan yang diadakan untuk memperingati kelahiran Nabi Muhammad SAW. Acara ini bertujuan untuk mengenang dan menghormati sosok Nabi Muhammad SAW, serta memperdalam pemahaman tentang ajaran-ajarannya. Rangkaian acara meliputi pembacaan maulid, ceramah agama oleh ustadz, doa bersama, dan salawatan. Selain itu, acara ini juga akan diisi dengan tausiyah yang menyampaikan kisah-kisah teladan Nabi Muhammad SAW dan nilai-nilai kehidupan yang dapat diambil dari perjalanan hidupnya. Semua jamaah diundang untuk hadir dan turut serta dalam acara ini. Kegiatan ini juga menjadi ajang silaturahmi dan memperkuat ukhuwah Islamiyah di antara jamaah Masjid Al-Kautsar.',
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Lomba Makan Kerupuk',
                'tanggal_kegiatan' => '2023-08-11',
                'waktu_mulai' => '16:00:00',
                'waktu_selesai' => '17:30:00',
                'lokasi_kegiatan' => 'Lapangan Utara',
                'deskripsi' => 'Lomba Makan Kerupuk adalah salah satu kegiatan yang diadakan dalam rangka merayakan Hari Kemerdekaan Indonesia. Lomba ini merupakan acara yang sangat dinanti-nantikan karena penuh dengan keceriaan dan semangat kompetisi. Peserta lomba harus makan kerupuk yang digantung dengan tali tanpa menggunakan tangan, dan siapa yang tercepat menghabiskan kerupuknya akan menjadi pemenang. Lomba ini bertujuan untuk mempererat hubungan antarwarga dan menumbuhkan rasa kebersamaan serta kegembiraan dalam perayaan kemerdekaan. Semua warga diundang untuk berpartisipasi atau sekadar menyaksikan dan memberikan dukungan. Acara ini juga akan diiringi dengan musik dan sorak-sorai penonton yang membuat suasana semakin meriah.',
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Posyandu',
                'tanggal_kegiatan' => '2024-05-19',
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '11:30:00',
                'lokasi_kegiatan' => 'Pos Posyandu',
                'deskripsi' => 'Posyandu (Pos Pelayanan Terpadu) adalah kegiatan rutin yang diadakan untuk memberikan pelayanan kesehatan kepada ibu dan anak di lingkungan setempat. Posyandu bertujuan untuk memantau tumbuh kembang anak, memberikan imunisasi, serta menyediakan layanan kesehatan dasar bagi ibu hamil dan balita. Selain itu, dalam kegiatan ini juga akan diadakan penyuluhan kesehatan oleh tenaga medis mengenai gizi seimbang, perawatan anak, dan pencegahan penyakit. Semua ibu dan anak di lingkungan sekitar diundang untuk hadir dan memanfaatkan layanan kesehatan yang disediakan. Kegiatan ini sangat penting untuk memastikan kesehatan dan kesejahteraan ibu dan anak, serta meningkatkan kesadaran masyarakat akan pentingnya pola hidup sehat.',
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Lomba Tenis',
                'tanggal_kegiatan' => '2024-08-22',
                'waktu_mulai' => '19:00:00',
                'waktu_selesai' => '23:30:00',
                'lokasi_kegiatan' => 'Lapangan Utara',
                'deskripsi' => 'Acara Lomba Tenis ini merupakan sebuah kompetisi yang diadakan untuk para penggemar tenis dari berbagai kalangan. Peserta akan bertanding dalam berbagai kategori untuk memperebutkan gelar juara. Selain pertandingan, acara ini juga akan menjadi ajang silaturahmi dan hiburan bagi penonton yang hadir. Pastikan untuk datang lebih awal agar mendapatkan tempat duduk yang nyaman dan mendukung para atlet yang bertanding.',
                'status_kegiatan' => 'Non Aktif',
            ],
        ];
        DB::table('kegiatan')->insert($data);
    }
}
