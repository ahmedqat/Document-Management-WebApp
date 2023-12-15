@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         class="position-fixed bottom-0 start-50 translate-middle-x p-4 bg-success text-white rounded">
        <p class="mb-0 h5">{{ session('success') }}</p>
    </div>
@endif
