<?php include('p1.php'); ?>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<div id="editor1" contenteditable="true">
    <h1>Inline Editing in Action!</h1>
    <p>The "div" element that contains this text is now editable.</p>
</div>


<h1>Hellow WORLD</h1>
<p>Nulla ut aliquet massa, eget cursus ante. Phasellus aliquam nunc vel nulla egestas eleifend. Vestibulum ligula tortor, aliquam at ex in, porta hendrerit diam. Aliquam erat volutpat. Duis sed orci quis lacus volutpat blandit a id dolor. Vestibulum ultricies, mauris eget ultrices auctor, magna erat pulvinar eros, vitae condimentum nunc mauris non odio. Suspendisse in velit lacus. Nunc erat diam, bibendum sed commodo vitae, consectetur in purus. Vestibulum dignissim in tellus a consequat.</p>


<hr />
<p style="font-size: 12px;">
<?=nl2br($cmn->nsw_tnc)  ?>
</p>

<?php include('p2.php'); ?>


<script>
    // Turn off automatic editor creation first.
    CKEDITOR.disableAutoInline = true;
    //CKEDITOR.inline( 'editor1' );

    CKEDITOR.inline( 'editor1',
    {
        toolbar : 'Basic', /* this does the magic */
    });
</script>