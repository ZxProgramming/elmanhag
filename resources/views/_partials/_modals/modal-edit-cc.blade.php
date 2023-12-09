<!-- Add New Credit Card Modal -->
<div class="modal fade" id="editCCModal{{$method->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Edit Card</h3>
          <p>Edit your saved card details</p>
        </div>
        <form method="POST" action="{{route('edit_payment_method')}}" class="row g-3">
            @csrf
            <input type="hidden" value="{{$method->id}}" name="id">
          <div class="col-12">
            <label class="form-label w-100" for="modalEditCard">Card Number</label>
            <div class="input-group input-group-merge">
              <input id="modalEditCard" name="card_number" class="form-control credit-card-mask-edit" type="text" placeholder="4356 3215 6548 7898" value="{{$method->card_number}}" aria-describedby="modalEditCard2" />
              <span class="input-group-text cursor-pointer p-1" id="modalEditCard2"><span class="card-type-edit"></span></span>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditName">Name</label>
            <input type="text" id="modalEditName" name="name" class="form-control" placeholder="John Doe" value="{{$method->name}}" />
          </div>
          <div class="col-6 col-md-3">
            <label class="form-label" for="modalEditExpiryDate">Exp. Date</label>
            <input type="text" id="modalEditExpiryDate" name="exp" class="form-control expiry-date-mask-edit" placeholder="MM/YY" value="{{$method->exp_date}}" />
          </div>
          <div class="col-6 col-md-3">
            <label class="form-label" for="modalEditCvv">CVV Code</label>
            <div class="input-group input-group-merge">
              <input type="text" id="modalEditCvv" class="form-control cvv-code-mask-edit" maxlength="3" placeholder="654" value="{{$method->cvv_code}}" />
              <span class="input-group-text cursor-pointer" name="cvv" id="modalEditCvv2"><i class="bx bx-help-circle text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
            </div>
          </div>
          <!--<div class="col-12">-->
          <!--  <label class="switch">-->
          <!--    <input type="checkbox" class="switch-input" checked>-->
          <!--    <span class="switch-toggle-slider">-->
          <!--      <span class="switch-on">-->
          <!--        <i class="bx bx-check"></i>-->
          <!--      </span>-->
          <!--      <span class="switch-off">-->
          <!--        <i class="bx bx-x"></i>-->
          <!--      </span>-->
          <!--    </span>-->
          <!--    <span class="switch-label">Set as primary card</span>-->
          <!--  </label>-->
          <!--</div>-->
          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add New Credit Card Modal -->
