


tinymce.init({
    selector: '.tinymce-editor-baby',
    language: 'fa_IR',
    valid_elements : '*[*]',
    directionality: 'rtl',
    allow_script_urls: true,
    theme: 'modern',
    plugins:'code paste    directionality   visualchars  link template ' +
        '   hr  nonbreaking anchor     textcolor wordcount  ' +
        '     colorpicker  ',
    toolbar1:'code paste formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent ',
    min_height: 350,
    setup : function(editor)
    {
        editor.on('init', function(){
            this.getDoc().body.style.fontSize = '20px';
            this.getDoc().body.style.fontFamily = 'Tahoma';
        });
    }

});

tinymce.init({
    selector: '.tinymce-editor-low-height',
    language: 'fa_IR',
    valid_elements : '*[*]',
    directionality: 'rtl',
    allow_script_urls: true,
    theme: 'modern',
    plugins:'code paste    directionality   visualchars  link template ' +
        '   hr  nonbreaking anchor     textcolor wordcount  ' +
        '     colorpicker  ',
    toolbar1:'code paste formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent ',
    min_height: 150,
    setup : function(editor)
    {
        editor.on('init', function(){
            this.getDoc().body.style.fontSize = '20px';
            this.getDoc().body.style.fontFamily = 'Tahoma';
        });
    }

});