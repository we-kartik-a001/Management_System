@if (Session::has('success'))
    <div id="flash-message" class="text-white transition-opacity duration-500 ease-in-out">
        <p class="inline-block p-2 bg-green-600 shadow rounded-lg"> {{ Session::get('success') }}</p>
    </div>
@endif

@if (Session::has('failure'))
    <div id="flash-message" class="text-white transition-opacity duration-500 ease-in-out">
        <p class="inline-block p-2 bg-red-600 shadow rounded-lg">{{ Session::get('failure') }}</p>
    </div>
@endif

<script>
    setTimeout(() => {
        const message = document.getElementById('flash-message');
        if (message) {
            message.style.opacity = '0';
        }
        "{{ Session::forget('failure') }}"
        "{{ Session::forget('success') }}"
    }, 3000);
</script>
