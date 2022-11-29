
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form action="<?= base_url('Usermanagment/insert_role');?>" method="post" id="role_edit">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User Management Role</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h4 for="field-1" class="form-label">Role Name</h4>
                                <input type="hidden" name="role_update" value="true">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <!-- <label for="field-1" class="form-label">Role Name</label> -->
                                <input type="text" class="form-control"  name="role_type" id="field-1" placeholder="Admin">
                            </div>
                            <p hidden>If you update the current status will automatically changed to active</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
