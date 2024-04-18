<div class="mb-5">
    <x-button x-on:click="redirectToCreatePage"> {{ __('Create Blog') }}</x-button>
</div>

<script>
    function redirectToCreatePage() {
        window.location.href = 'http://127.0.0.1:8000/admin/posts/create';
    }
</script>
