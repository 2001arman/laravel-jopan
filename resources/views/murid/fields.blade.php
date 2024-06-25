{{ Form::hidden('currency_symbol', getCurrentCurrency(), ['class' => 'currencySymbol']) }}
<!-- Name Field -->
<div class="form-group col-md-6 mb-5">
    {{ Form::label('nama', 'Nama :', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::text('name', null, ['class' => 'form-control','minlength' => 2, 'id' => 'medicineNameId']) }}
</div>

<!-- tanggal lahir Field -->
<div class="form-group col-md-6 mb-5">
    {{ Form::label('tanggal_lahir', 'Tanggal lahir: ' ,['class' => 'form-label']) }}
    {{ Form::text('tanggal_lahir', null,['class' => 'form-control doctor-dob','placeholder' => 'Tanggal Lahir', 'id'=>'dob']) }}
</div>

<!-- email -->
<div class="col-md-6">
    <div class="mb-5">
        {{ Form::label('Email',__('messages.user.email').':' ,['class' => 'form-label required']) }}
        {{ Form::email('email', null,['class' => 'form-control','placeholder' => __('messages.user.email')]) }}
    </div>
</div>

<!-- password -->
<div class="col-md-6 mb-5">
    <div class="mb-1">
        {{ Form::label('password',__('messages.staff.password').':' ,['class' => 'form-label required']) }}
        <span data-bs-toggle="tooltip" title="{{ __('messages.flash.user_8_or') }}">
            <i class="fa fa-question-circle"></i>
        </span>
        <div class="mb-3 position-relative">
            {{Form::password('password',['class' => 'form-control','placeholder' => __('messages.staff.password'),'autocomplete' => 'off','required','aria-label'=>"Password",'data-toggle'=>"password"])}}
            <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600"> <i class="bi bi-eye-slash-fill"></i> </span>
        </div>
    </div>
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
