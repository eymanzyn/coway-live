<?php

/*
|--------------------------------------------------------------------------
| Live Display – Ejen Coway
|--------------------------------------------------------------------------
|
| EDIT SINI SAHAJA. Semua data produk & tetapan live.
|
| Gambar: letak fail dalam public/images, kemudian isi 'img' => 'images/nama.png'.
| Kalau kosong, ilustrasi ikut kategori ('kind') dipaparkan.
| 'ringkas' : ayat pendek bawah nama (pilihan).
| 'sesuai'  : "Sesuai untuk ..." (pilihan).
| 'beg'     : nombor dalam beg TikTok. Kalau tiada, ikut susunan (1, 2, 3...).
|
| Pelan sewaan: pelan(7 tahun, 8 tahun, 3+2 tahun, tahun ke-4 & 5).
| Contoh pelan(95, 89, 109, 79) = RM95 (7 thn), RM89 (8 thn),
| RM109 tahun 1–3 kemudian RM79 tahun 4–5.
|
*/

$pelan = fn (int $tujuh, int $lapan, int $tigaDua, int $lanjutan): array => [
    ['label' => '7 tahun', 'bulanan' => $tujuh, 'nota' => 'Servis berkala termasuk'],
    ['label' => '8 tahun', 'bulanan' => $lapan, 'nota' => 'Bayaran bulanan paling rendah'],
    ['label' => '3+2 tahun', 'bulanan' => $tigaDua, 'nota' => "Tahun 4–5 turun ke RM{$lanjutan}/bln"],
];

return [

    'settings' => [
        'agentName' => 'Aina Coway Care',
        'agentRole' => 'Ejen Sah Coway, Shah Alam',
        'cta' => 'Klik beg biru untuk tempah',
        'promoMinutes' => 15,
        'promoSlots' => 20,
        'ticker' => [
            'Pemasangan PERCUMA seluruh Semenanjung',
            'Servis berkala setiap 4 bulan oleh Cody',
            'Tiada deposit untuk pakej sewaan terpilih',
            'Semua produk ada dalam beg biru, tekan dan checkout terus',
            'Promo live sahaja – tamat bila timer habis',
        ],
    ],

    'categories' => [
        ['name' => 'Penapis Air', 'kind' => 'water', 'products' => [
            ['name' => 'Neo Plus', 'tag' => 'Harga promo', 'plans' => $pelan(59, 59, 59, 59),
                'ringkas' => 'Kapasiti dan harga yang seimbang',
                'sesuai' => 'Keluarga yang jaga bajet',
                'feats' => [], 'promo' => 'Harga promo ~RM59/bln', 'img' => 'images/neo-plus.png'],
            ['name' => 'Neon', 'tag' => 'Kompak & bergaya', 'plans' => $pelan(56, 54, 59, 54),
                'ringkas' => 'Bergaya dan kompak',
                'sesuai' => 'Dapur kecil dan rumah yang bergaya',
                'feats' => [], 'promo' => 'Tiada deposit', 'img' => 'images/neon.png'],
            ['name' => 'Dazzie', 'tag' => 'Ultra kompak', 'plans' => $pelan(99, 79, 120, 79),
                'ringkas' => 'Ultra kompak dengan tetapan pintar',
                'sesuai' => 'Dapur minimalis yang selalu guna air panas',
                'feats' => [], 'promo' => 'Pemasangan percuma', 'img' => 'images/dazzie.png'],
            ['name' => 'Villaem III', 'tag' => 'Tangki besar', 'plans' => $pelan(69, 34, 104, 34),
                'ringkas' => 'Tangki besar dengan keselamatan UV',
                'sesuai' => 'Rumah yang guna banyak setiap hari dan kerap guna air panas',
                'feats' => [], 'promo' => 'Bulan pertama PERCUMA', 'img' => 'images/villaem-3.png'],
            ['name' => 'AIS', 'tag' => 'Ais segera', 'plans' => $pelan(120, 120, 120, 120),
                'ringkas' => 'Ais segera dengan penapisan RO',
                'sesuai' => 'Keluarga yang suka layan tetamu dan minum sejuk',
                'feats' => [], 'promo' => 'Rebat RM300', 'img' => 'images/ais.png'],
        ]],
        ['name' => 'Penapis Udara', 'kind' => 'air', 'products' => [
            ['name' => 'Penapis Udara Tower Besar', 'tag' => 'Ruang tamu', 'plans' => $pelan(89, 83, 103, 73),
                'feats' => ['Liputan hingga 90 m²', 'Sensor kualiti udara masa nyata', 'Mod tidur senyap'],
                'promo' => 'Penapis ganti percuma', 'img' => ''],
            ['name' => 'Penapis Udara Bilik Tidur', 'tag' => 'Paling laris', 'plans' => $pelan(59, 53, 73, 43),
                'feats' => ['Liputan hingga 35 m²', 'Penapis HEPA', 'Lampu malam lembut'],
                'promo' => 'Bulan pertama PERCUMA', 'img' => ''],
            ['name' => 'Penapis Udara Mini', 'tag' => 'Pejabat', 'plans' => $pelan(45, 39, 59, 29),
                'feats' => ['Muat atas meja', 'Penggunaan elektrik rendah', 'Mudah dibawa'],
                'promo' => 'Tiada deposit', 'img' => ''],
            ['name' => 'Penapis Udara Dua Hala', 'tag' => 'Premium', 'plans' => $pelan(119, 113, 133, 103),
                'feats' => ['Sedut udara dari dua arah', 'Kawalan melalui aplikasi', 'Liputan hingga 120 m²'],
                'promo' => 'Rebat RM250', 'img' => ''],
        ]],
        ['name' => 'Tilam', 'kind' => 'mattress', 'products' => [
            ['name' => 'Tilam Hybrid Queen', 'tag' => 'Paling laris', 'plans' => $pelan(129, 123, 143, 113),
                'feats' => ['Spring poket + lateks', 'Servis sanitasi berkala', 'Topper boleh tukar'],
                'promo' => 'Bantal percuma x2', 'img' => ''],
            ['name' => 'Tilam Hybrid King', 'tag' => 'Keluarga', 'plans' => $pelan(149, 143, 163, 133),
                'feats' => ['Saiz king', 'Sokongan tulang belakang', 'Servis sanitasi berkala'],
                'promo' => 'Rebat RM400', 'img' => ''],
            ['name' => 'Tilam Single Pelajar', 'tag' => 'Bajet', 'plans' => $pelan(79, 73, 93, 63),
                'feats' => ['Saiz single', 'Ketegasan sederhana', 'Penutup boleh basuh'],
                'promo' => 'Tiada deposit', 'img' => ''],
        ]],
        ['name' => 'Bidet', 'kind' => 'bidet', 'products' => [
            ['name' => 'Bidet Elektronik Penuh', 'tag' => 'Premium', 'plans' => $pelan(69, 63, 83, 53),
                'feats' => ['Tempat duduk panas', 'Air suam & pengering', 'Muncung bersih sendiri'],
                'promo' => 'Pemasangan percuma', 'img' => ''],
            ['name' => 'Bidet Asas', 'tag' => 'Bajet', 'plans' => $pelan(39, 33, 53, 23),
                'feats' => ['Air suam', 'Tekanan boleh laras', 'Mudah dipasang'],
                'promo' => 'Bulan pertama PERCUMA', 'img' => ''],
        ]],
        ['name' => 'Penapis Mandian', 'kind' => 'shower', 'products' => [
            ['name' => 'Penapis Kepala Pancuran', 'tag' => 'Baru', 'plans' => $pelan(29, 23, 43, 13),
                'feats' => ['Kurangkan klorin', 'Lembut untuk kulit & rambut', 'Pasang sendiri 5 minit'],
                'promo' => 'Beli 2 jimat RM100', 'img' => ''],
            ['name' => 'Penapis Air Seluruh Rumah', 'tag' => 'Seluruh rumah', 'plans' => $pelan(99, 93, 113, 83),
                'feats' => ['Tapis di paip utama', 'Lindungi semua pili', 'Servis berkala termasuk'],
                'promo' => 'Rebat RM300', 'img' => ''],
        ]],
    ],

];
