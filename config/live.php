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
| 'feats'   : senarai ciri utama, 2–3 baris pendek (pilihan).
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
                'feats' => ['Penapisan RO (Reverse Osmosis)', 'Air panas, sejuk & suhu bilik', 'Mod Eco & kunci keselamatan kanak-kanak'],
                'promo' => 'Harga promo ~RM59/bln', 'img' => 'images/neo-plus.png'],
            ['name' => 'Neon', 'tag' => 'Kompak & bergaya', 'plans' => $pelan(56, 54, 59, 54),
                'ringkas' => 'Bergaya dan kompak',
                'sesuai' => 'Dapur kecil dan rumah yang bergaya',
                'feats' => ['Penapis Nanotrap tangkap virus & bakteria', 'Air panas, sejuk & suhu bilik', 'Ada 5 pilihan warna'],
                'promo' => 'Tiada deposit', 'img' => 'images/neon.png'],
            ['name' => 'Dazzie', 'tag' => 'Ultra kompak', 'plans' => $pelan(99, 79, 120, 79),
                'ringkas' => 'Ultra kompak dengan tetapan pintar',
                'sesuai' => 'Dapur minimalis yang selalu guna air panas',
                'feats' => ['Sterilisasi UV automatik pada pili', 'Mod tidur jimat tenaga', 'Kunci keselamatan kanak-kanak'],
                'promo' => 'Pemasangan percuma', 'img' => 'images/dazzie.png'],
            ['name' => 'Villaem III', 'tag' => 'Tangki besar', 'plans' => $pelan(69, 34, 104, 34),
                'ringkas' => 'Tangki besar dengan keselamatan UV',
                'sesuai' => 'Rumah yang guna banyak setiap hari dan kerap guna air panas',
                'feats' => ['48 tetapan isipadu & suhu', 'Mod Eco jimat elektrik', 'Tangki besar untuk keluarga'],
                'promo' => 'Bulan pertama PERCUMA', 'img' => 'images/villaem-3.png'],
            ['name' => 'AIS', 'tag' => 'Ais segera', 'plans' => $pelan(120, 120, 120, 120),
                'ringkas' => 'Ais segera dengan penapisan RO',
                'sesuai' => 'Keluarga yang suka layan tetamu dan minum sejuk',
                'feats' => ['Buat ais automatik', 'Tangki ais tertutup disterilkan UV', 'Kunci ais & air panas'],
                'promo' => 'Rebat RM300', 'img' => 'images/ais.png'],
        ]],
        // HARGA, TAG & PROMO PENAPIS UDARA DI BAWAH MASIH SEMENTARA – tukar ikut harga sebenar.
        ['name' => 'Penapis Udara', 'kind' => 'air', 'products' => [
            ['name' => 'Atrium', 'tag' => 'Ruang besar', 'plans' => $pelan(89, 83, 103, 73),
                'ringkas' => 'Penapis udara terbaru untuk ruang besar',
                'sesuai' => 'Ruang tamu besar dan rumah konsep terbuka',
                'feats' => ['Penapisan 3 peringkat dua sisi', 'Model baharu 2026', '3 pilihan warna'],
                'promo' => 'Penapis ganti percuma', 'img' => 'images/atrium.png'],
            ['name' => 'Lombok 3', 'tag' => 'Plasma & ion', 'plans' => $pelan(59, 53, 73, 43),
                'ringkas' => 'Penapis udara dengan plasma & ioniser',
                'sesuai' => 'Bilik tidur dan ruang sederhana',
                'feats' => ['Penunjuk habuk halus PM2.5 & bau', 'RBD Plasma & ioniser', 'Kunci kanak-kanak'],
                'promo' => 'Bulan pertama PERCUMA', 'img' => 'images/lombok-3.png'],
            ['name' => 'Tuba', 'tag' => 'Liputan luas', 'plans' => $pelan(45, 39, 59, 29),
                'ringkas' => 'Penapis udara menegak berliputan luas',
                'sesuai' => 'Ruang tamu dan pejabat',
                'feats' => ['Liputan sehingga 93 m²', 'Reka bentuk menegak jimat ruang', 'Sesuai rumah & pejabat'],
                'promo' => 'Tiada deposit', 'img' => 'images/tuba.png'],
            ['name' => 'Noble', 'tag' => 'Premium', 'plans' => $pelan(119, 113, 133, 103),
                'ringkas' => 'Penapis udara premium yang elegan',
                'sesuai' => 'Ruang tamu dan bilik utama',
                'feats' => ['Liputan sehingga 66 m²', 'Reka bentuk elegan', 'Penapisan habuk halus'],
                'promo' => 'Rebat RM250', 'img' => 'images/noble.png'],
            ['name' => 'Storm 2', 'tag' => 'Aliran kuat', 'plans' => $pelan(99, 93, 113, 83),
                'ringkas' => 'Aliran udara kuat sehingga 10 meter',
                'sesuai' => 'Ruang panjang dan rumah teres',
                'feats' => ['Penapis HEPA tembaga', 'Jimat tenaga 35%', 'Pra-penapis boleh dibasuh'],
                'promo' => 'Pemasangan percuma', 'img' => 'images/storm-2.png'],
            ['name' => 'Studio', 'tag' => 'Senyap', 'plans' => $pelan(69, 63, 83, 53),
                'ringkas' => 'Penapis udara senyap dengan Hypervortex',
                'sesuai' => 'Bilik tidur dan ruang kerja',
                'feats' => ['Liputan sehingga 76 m²', 'Senyap serendah 21.6 dB', 'Teknologi Hypervortex'],
                'promo' => 'Tiada deposit', 'img' => 'images/studio.png'],
        ]],
        // HARGA, TAG & PROMO TILAM DI BAWAH MASIH SEMENTARA – tukar ikut harga sebenar.
        ['name' => 'Tilam', 'kind' => 'mattress', 'products' => [
            ['name' => 'Prime Lite', 'tag' => 'Bajet', 'plans' => $pelan(79, 73, 93, 63),
                'ringkas' => 'Selesa dan menyokong pada harga mampu milik',
                'sesuai' => 'Pasangan muda dan bilik tetamu',
                'feats' => ['Servis penjagaan tilam 7 langkah', 'Topper boleh tukar percuma', 'Sterilisasi UV'],
                'promo' => 'Tiada deposit', 'img' => 'images/prime-lite.png'],
            ['name' => 'Prime 2', 'tag' => 'Paling laris', 'plans' => $pelan(129, 123, 143, 113),
                'ringkas' => 'Tilam premium dengan servis pembersihan berkala',
                'sesuai' => 'Keluarga yang utamakan kebersihan tilam',
                'feats' => ['Pembersihan berkala oleh juruteknik', 'Penghalau hama & sterilisasi UV', 'Sokongan badan yang selesa'],
                'promo' => 'Bantal percuma x2', 'img' => 'images/prime-2.png'],
            ['name' => 'Smart Mattress', 'tag' => 'Pintar', 'plans' => $pelan(149, 143, 163, 133),
                'ringkas' => 'Tilam pintar, kekerasan boleh laras',
                'sesuai' => 'Pasangan yang suka kekerasan tilam berbeza',
                'feats' => ['9 tahap kekerasan dengan sel udara', 'Fungsi regangan badan', 'Kawalan alat kawalan jauh'],
                'promo' => 'Rebat RM400', 'img' => 'images/smart.png'],
        ]],
        // HARGA, TAG & PROMO KERUSI URUT DI BAWAH MASIH SEMENTARA – tukar ikut harga sebenar.
        ['name' => 'Kerusi Urut', 'kind' => 'massage', 'products' => [
            ['name' => 'Kerusi Urut Coway', 'tag' => 'Urut seluruh badan', 'plans' => $pelan(199, 189, 219, 179),
                'ringkas' => 'Urutan seluruh badan di rumah',
                'sesuai' => 'Yang selalu penat dan sakit badan',
                'feats' => ['Urutan kepala hingga kaki', 'Pelbagai mod urutan', 'Servis berkala termasuk'],
                'promo' => 'Pemasangan percuma', 'img' => 'images/kerusi-urut.png'],
            ['name' => 'BEREX Mine', 'tag' => 'Kompak', 'plans' => $pelan(159, 149, 179, 139),
                'ringkas' => 'Kerusi urut kompak, mudah dialih',
                'sesuai' => 'Rumah dan kondo yang ruangnya terhad',
                'feats' => ['12 mod urutan', 'Urutan lutut ke betis boleh tukar', 'Roda tersembunyi, mudah dialih'],
                'promo' => 'Tiada deposit', 'img' => 'images/mine.png'],
            ['name' => 'BEREX Senno', 'tag' => 'Pintar', 'plans' => $pelan(229, 219, 249, 209),
                'ringkas' => 'Kerusi urut pintar dengan haba',
                'sesuai' => 'Yang kerap sakit pinggang',
                'feats' => ['Terapi haba di pinggang', 'Kerusi urut pintar', 'Skrin kawalan mudah'],
                'promo' => 'Bulan pertama PERCUMA', 'img' => 'images/senno.png'],
            ['name' => 'BEREX Senno Plus', 'tag' => 'Premium', 'plans' => $pelan(269, 259, 289, 249),
                'ringkas' => 'Haba di pinggang dan betis',
                'sesuai' => 'Yang mahu urutan premium seluruh badan',
                'feats' => ['Terapi haba pinggang & betis', 'Kerusi urut pintar', 'Skrin kawalan mudah'],
                'promo' => 'Rebat RM500', 'img' => 'images/senno-plus.png'],
            ['name' => 'BEREX Pebble', 'tag' => 'Urutan lembut', 'plans' => $pelan(129, 119, 149, 109),
                'ringkas' => 'Kerusi urut bentuk telur yang bergaya',
                'sesuai' => 'Yang suka urutan ringan dan reka bentuk cantik',
                'feats' => ['11 mod urutan', 'Urutan 3D boleh laras', 'Reka bentuk hiasan ruang tamu'],
                'promo' => 'Tiada deposit', 'img' => 'images/pebble.png'],
            ['name' => 'BEREX Massage Bed', 'tag' => 'Katil urut', 'plans' => $pelan(179, 169, 199, 159),
                'ringkas' => 'Katil urut dengan roller panas',
                'sesuai' => 'Yang mahu urutan sambil berbaring',
                'feats' => ['30 mod & 12 tahap kekuatan', 'Urutan haba 3D', 'Muzik melalui Bluetooth'],
                'promo' => 'Pemasangan percuma', 'img' => 'images/berex-bed.png'],
        ]],
        // HARGA, TAG & PROMO AIRCOND DI BAWAH MASIH SEMENTARA – tukar ikut harga sebenar.
        ['name' => 'Aircond', 'kind' => 'aircond', 'products' => [
            ['name' => 'Aircond F Series', 'tag' => '5 bintang tenaga', 'plans' => $pelan(119, 109, 139, 99),
                'ringkas' => 'Sejuk dan udara bersih sekali gus',
                'sesuai' => 'Bilik tidur dan ruang tamu',
                'feats' => ['Penapisan 5 langkah', 'Sistem cuci sendiri', 'Penarafan 5 bintang Suruhanjaya Tenaga'],
                'promo' => 'Pemasangan percuma', 'img' => 'images/f-series.png'],
            ['name' => 'Aircond P Series', 'tag' => '2.0 HP', 'plans' => $pelan(139, 129, 159, 119),
                'ringkas' => 'Kuasa besar, bil elektrik rendah',
                'sesuai' => 'Ruang tamu dan bilik besar',
                'feats' => ['2.0 HP, penarafan tenaga 5 bintang', 'Sterilisasi UVC & ioniser', 'Kondenser Golden Fin tahan karat'],
                'promo' => 'Tiada deposit', 'img' => 'images/p-series.png'],
        ]],
    ],

];
