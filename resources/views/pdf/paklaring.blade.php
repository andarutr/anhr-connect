<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Paklaring - {{ $employee->nama_lengkap }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        .header { text-align: center; margin-bottom: 30px; }
        .content { margin-top: 30px; }
        .signature { margin-top: 80px; display: flex; justify-content: space-between; }
        .signature div { text-align: center; width: 30%; }
        .footer { margin-top: 50px; font-size: 10pt; text-align: center; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h2>PAKLARING</h2>
        <p>Surat Keterangan Pemberhentian Pegawai</p>
    </div>

    <div class="content">
        <p>Dengan ini kami menyatakan bahwa:</p>
        
        <table style="width: 100%; margin: 20px 0;">
            <tr><td>Nama Lengkap</td><td>: {{ $employee->nama_lengkap }}</td></tr>
            <tr><td>NIK</td><td>: {{ $employee->nik }}</td></tr>
            <tr><td>Posisi</td><td>: {{ $employee->position }}</td></tr>
            <tr><td>Departemen</td><td>: {{ $employee->department }}</td></tr>
            <tr><td>Tanggal Masuk Kerja</td><td>: {{ \Carbon\Carbon::parse($employee->hire_date ?? now())->format('d M Y') }}</td></tr>
            <tr><td>Tanggal Resign</td><td>: {{ \Carbon\Carbon::parse($employee->resign_at)->format('d M Y') }}</td></tr>
            <tr><td>Tanggal Akhir Kerja</td><td>: {{ $lastDay->format('d M Y') }}</td></tr>
        </table>

        <p>Adalah benar-benar telah berhenti bekerja di perusahaan kami sejak tanggal {{ $lastDay->format('d M Y') }}. Selama masa kerjanya, karyawan tersebut telah menjalankan tugasnya dengan baik dan tidak memiliki tanggungan terhadap perusahaan.</p>
        
        <p>Demikian surat keterangan ini dibuat untuk dapat digunakan sebagaimana mestinya.</p>
    </div>

    <div class="signature">
        <div>
            <p>HRD Manager</p>
            <br><br><br>
            <p>Andaru Triadi</p>
        </div>
    </div>
</body>
</html>