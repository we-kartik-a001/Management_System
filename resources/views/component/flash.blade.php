@if (Session::has('success'))
    <div id="flash-message" role="alert" class="fixed top-4 right-4 z-50 transition-all duration-500 ease-in-out transform">
        <div class="inline-flex items-center p-4 text-sm font-medium text-white bg-green-600 rounded-lg shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            {{ Session::get('success') }}
        </div>
    </div>
@endif

@if (Session::has('failure'))
    <div id="flash-message" role="alert" class="fixed top-4 right-4 z-50 transition-all duration-500 ease-in-out transform">
        <div class="inline-flex items-center p-4 text-sm font-medium text-white bg-red-600 rounded-lg shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            {{ Session::get('failure') }}
        </div>
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
