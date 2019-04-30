<div class="expense-add-default">
<div class='form-group'>
    <label class="control-label col-sm-2">Payment Type <span class="text-danger" title="This field is required">*</span></label>
    <div class="col-sm-9">
    <select name="payment_type" id="payment_type" required class='form-control'>
        <option value=""> Select one </option>
        <option value="cash">Cash Payment</option>
        <option value="cheque">Cheque Payment</option>
        
    </select>
    </div>
</div>

{{--  Cash form fld  --}}
<div id="cash_section" style="display:none;">
<div class='form-group' style="display:none;">
    <label class="control-label col-sm-2">Paid / Incurred By <span class="text-danger" 
    title="This field is required">*</span></label>
    <div class="col-sm-9">
        <select name="paid_incurred_by" id="paid_incurred_by" required class='form-control cash-show-hide'>
                <option value=""> Select One </option>
                <option value="self" selected="selected">Self or Agent </option>
                <option value="pol_party">Political Party </option>
                <option value="others">Others </option>
                        
        </select>
    </div>
</div>       
    
<div class='form-group'>
        <label class="control-label col-sm-2">Description </label>
        <div class="col-sm-9">
        <input type='text' name='description' class='form-control' value=''/>
        </div>
</div>
<div class='form-group'>
        <label class="control-label col-sm-2">Bill / Voucher No </label>
        <div class="col-sm-9">
        <input type='text' name='bill_voucher_no' class='form-control cash-show-hide' value=''/>
        </div>
</div>
<div class='form-group'>
        <label class="control-label col-sm-2">Bill / Voucher Date </label>
        <div class="col-sm-9">
        <input type='text' name='bill_voucher_date' class='form-control input_date date_range_class' value=''/>
        </div>
</div>
<div class='form-group'>
        <label class="control-label col-sm-2">Quantity </label>
        <div class="col-sm-9">
        <input type='number' min ="0" name='quantity' class='form-control' value=''/>
        </div>
</div>
<div class='form-group'>
        <label class="control-label col-sm-2">Rate Per Unit </label>
        <div class="col-sm-9">
        <input type='number' min ="0" name='rate_per_unit' class='form-control ' value=''/>
        </div>
</div> 

</div>
{{--  Cheque form fld  --}}

<div id="cheque_section" style="display:none;">
       
<div class='form-group'>
        <label class="control-label col-sm-2">Cheque No <span class="text-danger" 
        title="This field is required">*</span></label>
        <div class="col-sm-9">
        <input type='text' name='cheque_no' required class='form-control cheque-show-hide' value=''/>
        </div>
</div>


</div>

<div class='form-group'>
        <label class="control-label col-sm-2"><span id="payeename">Name & Address of Payee</span><span class="text-danger" 
        title="This field is required">*</span></label>
        <div class="col-sm-9">
        <input type='text' name='payee_name' id="payee_name" required class='form-control cheque-show-hide' value=''/>
        </div>
</div>

<style type="text/css">
    .content-header{display: none;}
</style>