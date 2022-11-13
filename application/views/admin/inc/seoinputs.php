<style type="text/css">
    .vox{
        width:100%; 
        height: auto; 
        padding: 8px 6px; 
        background: #f0f3e2; 
        border-top:1px dashed #ccc;
        border-bottom:1px dashed #ccc; margin-bottom: 10px;
    } 
 </style>                                       
                                        <div class="vox">
                                        <div class="form-group">
                                            <label for="inputUserName">Meta Title</label>
                                            <input type="text" name="seo_title" placeholder="Meta Title" value="<?=@$info->seo_title  ?>"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUserName">Meta Description</label>
                                            <input type="text" name="seo_desc" placeholder="Meta Title" value="<?=@$info->seo_desc  ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUserName">Meta Keyword</label>
                                            <input type="text" name="seo_key" placeholder="Meta Title" value="<?=@$info->seo_key  ?>"  class="form-control">
                                        </div>
                                        </div>