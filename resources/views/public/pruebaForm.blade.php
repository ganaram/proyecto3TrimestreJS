@extends('public.layout')
@section('content')
<form id="formTest">
<br>

  <div class="form-group">
    <label for="mail">Email address</label>
    <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div id="errorsMail" role="alert"> 
  </div>

  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" id="pwd" placeholder="Password">
  </div>

  <div id="errorsPwd" role="alert"> 
  </div>

  <div class="form-group">
  <label for="selector">Account</label>
  <select id="selector" class="custom-select">
        <option value="">Select an accout type...</option>
        <option value="free">Free</option>
        <option value="standard">Standard</option>
        <option value="premium">Premium</option>
      </select>
  </div>
    
    <div id="errorsSelect" role="alert"> 
    </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="text" class="form-control" id="age" placeholder="Age">
    <small class="form-text text-muted">Your age should be 18 or older.</small>
  </div>

  <div id="errorsAge" role="alert">
  </div>

<div class="form-group">
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="terms">
  <label class="custom-control-label" for="terms">I agree da terms</label>
</div>
</div>

  <div id="errorsTerms" role="alert"> 
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

  <div class="modal fade" id="errorsForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Incorrect Data!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Check your form and correct the errors.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Correct data!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      All the data is correct, you can now login.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</form>
@endsection

@push('scripts')
<script src="{{ mix('/js/validation.js') }}" defer ></script>
@endpush