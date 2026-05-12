<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggal Otomatis PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .container {
            text-align: center;
            background: rgba(255,255,255,0.1);
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }
        .tanggal {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .waktu {
            font-size: 1.5em;
            margin-top: 10px;
        }
        .hari {
            font-size: 1.2em;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tanggal" id="tanggal"></div>
        <div class="waktu" id="waktu"></div>
        <div class="hari" id="hari"></div>
    </div>

    <?php
    // Fungsi untuk mendapatkan nama hari dalam bahasa Indonesia
    function getHariIndonesia($timestamp) {
        $hari = date('w', $timestamp);
        switch($hari) {
            case 0: return 'Minggu';
            case 1: return 'Senin';
            case 2: return 'Selasa';
            case 3: return 'Rabu';
            case 4: return 'Kamis';
            case 5: return 'Jumat';
            case 6: return 'Sabtu';
            default: return 'Tidak Diketahui';
        }
    }

    // Fungsi untuk mendapatkan nama bulan dalam bahasa Indonesia
    function getBulanIndonesia($timestamp) {
        $bulan = date('n', $timestamp);
        switch($bulan) {
            case 1: return 'Januari';
            case 2: return 'Februari';
            case 3: return 'Maret';
            case 4: return 'April';
            case 5: return 'Mei';
            case 6: return 'Juni';
            case 7: return 'Juli';
            case 8: return 'Agustus';
            case 9: return 'September';
            case 10: return 'Oktober';
            case 11: return 'November';
            case 12: return 'Desember';
            default: return 'Tidak Diketahui';
        }
    }

    // Contoh tanggal spesifik: Senin, 12 Mei 2026
    $tanggalSpesifik = strtotime('2026-05-12');
    $hariSpesifik = getHariIndonesia($tanggalSpesifik);
    $tanggalSpesifikFormat = date('d', $tanggalSpesifik) . ' ' . getBulanIndonesia($tanggalSpesifik) . ' ' . date('Y', $tanggalSpesifik);
    ?>

    <script>
        // PHP data untuk tanggal spesifik
        const tanggalSpesifik = '<?php echo $hariSpesifik . ", " . $tanggalSpesifikFormat; ?>';
        
        function updateTanggal() {
            const now = new Date();
            
            // Array nama hari dan bulan dalam bahasa Indonesia
            const hariID = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const bulanID = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                           'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            
            const hari = hariID[now.getDay()];
            const tanggal = now.getDate();
            const bulan = bulanID[now.getMonth()];
            const tahun = now.getFullYear();
            
            const jam = now.getHours().toString().padStart(2, '0');
            const menit = now.getMinutes().toString().padStart(2, '0');
            const detik = now.getSeconds().toString().padStart(2, '0');
            
            document.getElementById('tanggal').textContent = `${hari}, ${tanggal} ${bulan} ${tahun}`;
            document.getElementById('waktu').textContent = `${jam}:${menit}:${detik}`;
            document.getElementById('hari').textContent = `Contoh Spesifik: ${tanggalSpesifik}`;
        }
        
        // Update setiap detik (1000ms)
        setInterval(updateTanggal, 1000);
        // Update pertama kali saat halaman dimuat
        updateTanggal();
    </script>
</body>
</html>