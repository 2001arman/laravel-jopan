<div class="col-md-6 mb-5">
    {{ Form::label('id_murid', 'Murid', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::select('id_murid', $murid, null, ['class' => 'form-select', 'data-control'=>"select2",'placeholder' => 'Murid']) }}
</div>

<div class="col-md-6 mb-5">
    {{ Form::label('id_kelas', 'Kelas', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::select('id_kelas', $kelas, null, ['class' => 'form-select', 'data-control'=>"select2", 'placeholder' => 'Kelas']) }}
</div>

<div class="form-group col-md-6 mb-5">
    {{ Form::label('nilai', 'Nilai', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::number('nilai', null, ['class' => 'form-control']) }}
</div>

<!-- Submit Field -->
<div class="d-flex justify-content-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'medicineSave']) }}
    <a href="{{ route('nilai.index') }}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
