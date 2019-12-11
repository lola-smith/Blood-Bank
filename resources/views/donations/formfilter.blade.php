<div class="bg-gray">
<div class="row">
<div class="form-group col-xs-4">
 <label for="name">patient name</label>

 {!! Form::text('patient_name',null, ['class' => 'form-control']) !!}
 
</div>





<div class="form-group col-xs-4">
 <label for="email">blood type</label>
 @inject('blood','App\Models\BloodType')
 {!! Form::select('blood_type_id',$blood->pluck('name','id'),null, ['class' => 'form-control']) !!}
 
</div>



<div class="form-group col-xs-4">
 <label for="phone">patient phone</label>

 {!! Form::text('patient_phone',null, ['class' => 'form-control']) !!}
 
</div>

</div>
<div class="form-group">
<button class="btn btn-primary" type="submit">
submit
</button>
    </div>
    </div>