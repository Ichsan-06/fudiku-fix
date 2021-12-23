@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}


{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
Fudiku Gratis Ongkir, Bebas Atur Jadwal Sesukamu.

Beragam menu berkualitas setiap harinya dengan pilihan paket lengkap sesuai kebutuhanmu. Atur kapan aja makananmu akan diantar, bisa bayar di tempat.
@endcomponent
@endslot
@endcomponent
