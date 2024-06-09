<!-- Name Field -->
<div class="form-group col-md-6 mb-5">
    {{ Form::label('nama', 'Nama :', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::text('name', null, ['class' => 'form-control','minlength' => 2, 'id' => 'medicineNameId']) }}
</div>

<!-- Submit Field -->
<div class="d-flex justify-content-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'medicineSave']) }}
    <a href="{{ route('pelajaran.index') }}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
