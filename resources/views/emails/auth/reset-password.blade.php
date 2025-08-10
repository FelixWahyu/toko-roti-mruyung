@component('mail::layout')
    @slot('header')
        <table align="center" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9fafb; padding: 20px 0;">
            <tr>
                <td align="center">
                    <h2 style="font-family: Arial, sans-serif; color: #333; margin: 0; text-align:center;">Permintaan Reset
                        Password</h2>
                </td>
            </tr>
        </table>
    @endslot

    <table width="100%" cellpadding="0" cellspacing="0"
        style="font-family: Arial, sans-serif; background: #ffffff; padding: 20px; border-radius: 8px;">
        <tr>
            <td style="font-size: 16px; color: #333;">
                <p>Halo <strong>{{ $user->name ?? 'Pengguna' }}</strong>,</p>
                <p>Kami menerima permintaan untuk mengatur ulang kata sandi akun Anda.
                    Jika permintaan ini memang berasal dari Anda, silakan klik tombol di bawah untuk melanjutkan proses
                    pengaturan ulang.</p>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 20px 0;">
                <a href="{{ $resetLink }}"
                    style="background-color: #2563eb; color: #ffffff; padding: 12px 24px; text-decoration: none; font-size: 16px; border-radius: 6px; display: inline-block;">
                    Atur Ulang Kata Sandi
                </a>
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px; color: #555;">
                <p>Tautan ini hanya berlaku selama
                    <strong>{{ config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') }} menit</strong>
                    untuk menjaga keamanan akun Anda.
                </p>
                <p>Jika Anda tidak pernah mengajukan permintaan ini, abaikan email ini. Akun Anda akan tetap aman seperti
                    sebelumnya.</p>
            </td>
        </tr>
    </table>

    @slot('footer')
        <table align="center" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9fafb; padding: 15px;">
            <tr>
                <td align="center" style="font-size: 12px; color: #777;">
                    © {{ date('Y') }} {{ config('app.name') }}. Semua hak dilindungi.
                </td>
            </tr>
        </table>
    @endslot
@endcomponent
