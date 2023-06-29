@extends('layouts.chat')
@section('content')
    <agora-chat :allusers="{{ $users }}" authuserid="{{ auth()->id() }}" authuser="{{ auth()->user()->name }}"
                agora_id="{{ env('AGORA_APP_ID') }}" />
@endsection
<script>
    import AgoraChat from "../js/components/AgoraChat.vue";
    export default {
        components: {AgoraChat}
    }
</script>
