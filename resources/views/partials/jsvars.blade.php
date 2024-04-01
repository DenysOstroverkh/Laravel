<script>
    @if(Auth::user())
        window._authuser = {!! Auth::user() !!};
    @else
        window._authuser = null;
    @endif
    window._appname = '{{ config('app.name') }}';
    window._appurl = '{{ config('app.url') }}';
    window._enviroment = '{{config('app.env', 'local')}}';
    window._multilang = {!! Helpers::multilang() !!};
    window._translations = {!! Helpers::getJsonTranslations() !!};
</script>
