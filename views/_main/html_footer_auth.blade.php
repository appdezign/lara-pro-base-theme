{{ Vite::useBuildDirectory('assets/themes/' . config('theme.active')) }}
@vite(['laracms/themes/' . config('theme.active') . '/_assets/js/app.js'])
