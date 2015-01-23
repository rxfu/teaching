<!-- Modal Dialog -->
<div class="modal fade" id="dialogConfirm" role="dialog" aria-labelledby="dialogConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title" id="dialogConfirmLabel">删除数据</h4>
            </div>
            <div class="modal-body alert-danger">
                <p><i class="fa fa-warning fa-fw"></i> 数据将会<strong>永久删除而且不能恢复！</strong>你确定要这么做？</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirm">永久删除</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>