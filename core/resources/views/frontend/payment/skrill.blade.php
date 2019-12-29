@extends('frontend.master')
@section('Body')
    <section>
        @php
            $send_pay = Session::get('Sdata');
        @endphp
    {!! $send_pay !!}
    </section>
    <script type="text/javascript">
        $(document).ready(function(){
            $( "body" ).contextmenu(function() {
                alert( "Right Click Not Allow!" );
            });
            $("#pament_form" ).submit();
        });
    </script>
@endsection