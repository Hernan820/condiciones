$(document).ready(function () {
    $('#datetimepicker-minimum-tarea').datetimepicker({format: 'L'});

    if (!window.Quill) {
        return $("#quill-editor,#quill-toolbar,#quill-bubble-editor,#quill-bubble-toolbar").remove();
    }
    var editor = new Quill("#quill-editor", {
        modules: {
            toolbar: "#quill-toolbar"
        },
        placeholder: "Type something",
        theme: "snow"
    });
    var bubbleEditor = new Quill("#quill-bubble-editor", {
        placeholder: "Compose an epic...",
        modules: {
            toolbar: "#quill-bubble-toolbar"
        },
        theme: "bubble"
    });
   
    

 });

