
@if(Session::has('error'))
<div class="row m-2" >
        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                id="type-error">{{Session::get('error')}}
        </button>
</div>
@endif