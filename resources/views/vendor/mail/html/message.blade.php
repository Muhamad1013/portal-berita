<x-mail::layout>
  {{-- Header --}}
  <x-slot:header>
    <x-mail::header :url="config('app.url')">
      {{ config('app.name') }} - Berita Tercepat dan Terpercaya
    </x-mail::header>
  </x-slot:header>

  {{-- Body --}}
  {{ $slot }}

  {{-- Subcopy --}}
  @isset($subcopy)
    <x-slot:subcopy>
    <x-mail::subcopy>
      {{ $subcopy }}
    </x-mail::subcopy>
    </x-slot:subcopy>
  @endisset

  {{-- Footer --}}
  <x-slot:footer>
    <x-mail::footer>
      © {{ date('Y') }} {{ config('app.name') }}. Semua hak dilindungi undang-undang.<br>
      Terima kasih telah mempercayai kami sebagai sumber informasi Anda.<br>
      <a href="{{ config('app.url') }}" style="color: #DC2626;">Kunjungi situs kami</a>
    </x-mail::footer>
  </x-slot:footer>
</x-mail::layout>