<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-danger text-white">
          <h4 class="modal-title">Claim Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                @include('inc.messages')
          <form action="/ClaimF" method="post">
            @csrf
          <input type="hidden" id="item_name2" name="item_name">
          <input type="hidden" id="item_desc2" name="initial_desc">
              <div class="form-group">
                  <label for="phone_number">Phone number</label>
                  <input type="number" name="phone_number" class="form-control" placeholder="09012704403">
              </div>
              <div class="form-group">
                <label for="claim_desc">Describe item</label>
                <Textarea name="claim_desc" placeholder="Clearly describe item" class="form-control"></Textarea>
            </div>
            <!-- Modal footer -->
           <div class="modal-footer">
            <button type="Submit" class="btn btn-danger">Claim</button>
           </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  