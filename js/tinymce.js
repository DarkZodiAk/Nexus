const form = document.getElementsByTagName("form")[0]
const message_form = document.getElementById("message_form");
const topic_form = document.getElementById("topic_form");
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

if (form){
    const example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'logic/upload_img.php');
      
        xhr.upload.onprogress = (e) => {
          progress(e.loaded / e.total * 100);
        };
      
        xhr.onload = () => {
          if (xhr.status === 403) {
            reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
            return;
          }
      
          if (xhr.status < 200 || xhr.status >= 300) {
            reject('HTTP Error: ' + xhr.status);
            return;
          }
      
          const json = JSON.parse(xhr.responseText);
      
          if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ' + xhr.responseText);
            return;
          }
      
          resolve(json.location);
        };
      
        xhr.onerror = () => {
          reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
        };
      
        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
      });

    tinymce.init({
        selector: 'textarea.article',
        language: 'ru',
        plugins: 'preview searchreplace autolink save visualblocks visualchars fullscreen image link codesample table charmap nonbreaking anchor lists advlist wordcount help charmap',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

        content_css: 'https://fonts.googleapis.com/css?family=Montserrat',
        content_style: 'body { font-family: "Roboto", sans-serif;}',

        style_formats: [
            {title: 'Параграф', format: 'p'},
            {title: 'Цитата', format: 'blockquote'},
        ],
        font_size_formats: '',
        block_formats: '',
        font_family_formats: 'Montserrat=montserrat, sans-serif;',
        line_height_formats: '',
        

        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        image_caption: true,
        images_upload_url: 'logic/upload_img.php'

    })

    if(message_form)
        message_form.addEventListener('submit', e => {
            e.preventDefault();
            const editorContent = tinymce.activeEditor.getContent();
            const formData = new FormData(message_form);
            formData.append('editorContent', editorContent);
            fetch('logic/send_message.php', {
                method: 'POST',
                body: formData
            }).then((response) => {
                window.location.href = "index.php?page=show_topic&id=" + urlParams.get('id')
            }).catch((error) => {
                // Handle any errors
            });
        })

    if(topic_form)
        topic_form.addEventListener('submit', e => {
            e.preventDefault();
            const editorContent = tinymce.activeEditor.getContent();
            const formData = new FormData(topic_form);
            formData.append('editorContent', editorContent);
            fetch('logic/add_topic.php', {
                method: 'POST',
                body: formData
            }).then((response) => {
                window.location.href = "index.php?page=topics&subsection=" + urlParams.get('subsection')
            }).catch((error) => {
                // Handle any errors
            });
        })
}