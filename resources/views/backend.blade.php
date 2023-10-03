@extends('msdev2::layout.master')
@section('styles')
<script>
    window.URL_ROOT = '{{ config("app.url") }}';
    window.SHOP = '{{ request()->shop }}';
</script>
<link rel="stylesheet" type="text/css" href="{{ mix('/backend/app.css') }}">
@endsection
@section('content')
    <div id="app"></div>
@endsection

@section('scripts')
<script>
    let data = {!! json_encode($data) !!};
    window.$GLOBALS = { ...window.$GLOBALS, ...data }
</script>
<script src="{{ mix('/backend/app.js') }}" crossorigin="anonymous"></script>
@endsection
