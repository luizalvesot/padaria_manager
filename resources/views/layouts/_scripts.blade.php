<script>
    // warning, error, success, info
    @if (session('swal'))
        Swal.fire({
            title: "{{ session('title') }}",
            text: "{{ session('message') }}",
            icon: "{{ session('swal') }}",
        });
    @endif

    window.addEventListener('swal', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
        });
    });
</script>
