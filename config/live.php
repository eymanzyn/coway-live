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
| 'spec'    : cip spesifikasi bawah nama, cth '🔥 Panas 1.0 L' (pilihan).
| 'feats'   : senarai ciri utama, 2–3 baris pendek (pilihan).
| 'warna'   : pilihan warna (pilihan). Setiap satu: 'nama', 'hex' (warna bulatan)
|             dan 'img' (gambar warna itu – kalau kosong, gambar utama dipakai).
|             Cth: ['nama' => 'Ciel Blue', 'hex' => '#BCD5EE', 'img' => 'images/neon-blue.png']
|
| Pelan sewaan: pelan(7+0, 5+0, 3+2, tahun ke-4 & 5 bagi pelan 3+2).
| Contoh pelan(95, 109, 119, 79) = RM95 (7+0), RM109 (5+0),
| RM119 tahun 1–3 kemudian RM79 tahun 4–5 (3+2).
|
*/

$pelan = fn (int $tujuhKosong, int $limaKosong, int $tigaDua, int $lanjutan): array => [
    ['label' => '7+0 tahun', 'bulanan' => $tujuhKosong, 'nota' => 'Sewa 7 tahun, servis berkala termasuk'],
    ['label' => '5+0 tahun', 'bulanan' => $limaKosong, 'nota' => 'Sewa 5 tahun, habis lebih cepat'],
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
                'ringkas' => 'Penapisan RO, 3 suhu, harga berbaloi',
                'spec' => ['🔥 Panas 1.0 L', '❄️ Sejuk 2.3 L', '💧 Suhu bilik 2.5 L', '🚰 Tangki 5.8 L'],
                'sesuai' => 'Pasangan atau keluarga 2–4 orang',
                'feats' => ['Penapisan RO (Reverse Osmosis)', 'Kawalan mudah guna tombol', 'Mod Eco & kunci keselamatan'],
                'promo' => 'Harga promo ~RM59/bln', 'img' => 'images/neo-plus.png'],
            ['name' => 'Neon', 'tag' => 'Kompak & bergaya', 'plans' => $pelan(56, 54, 59, 54),
                'ringkas' => 'Kompak atas meja, air suhu bilik terus',
                'spec' => ['🔥 Panas 1.0 L', '❄️ Sejuk 1.5 L', '💧 Suhu bilik terus', '🚰 Tangki 2.5 L'],
                'sesuai' => 'Individu atau keluarga kecil 1–3 orang, dapur ruang terhad',
                'feats' => ['Penapis Nanotrap™ tangkap virus & bakteria', 'Air suhu bilik aliran terus', 'Ada 5 pilihan warna'],
                'warna' => [
                    ['nama' => 'Peach Pink', 'hex' => '#F3C9C4', 'img' => 'images/neon.png'],
                    ['nama' => 'Mint Green', 'hex' => '#BFE0CB', 'img' => 'images/neon-mint.png'],
                    ['nama' => 'Ciel Blue', 'hex' => '#BCD5EE', 'img' => 'images/neon-blue.png'],
                    ['nama' => 'Pebble Gray', 'hex' => '#9A9DA3', 'img' => 'images/neon-gray.png'],
                    ['nama' => 'Porcelain White', 'hex' => '#F2F1EE', 'img' => 'images/neon-white.png'],
                ],
                'promo' => 'Tiada deposit', 'img' => 'images/neon.png'],
            ['name' => 'Dazzie', 'tag' => 'Ultra kompak', 'plans' => $pelan(99, 79, 120, 79),
                'ringkas' => 'Ultra kompak dengan 4 tetapan air panas',
                'spec' => ['🔥 Panas segera', '❄️ Sejuk 1.0 L', '💧 Suhu bilik terus', '🚰 Tangki 1.0 L'],
                'sesuai' => 'Individu atau keluarga kecil yang kerap bancuh minuman panas',
                'feats' => ['4 tetapan suhu air panas', 'UV automatik pada paip', 'Kunci keselamatan kanak-kanak'],
                'promo' => 'Pemasangan percuma', 'img' => 'images/dazzie.png'],
            ['name' => 'Villaem III', 'tag' => 'Tangki besar', 'plans' => $pelan(69, 34, 104, 34),
                'ringkas' => 'Tangki besar dengan UV automatik',
                'spec' => ['🔥 Panas 2.7 L', '❄️ Sejuk 2.6 L', '💧 Suhu bilik 6.1 L', '🚰 Tangki 11.4 L'],
                'sesuai' => 'Keluarga 4–6 orang yang kerap guna air panas',
                'feats' => ['Penapisan RO (Reverse Osmosis)', 'UV automatik', 'Pilihan isipadu & suhu, mod kunci'],
                'promo' => 'Bulan pertama PERCUMA', 'img' => 'images/villaem-3.png'],
            ['name' => 'AIS', 'tag' => 'Ais segera', 'plans' => $pelan(120, 120, 120, 120),
                'ringkas' => 'Pembuat ais terbina dalam dengan penapisan RO',
                'spec' => ['🔥 Panas 1.5 L', '❄️ Sejuk 1.8 L', '💧 Suhu bilik 1.8 L', '🧊 Ais 0.7 kg', '🚰 Tangki 5.1 L'],
                'sesuai' => 'Keluarga 2–4 orang yang kerap guna ais & minuman sejuk',
                'feats' => ['Pembuat ais terbina dalam', 'Sistem dwi-UV', 'Kunci ais & air panas'],
                'warna' => [
                    ['nama' => 'Pebble Gray', 'hex' => '#3A3D42', 'img' => 'images/ais.png'],
                    ['nama' => 'Porcelain White', 'hex' => '#F4F2EE', 'img' => 'images/ais-white.png'],
                ],
                'promo' => 'Rebat RM300', 'img' => 'images/ais.png'],
            // HARGA, TAG & PROMO 6 PENAPIS AIR DI BAWAH MASIH SEMENTARA – tukar ikut harga sebenar.
            ['name' => 'Cinnamon', 'tag' => 'Suhu bilik', 'plans' => $pelan(39, 35, 49, 32),
                'ringkas' => 'Kompak, khas untuk air suhu bilik',
                'spec' => ['💧 Suhu bilik 5.0 L', '🚰 Tangki 5.0 L'],
                'sesuai' => 'Individu atau keluarga kecil 1–3 orang yang perlukan air suhu bilik sahaja',
                'feats' => ['Penapisan RO (Reverse Osmosis)', 'Booster pump bantu aliran bila tekanan air rendah', 'Reka bentuk kompak'],
                'promo' => 'Tiada deposit', 'img' => 'images/cinnamon.png'],
            ['name' => 'Glaze', 'tag' => 'Air sejuk+', 'plans' => $pelan(79, 72, 92, 69),
                'ringkas' => 'Bekalan air sejuk lebih berterusan',
                'spec' => ['🔥 Panas 1.0 L', '❄️ Sejuk 2.5 L', '💧 Suhu bilik 2.5 L', '🚰 Tangki 6.0 L'],
                'sesuai' => 'Keluarga 2–4 orang yang kerap minum air sejuk',
                'feats' => ['Penapisan RO (Reverse Osmosis)', 'Cold Water+ untuk air sejuk berterusan', 'Air panas, sejuk & suhu bilik'],
                'promo' => 'Pemasangan percuma', 'img' => 'images/glaze.png'],
            ['name' => 'Ombak', 'tag' => 'Tangki besar', 'plans' => $pelan(99, 89, 115, 85),
                'ringkas' => 'Tangki suhu bilik besar untuk keluarga ramai',
                'spec' => ['🔥 Panas 3.4 L', '❄️ Sejuk 2.3 L', '💧 Suhu bilik 7.8 L', '🚰 Tangki 13.5 L'],
                'sesuai' => 'Keluarga 4–6 orang yang banyak minum air suhu bilik & panas',
                'feats' => ['Penapisan RO (Reverse Osmosis)', 'Tangki suhu bilik 7.8 L', 'Skrin paparan suhu & isipadu'],
                'promo' => 'Bulan pertama PERCUMA', 'img' => 'images/ombak.png'],
            ['name' => 'Core Slim', 'tag' => 'Berdiri langsing', 'plans' => $pelan(89, 82, 105, 79),
                'ringkas' => 'Unit berdiri yang langsing, jimat ruang lantai',
                'spec' => ['🔥 Panas 3.0 L', '❄️ Sejuk 3.5 L', '💧 Suhu bilik 5.5 L', '🚰 Tangki 12.0 L'],
                'sesuai' => 'Keluarga 3–5 orang yang mahu unit berdiri tapi ruang terhad',
                'feats' => ['Penapis Nanotrap™', 'Reka bentuk berdiri yang langsing', 'Sterilisasi UV'],
                'promo' => 'Tiada deposit', 'img' => 'images/core-slim.png'],
            ['name' => 'Core Plus', 'tag' => 'Kapasiti terbesar', 'plans' => $pelan(129, 119, 145, 109),
                'ringkas' => 'Kapasiti 21.1 L untuk penggunaan tinggi',
                'spec' => ['🔥 Panas 3.6 L', '❄️ Sejuk 7.1 L', '💧 Suhu bilik 10.4 L', '🚰 Tangki 21.1 L'],
                'sesuai' => 'Keluarga besar 5–8 orang atau pejabat kecil/sederhana',
                'feats' => ['Penapisan RO (Reverse Osmosis)', 'Tangki besar dengan UV', 'Unit berdiri, sesuai pejabat'],
                'promo' => 'Rebat RM300', 'img' => 'images/core-plus.png'],
            ['name' => 'Lucy Plus', 'tag' => 'Ais', 'plans' => $pelan(139, 129, 155, 119),
                'ringkas' => 'Pembuat ais tanpa perlu sentuh ais',
                'spec' => ['🔥 Panas 1.5 L', '❄️ Sejuk 2.5 L', '💧 Suhu bilik 3.5 L', '🧊 Ais 1.0 kg', '🚰 Tangki 7.5 L'],
                'sesuai' => 'Keluarga 2–4 orang yang kerap guna ais',
                'feats' => ['Penapisan RO (Reverse Osmosis)', 'Pembuat ais terbina dalam', 'Ais keluar tanpa disentuh tangan'],
                'promo' => 'Pemasangan percuma', 'img' => 'images/lucy-plus.png'],
        ]],
        // HARGA, TAG & PROMO PENAPIS UDARA DI BAWAH MASIH SEMENTARA – tukar ikut harga sebenar.
        ['name' => 'Penapis Udara', 'kind' => 'air', 'products' => [
            ['name' => 'Atrium', 'tag' => 'Ruang besar', 'plans' => $pelan(89, 83, 103, 73),
                'ringkas' => 'Penapis udara terbaru untuk ruang besar',
                'sesuai' => 'Ruang tamu besar dan rumah konsep terbuka',
                'feats' => ['Penapisan 3 peringkat dua sisi', 'Model baharu 2026', '3 pilihan warna'],
                'warna' => [
                    ['nama' => 'Sand Beige', 'hex' => '#BBA99A', 'img' => 'images/atrium.png'],
                    ['nama' => 'Porcelain White', 'hex' => '#EFEDE9', 'img' => 'images/atrium-white.png'],
                    ['nama' => 'Pebble Gray', 'hex' => '#8E9196', 'img' => 'images/atrium-gray.png'],
                ],
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
