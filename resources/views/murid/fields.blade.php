{{ Form::hidden('currency_symbol', getCurrentCurrency(), ['class' => 'currencySymbol']) }}
<!-- Name Field -->
<div class="form-group col-md-6 mb-5">
    {{ Form::label('nama', 'Nama :', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::text('name', null, ['class' => 'form-control','minlength' => 2, 'id' => 'medicineNameId']) }}
</div>

<!-- tanggal lahir Field -->
<div class="form-group col-md-6 mb-5">
    {{ Form::label('tanggal_lahir',__('messages.doctor.dob').':' ,['class' => 'form-label']) }}
    {{ Form::text('tanggal_lahir', null,['class' => 'form-control doctor-dob','placeholder' => 'Tanggal Lahir', 'id'=>'dob']) }}
</div>

<!-- phpne Field -->
<div class="form-group col-md-6 mb-5">
    {{ Form::label('phone', 'Nomor Telephone' ,['class' => 'form-label']) }}
    {{ Form::text('phone', null,['class' => 'form-control ','placeholder' => 'Nomor Telephone', 'id'=>'dob']) }}
</div>

<div class="col-md-6 mb-5">
    {{ Form::label('gender', 'Jenis Kelamin', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::select('gender', $genders, null, ['class' => 'form-select', 'placeholder' => 'Jenis Kelamin', 'id' => 'medicineCategoryId']) }}
</div>


<!-- Submit Field -->
<div class="d-flex justify-content-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'medicineSave']) }}
    <a href="{{ route('murid.index') }}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
