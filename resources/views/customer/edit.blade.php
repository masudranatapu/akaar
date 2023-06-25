
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Customer</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal"
        aria-label="Close"></button>
</div>
<form action="{{ route('customer.update', $customer->id) }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="">Branch</label>
            <select name="branch_id" class="form-control">
                <option value="1" @if($customer->branch_id == 1) selected @endif>Develop</option>
                <option value="2" @if($customer->branch_id == 2) selected @endif>App</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">First Name <span class="text-danger">*</span></label>
            <input type="text" name="f_name" value="{{$customer->f_name}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">First Name <span class="text-danger">*</span></label>
            <input type="text" name="l_name" value="{{$customer->l_name}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Email<span class="text-danger">*</span></label>
            <input type="email" name="email" value="{{$customer->email}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Phone</label><span class="text-danger">*</span></label>
            <input type="number" name="phone" value="{{$customer->phone}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Phone</label><span class="text-danger">*</span></label>
            <select name="gender" class="form-control">
                <option value="Male" @if($customer->gender == "Male") selected @endif>Male</option>
                <option value="Female" @if($customer->gender == "Female") selected @endif>Female</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>