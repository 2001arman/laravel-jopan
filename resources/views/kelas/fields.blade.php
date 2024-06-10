<div class="col-md-6 mb-5">
    {{ Form::label('id_guru', 'Guru', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::select('id_guru', $gurus, null, ['class' => 'form-select', 'data-control'=>"select2", 'placeholder' => 'Guru']) }}
</div>

<div class="col-md-6 mb-5">
    {{ Form::label('id_mata_pelajaran', 'Pelajaran', ['class' => 'form-label']) }}
    <span class="required"></span>
    {{ Form::select('id_mata_pelajaran', $pelajaran, null, ['class' => 'form-select', 'data-control'=>"select2",'placeholder' => 'Pelajaran']) }}
</div>


<!-- Submit Field -->
<div class="d-flex justify-content-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'medicineSave']) }}
    <a href="{{ route('murid.index') }}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
