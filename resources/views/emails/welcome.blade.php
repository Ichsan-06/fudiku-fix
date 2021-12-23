@component('mail::message')
Halo <b>{{ $data['name'] }}</b>
<h1>Pembayaran berhasil, mohon menunggu
    verifikasi </h1>
Terima kasih! Berikut detail pesananmu,
<br>
<section>
    <Table>
        <tr>
            <td>Total Bayar</td>
            <td>:</td>
            <td style="font-weight:bold;color:red">Rp.{{ $data['jumlah'] }}</td>
        </tr>
        <tr>
            <td>Metode Bayar</td>
            <td>:</td>
            <td><b>{{ $data['metode'] }}</b></td>
        </tr>
        <tr>
            <td>Total Bayar</td>
            <td>:</td>
            <td><b>{{ $data['paket'] }}</b></td>
        </tr>
        <tr>
            <td>Lama Berlangganan</td>
            <td>:</td>
            <td><b>{{ $data['subsName'] }} -</b> {{ $data['duration'] }}Hari</td>
        </tr>
    </Table>
</section>

<h1 style="text-align: center;margin-top:30px" >
    Fudiku Gratis Ongkir,
    Bebas Atur Jadwal Sesukamu.</h1>

<p>Beragam menu berkualitas setiap harinya dengan pilihan paket lengkap
    sesuai kebutuhanmu. Atur kapan aja makananmu akan diantar, bisa
    bayar di tempat.</p>


@component('mail::button', ['url' => ''])
Pesan Sekarang
@endcomponent


<img class="slider" src="{{ asset('img/slider/1.png') }}" class="logo" alt="Laravel Logo"><br>
<p>E-mail ini dibuat otomatis, mohon tidak membalas. Jika butuh bantuan,
    silakan hubungi Customer Service Fudiku.</p>
{{-- {{ config('app.name') }} --}}
@endcomponent
