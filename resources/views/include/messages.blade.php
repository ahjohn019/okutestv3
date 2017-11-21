@if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
@endif

@if(session('storeAdded'))
    <div class="alert alert-success">
        {{session('storeAdded')}}
    </div>
@endif

@if(session('storeUpdated'))
    <div class="alert alert-success">
        {{session('storeUpdated')}}
    </div>
@endif

@if(session('storeDeleted'))
    <div class="alert alert-success">
        {{session('storeDeleted')}}
    </div>
@endif

@if(session('productAdded'))
    <div class="alert alert-success">
        {{session('productAdded')}}
    </div>
@endif

@if(session('productUpdated'))
    <div class="alert alert-success">
        {{session('productUpdated')}}
    </div>
@endif

@if(session('productDeleted'))
    <div class="alert alert-success">
        {{session('productDeleted')}}
    </div>
@endif

@if(session('serviceAdded'))
    <div class="alert alert-success">
        {{session('serviceAdded')}}
    </div>
@endif

@if(session('serviceUpdated'))
    <div class="alert alert-success">
        {{session('serviceUpdated')}}
    </div>
@endif

@if(session('serviceDeleted'))
    <div class="alert alert-success">
        {{session('serviceDeleted')}}
    </div>
@endif


@if(session('eventAdded'))
    <div class="alert alert-success">
        {{session('eventAdded')}}
    </div>
@endif

@if(session('eventUpdated'))
    <div class="alert alert-success">
        {{session('eventUpdated')}}
    </div>
@endif

@if(session('eventDeleted'))
    <div class="alert alert-success">
        {{session('eventDeleted')}}
    </div>
@endif

@if(session('searchProduct'))
    <div class="alert alert-success">
        {{session('searchProduct')}}
    </div>
@endif
@if(session('cartItemUpdated'))
    <div class="alert alert-success">
        {{session('cartItemUpdated')}}
    </div>
@endif
