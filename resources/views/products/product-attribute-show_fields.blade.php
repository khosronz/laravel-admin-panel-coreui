

<div class="row" id="multi-select">
    <div class="col-sm-6">
        <!-- Id Field -->
        <div class="form-group">
            {!! Form::label('id', __('Id').':') !!}
            <p>{!! $product->id !!}</p>
        </div>

        <!-- Title Field -->
        <div class="form-group">
            {!! Form::label('title', __('Title').':') !!}
            <p>{!! $product->title !!}</p>
        </div>

        <!-- Desc Field -->
        <div class="form-group">
            {!! Form::label('desc', __('Desc').':') !!}
            <p>{!! $product->desc !!}</p>
        </div>

        <!-- Product Visits Field -->
        <div class="form-group">
            {!! Form::label('product_visits', __('Product Visits').':') !!}
            <p>{!! $product->product_visits !!}</p>
        </div>

        <!-- User Id Field -->
        <div class="form-group">
            {!! Form::label('user_id', __('User Id').':') !!}
            <p>{!! $product->user->name !!}</p>
        </div>


        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', __('Created At').':') !!}
            <p>{!! jdate($product->created_at) !!}</p>
        </div>

        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', __('Updated At').':') !!}
            <p>{!! jdate($product->updated_at) !!}</p>
        </div>
    </div>

    <div class="col-sm-6">
        <multiple-select-component :product_id="{{$product->id}}"></multiple-select-component>
    </div>
</div>
