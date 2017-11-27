@if($message = session('message'))
    <div id="flash-message" class="alert alert-success" role="alert">
        {{$message}}
    </div>
@endif