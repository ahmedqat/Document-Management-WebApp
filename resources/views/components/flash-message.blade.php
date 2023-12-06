@if (session()->has('message'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         class="position-fixed bottom-0 start-50 translate-middle-x p-4 bg-danger text-white rounded">
        <p class="mb-0 h5">{{ session('message') }}</p>
    </div>
@endif
