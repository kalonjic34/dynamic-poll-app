<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dynamic Poll App</title>

  <script src="https://cdn.tailwindcss.com"></script>

  {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    body {
      @apply bg-slate-100 text-slate-900 antialiased;
    }

    .btn {
      @apply inline-flex items-center justify-center rounded-lg px-3 py-2 text-sm font-semibold transition focus:outline-none focus:ring-2 focus:ring-cyan-500/40;
    }

    .btn-primary {
      @apply bg-cyan-700 text-white shadow-sm hover:bg-cyan-800;
    }

    .btn-secondary {
      @apply bg-white text-slate-700 ring-1 ring-slate-200 hover:bg-slate-50;
    }

    .btn-remove {
      @apply shrink-0 text-slate-500 hover:bg-rose-50 hover:text-rose-700;
    }

    label {
      @apply mb-2 block text-xs font-bold uppercase tracking-wider text-slate-500;
    }

    input,
    textarea {
      @apply w-full appearance-none rounded-lg border border-slate-200 bg-white px-3 py-2.5 leading-tight text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-cyan-600 focus:ring-4 focus:ring-cyan-500/10;
    }

    .error {
      @apply text-red-500 text-sm
    }
  </style>
  {{-- blade-formatter-enable --}}

  @livewireStyles
</head>

<body class="min-h-screen px-4 py-8 sm:px-6 sm:py-14">
  @livewireScripts

  <main class="mx-auto max-w-2xl">
    @livewire('create-poll')
  </main>
</body>

</html>