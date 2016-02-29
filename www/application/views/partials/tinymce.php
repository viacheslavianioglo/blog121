<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
<!--<script>tinymce.init({ selector:'textarea' });</script>-->
<!--<script>tinymce.init({-->
<!--selector: "textarea",  // change this value according to your HTML-->
<!--plugins: "image",-->
<!--menubar: "insert",-->
<!--toolbar: "image",-->
<!--image_list: [-->
<!--{title: 'My image 1', value: 'http://www.tinymce.com/my1.gif'},-->
<!--{title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}-->
<!--]-->
<!--});-->
<!--    </script>-->


<script>tinymce.init({
        relative_urls : false,
        remove_script_host : true,
//        document_base_url : "/",
        convert_urls : true,
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime  nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview  | forecolor backcolor emoticons',
        image_advtab: true,
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ],
//        image_list: [{title: 'Chrysanthemum.jpg', value: '/img/Chrysanthemum.jpg'}, {title: 'Desert.jpg', value: '/img/Desert.jpg'}, {title: 'Hydrangeas.jpg', value: '/img/Hydrangeas.jpg'}, {title: 'Jellyfish.jpg', value: '/img/Jellyfish.jpg'}, {title: 'Koala.jpg', value: '/img/Koala.jpg'}, {title: 'Lighthouse.jpg', value: '/img/Lighthouse.jpg'}, {title: 'Penguins.jpg', value: '/img/Penguins.jpg'}, {title: 'sendmail_daemon.ico', value: '/img/sendmail_daemon.ico'}, ]
        image_list:  "<?=base_url()?>account/images/mylist",
        image_dimensions: false

    });
</script>