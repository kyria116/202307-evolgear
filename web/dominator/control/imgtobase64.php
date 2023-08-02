<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#imgbase-Modal" id="imgbase-modal-btn">
    <span class="glyphicon glyphicon-picture"  aria-hidden="true"></span>
</button>

<!-- Modal -->
<div class="modal fade" id="imgbase-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">圖片轉成base64</h4>
        </div>
        <div class="modal-body">			
            <div class="form-group">		
                <label for="btnbase64" class="control-label">請選擇圖片</label>
                <input type="file" id="btnbase64"/>
            </div>
            <div class="form-group">
                <label for="imgBase64" class="control-label">請複製以下文字，到編輯器內。</label>
                <textarea id="imgBase64" class="form-control"  cols="100" rows="10"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success copybutton" onclick="copybtn()" onmouseout="outcopy()">
                <span class="tooltiptext" id="myTooltip">複製</span>
            </button>
            <button type="button" class="btn btn-danger" id="clearbtn" onclick="clearimg()">Clear</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<style>
    #imgbase-modal-btn{
        position: fixed;
        bottom:25%;
        background-color: #3c3c3c;
        border-color: #3c3c3c;
        border-radius: 0;
    }
</style>