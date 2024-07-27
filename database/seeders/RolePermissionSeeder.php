<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::create([
            'name' => 'admin' 
        ]);
        
        $creatorRole = Role::create([
            'name' => 'creator' 
        ]);
        
        $userRole = Role::create([
            'name' => 'user' 
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123123')
        ]);

        $admin->assignRole($adminRole);
        
        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('123123123')
        ]);

        $user->assignRole($userRole);
        
        $category = [[
            'category' => 'Sport',
            'slug' => Str::slug('Sport'),
            'about' => 'Kategori ini mencakup berita tentang pertandingan, turnamen, prestasi atlet, dan perkembangan terbaru dalam dunia olahraga.',
            // 'icon' => 'sport.jpg',
        ],[
            'category' => 'Education',
            'slug' => Str::slug('Education'),
            'about' => 'Kategori ini berfokus pada perkembangan pendidikan, kebijakan, inovasi pengajaran, beasiswa, dan teknologi pendidikan.',
            // 'icon' => 'education.jpg',
        ],[
            'category' => 'Economy',
            'slug' => Str::slug('Economy'),
            'about' => 'Kategori ini meliputi berita tentang kebijakan ekonomi, pasar saham, inflasi, perdagangan, dan tren ekonomi global.',
            // 'icon' => 'economy.jpg',
        ]];

        foreach ($category as $categoryData) {
            Category::create($categoryData);
        }

        
        $news = [[
            'title' => 'Klasemen Akhir Piala AFF U-19 2024',
            // 'slug' => Str::slug('title'),
            'slug' => 'news-1',
            'news' => 'Jakarta - Berikut klasemen akhir Piala AFF U-19 2024, yang sekaligus menandai berakhirnya fase grup. Indonesia, Australia, dan Malaysia ke semifinal sebagai juara grup.
                        Dari Grup A, Timnas Indonesia U-19 berhasil sapu bersih kemenangan dengan meraup poin sempurna berupa 9 angka.
                        Di Grup B Piala AFF U-19 2024, Australia juga berhasil merangkai tiga kemenangan dari pertandingannya untuk menyudahi fase grup dengan 9 poin.',
            'category_id' => '1',
            'user_id' => '1',
            'photo' => 'aff.jpg',
        ]
        ,[
            'title' => 'Pertumbuhan Ekonomi Global Terus Melambat di 2024',
            'slug' => 'news-2',
            'news' => 'Pada awal tahun 2024, pertumbuhan ekonomi global mengalami perlambatan yang signifikan, mempengaruhi banyak negara di seluruh dunia. Laporan dari Dana Moneter Internasional (IMF) menunjukkan bahwa ekonomi global diperkirakan tumbuh sebesar 2,5% pada tahun ini, lebih rendah dibandingkan proyeksi sebelumnya. Perlambatan ini terutama disebabkan oleh penurunan aktivitas industri dan perdagangan internasional yang lebih lambat dari yang diharapkan. Negara-negara besar seperti Amerika Serikat, Tiongkok, dan Uni Eropa mengalami penurunan dalam output industri mereka. Selain itu, ketidakpastian politik dan kebijakan moneter yang ketat di beberapa negara juga berkontribusi terhadap perlambatan ini. IMF merekomendasikan agar negara-negara mengimplementasikan kebijakan fiskal yang mendukung pertumbuhan dan meningkatkan investasi dalam infrastruktur untuk merangsang ekonomi. Meskipun tantangan ini ada, beberapa analis optimis bahwa reformasi struktural dan adopsi teknologi baru dapat membantu mengimbangi dampak perlambatan ini di masa depan.',
            'category_id' => '3',
            'user_id' => '1',
            'photo' => 'aff.jpg',
        ]
        ,[
            'title' => 'Kenaikan Suku Bunga AS Mempengaruhi Pasar Global',
            'slug' => 'news-3',
            'news' => 'Federal Reserve baru-baru ini mengumumkan kenaikan suku bunga sebesar 0,25%, menjadikannya yang tertinggi dalam dua tahun terakhir. Langkah ini diambil untuk menanggulangi inflasi yang masih tinggi dan menjaga stabilitas ekonomi domestik. Namun, keputusan ini memiliki dampak yang luas di pasar global. Kenaikan suku bunga di AS biasanya menyebabkan penguatan dolar Amerika, yang dapat merugikan negara-negara berkembang yang memiliki utang dalam dolar. Selain itu, investor global mungkin akan beralih dari pasar negara berkembang ke aset yang lebih aman, seperti obligasi pemerintah AS. Hal ini dapat menyebabkan arus keluar modal dan ketidakstabilan pasar di beberapa negara. Di sisi lain, beberapa negara dengan suku bunga rendah mungkin melihat peningkatan investasi dari investor yang mencari return lebih tinggi. Para analis memperkirakan bahwa kenaikan suku bunga ini dapat memperlambat pertumbuhan ekonomi global dalam jangka pendek, tetapi mungkin juga membantu menstabilkan inflasi yang sedang tinggi.',
            'category_id' => '3',
            'user_id' => '1',
            'photo' => 'aff.jpg',
        ]
        ,[
            'title' => 'Krisis Energi di Eropa Memicu Kenaikan Harga Komoditas',
            'slug' => 'news-4',
            'news' => 'Krisis energi yang terus berlangsung di Eropa telah memicu lonjakan harga komoditas global, dengan harga gas dan minyak melonjak tajam. Ketegangan geopolitik dan pemadaman pasokan energi dari Rusia telah mengakibatkan kekurangan energi di banyak negara Eropa. Untuk mengatasi krisis ini, banyak negara Eropa mulai mencari sumber energi alternatif dan mempercepat investasi dalam energi terbarukan. Namun, transisi ini memerlukan waktu, dan selama periode transisi, harga energi tetap tinggi. Kenaikan harga energi tidak hanya mempengaruhi konsumen di Eropa tetapi juga berdampak pada biaya produksi barang dan jasa di seluruh dunia. Negara-negara penghasil energi, seperti Timur Tengah dan Amerika Serikat, telah melihat lonjakan pendapatan dari ekspor energi. Sementara itu, perusahaan-perusahaan di sektor industri yang bergantung pada energi menghadapi margin keuntungan yang menurun. Para ahli ekonomi memperkirakan bahwa krisis energi ini dapat mempengaruhi inflasi global dan pertumbuhan ekonomi untuk beberapa waktu ke depan.',
            'category_id' => '3',
            'user_id' => '1',
            'photo' => 'aff.jpg',
        ]
        ,[
            'title' => 'Teknologi Digital Mempercepat Pertumbuhan Ekonomi di Asia Tenggara',
            'slug' => 'news-5',
            'news' => 'Asia Tenggara sedang mengalami revolusi ekonomi yang didorong oleh adopsi teknologi digital yang pesat. Negara-negara seperti Indonesia, Vietnam, dan Thailand telah melihat pertumbuhan yang signifikan dalam sektor teknologi dan e-commerce. Investasi dalam infrastruktur digital, seperti jaringan internet yang lebih cepat dan platform pembayaran online, telah membuka peluang baru untuk bisnis dan konsumen di wilayah ini. Selain itu, startup teknologi di Asia Tenggara telah menarik minat investasi dari luar negeri, yang membantu meningkatkan ekosistem inovasi. Pemerintah di wilayah ini juga mendukung transformasi digital dengan kebijakan yang mendukung inovasi dan pengembangan teknologi. Pertumbuhan ekonomi yang didorong oleh teknologi ini tidak hanya meningkatkan pendapatan domestik bruto (PDB) tetapi juga menciptakan lapangan kerja baru dan meningkatkan kualitas hidup. Namun, tantangan seperti kesenjangan digital dan perlunya pendidikan keterampilan teknis harus diatasi untuk memastikan bahwa pertumbuhan ini dapat dinikmati secara luas oleh semua lapisan masyarakat.',
            'category_id' => '3',
            'user_id' => '1',
            'photo' => 'aff.jpg',
        ]
    ];

    foreach ($news as $newsData) {
        News::create($newsData);
    }
    }
}
