<!-- DA Approval Alert -->

<div class="modal modal-primary fade" id="ApprovalModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Approve</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="#" id="deleteDAApprovalFormAction" method="post">
                    {{ csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">Are you sure ? You want to approve that user!</p>
                    <input type="hidden" name="id" id="update_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>