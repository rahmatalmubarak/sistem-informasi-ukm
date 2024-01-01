<?php

namespace Database\Seeders;

use App\Models\InformasiOrmawa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiOrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informasi = [
            [
            'ormawa_id' => 1,
            'foto_pengurus' => 'kepengurusan dema.jpg',
            'dasar_hukum' => 'Surat Keputusan Dekan FST No.12 Tahun 2023 Tentang Penetapan Pengurus Dewan Mahasiswa FST.',
            'visi' => '<ol>
<li>Menjadikan SEMA Fakultas Sains dan Teknologi UIN Imam Bonjol Padang sebagai mover teknologi dan wadah pergerakan mahasiswa dalam membangun kualitas mahasiswa yang berilmu, beragama dan progresif untuk menjadi imam dan menginspirasi semesta.</li>
<li>Misi Menumbuhkan nilai profesionalitas, kepercayaan, dan tanggung jawab dalam internal organisasi.</li>
</ol>',
            'misi' => '<ol>
<li>Menjadi Wadah Aspirasi yang Responsif, Cepat dan Tanggap Bagi Seluruh Mahasiswa Fakultas Sains dan Teknologi;</li>
<li>Membuat dan Melaksanakan Program Kerja yang Bermanfaat Sesuai Kebutuhan Mahasiswa;</li>
<li>Menjalankan Peran Senat Mahasiswa Sebagai Lembaga Legislatif Mahasiswa;</li>
<li>Memantau Kinerja Lembaga Eksekutif Secara Efisien, Efektif dan Transparan;</li>
<li>Membangun Hubungan Kerja dan Komunikasi Antar Ormawa Fakultas Sains Dan Teknologi Dan Birokrat Kampus;</li>
</ol>',
            'proker' => '<ol>
<li>Evaluasi Kinerja Organisasi Mahasiswa FST</li>
<li>Musyawarah Senat Mahasiswa</li>
<li>Musyawarah Komisariat Mahasiswa</li>
<li>Musyawarah Himpunan Mahasiswa</li>
<li>Rapat Evaluasi Senat</li>
</ol>',
            'informasi' => '<p>Sekretariat: Gedung Sains Lantai 1 Andalusia, FST UIN Imam Bonjol</p>
<p>E-mail: : semafstuinib@gmail.com&nbsp;</p>
<p>Instagram: @sema.fstuinib</p>',
            ],
            [
                'ormawa_id' => 2,
                'foto_pengurus' => 'kepengurusan sema.jpg',
                'dasar_hukum' => 'Surat Keputusan Dekan FST No.12 Tahun 2023 Tentang Penetapan Pengurus Senat Mahasiswa FST.',
                'visi' => '<ol>
<li>Menjadikan SEMA Fakultas Sains dan Teknologi UIN Imam Bonjol Padang sebagai mover teknologi dan wadah pergerakan mahasiswa dalam membangun kualitas mahasiswa yang berilmu, beragama dan progresif untuk menjadi imam dan menginspirasi semesta.</li>
<li>Misi Menumbuhkan nilai profesionalitas, kepercayaan, dan tanggung jawab dalam internal organisasi.</li>
</ol>',
                'misi' => '<ol>
<li>Menjadi Wadah Aspirasi yang Responsif, Cepat dan Tanggap Bagi Seluruh Mahasiswa Fakultas Sains dan Teknologi;</li>
<li>Membuat dan Melaksanakan Program Kerja yang Bermanfaat Sesuai Kebutuhan Mahasiswa;</li>
<li>Menjalankan Peran Senat Mahasiswa Sebagai Lembaga Legislatif Mahasiswa;</li>
<li>Memantau Kinerja Lembaga Eksekutif Secara Efisien, Efektif dan Transparan;</li>
<li>Membangun Hubungan Kerja dan Komunikasi Antar Ormawa Fakultas Sains Dan Teknologi Dan Birokrat Kampus;</li>
</ol>',
                'proker' => '<ol>
<li>Evaluasi Kinerja Organisasi Mahasiswa FST</li>
<li>Musyawarah Senat Mahasiswa</li>
<li>Musyawarah Komisariat Mahasiswa</li>
<li>Musyawarah Himpunan Mahasiswa</li>
<li>Rapat Evaluasi Senat</li>
</ol>',
                'informasi' => '<p>Sekretariat: Gedung Sains Lantai 1 Andalusia, FST UIN Imam Bonjol</p>
<p>E-mail: : semafstuinib@gmail.com&nbsp;</p>
<p>Instagram: @sema.fstuinib</p>',
            ],
            [
                'ormawa_id' => 3,
                'foto_pengurus' => 'kepengurusan hmps mtk.jpg',
                'dasar_hukum' => 'Surat Keputusan Dekan FST No.12 Tahun 2023 Tentang Penetapan Pengurus Dewan Mahasiswa FST.',
                'visi' => '<ol>
<li>Menjadikan SEMA Fakultas Sains dan Teknologi UIN Imam Bonjol Padang sebagai mover teknologi dan wadah pergerakan mahasiswa dalam membangun kualitas mahasiswa yang berilmu, beragama dan progresif untuk menjadi imam dan menginspirasi semesta.</li>
<li>Misi Menumbuhkan nilai profesionalitas, kepercayaan, dan tanggung jawab dalam internal organisasi.</li>
</ol>',
                'misi' => '<ol>
<li>Menjadi Wadah Aspirasi yang Responsif, Cepat dan Tanggap Bagi Seluruh Mahasiswa Fakultas Sains dan Teknologi;</li>
<li>Membuat dan Melaksanakan Program Kerja yang Bermanfaat Sesuai Kebutuhan Mahasiswa;</li>
<li>Menjalankan Peran Senat Mahasiswa Sebagai Lembaga Legislatif Mahasiswa;</li>
<li>Memantau Kinerja Lembaga Eksekutif Secara Efisien, Efektif dan Transparan;</li>
<li>Membangun Hubungan Kerja dan Komunikasi Antar Ormawa Fakultas Sains Dan Teknologi Dan Birokrat Kampus;</li>
</ol>',
                'proker' => '<ol>
<li>Evaluasi Kinerja Organisasi Mahasiswa FST</li>
<li>Musyawarah Senat Mahasiswa</li>
<li>Musyawarah Komisariat Mahasiswa</li>
<li>Musyawarah Himpunan Mahasiswa</li>
<li>Rapat Evaluasi Senat</li>
</ol>',
                'informasi' => '<p>Sekretariat: Gedung Sains Lantai 1 Andalusia, FST UIN Imam Bonjol</p>
<p>E-mail: : semafstuinib@gmail.com&nbsp;</p>
<p>Instagram: @sema.fstuinib</p>',
            ],
            [
                'ormawa_id' => 4,
                'foto_pengurus' => 'kepengurusan hmps si.jpg',
                'dasar_hukum' => 'Surat Keputusan Dekan FST No.12 Tahun 2023 Tentang Penetapan Pengurus Dewan Mahasiswa FST.',
                'visi' => '<ol>
<li>Menjadikan SEMA Fakultas Sains dan Teknologi UIN Imam Bonjol Padang sebagai mover teknologi dan wadah pergerakan mahasiswa dalam membangun kualitas mahasiswa yang berilmu, beragama dan progresif untuk menjadi imam dan menginspirasi semesta.</li>
<li>Misi Menumbuhkan nilai profesionalitas, kepercayaan, dan tanggung jawab dalam internal organisasi.</li>
</ol>',
                'misi' => '<ol>
<li>Menjadi Wadah Aspirasi yang Responsif, Cepat dan Tanggap Bagi Seluruh Mahasiswa Fakultas Sains dan Teknologi;</li>
<li>Membuat dan Melaksanakan Program Kerja yang Bermanfaat Sesuai Kebutuhan Mahasiswa;</li>
<li>Menjalankan Peran Senat Mahasiswa Sebagai Lembaga Legislatif Mahasiswa;</li>
<li>Memantau Kinerja Lembaga Eksekutif Secara Efisien, Efektif dan Transparan;</li>
<li>Membangun Hubungan Kerja dan Komunikasi Antar Ormawa Fakultas Sains Dan Teknologi Dan Birokrat Kampus;</li>
</ol>',
                'proker' => '<ol>
<li>Evaluasi Kinerja Organisasi Mahasiswa FST</li>
<li>Musyawarah Senat Mahasiswa</li>
<li>Musyawarah Komisariat Mahasiswa</li>
<li>Musyawarah Himpunan Mahasiswa</li>
<li>Rapat Evaluasi Senat</li>
</ol>',
                'informasi' => '<p>Sekretariat: Gedung Sains Lantai 1 Andalusia, FST UIN Imam Bonjol</p>
<p>E-mail: : semafstuinib@gmail.com&nbsp;</p>
<p>Instagram: @sema.fstuinib</p>',
            ],
            ];

        foreach ($informasi as $key => $ormawa) {
            if($informasi = InformasiOrmawa::where('ormawa_id', $ormawa['ormawa_id'])->first()){
                $informasi->update([
                    'ormawa_id' => $ormawa['ormawa_id'],
                    'informasi' => $ormawa['informasi'],
                    'dasar_hukum' => $ormawa['dasar_hukum'],
                    'visi' => $ormawa['visi'],
                    'misi' => $ormawa['misi'],
                    'proker' => $ormawa['proker'],
                    'foto_pengurus' => $ormawa['foto_pengurus'],
                ]);
            }else{
                InformasiOrmawa::create($ormawa);
            }
        }
    }

    
}
