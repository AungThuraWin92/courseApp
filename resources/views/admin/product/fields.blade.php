<div class="form-group col-sm-6">
    {!! Form::label('name', 'Product Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::text('stock', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
        {!! Form::label('category', 'Category:') !!}
    <select id="category" name="category[]" class="form-control" multiple>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('Feature', 'Feature Product:') !!}
    <input type="checkbox" name="feature" value="1"> Set Feature Product
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('Feature Image', 'Feature Image:') !!}
    {!! Form::file('feature_image', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('Sub Feature Image', 'Stock:') !!}
    {!! Form::file('image_one', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('Sub Feature Image', 'Stock:') !!}
    {!! Form::file('image_two', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('product.index') !!}" class="btn btn-default">Cancel</a>
</div>
