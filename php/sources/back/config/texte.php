<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "textarea#texte",
    theme: "modern",
    language : 'fr_FR',
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
   ],
toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager |  link unlink anchor | media | forecolor backcolor  | print preview code ",
   
   image_advtab: false,
   document_base_url: "/back/",
   relative_urls:false,
   paste_word_valid_elements: "b,strong,i,em,h1,h2,p",
   // external_filemanager_path: "/back/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : window.location.protocol + "//" + window.location.host + "/back/filemanager/plugin.min.js"}
   

 }); 
</script>
