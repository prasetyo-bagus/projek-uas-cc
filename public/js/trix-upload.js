// document.addEventListener('trix-attachment-add', function (event) {
//     if (event.attachment.file) {
//         uploadAttachment(event.attachment);
//     }
// });

// function uploadAttachment(attachment) {
//     var file = attachment.file;
//     var formData = new FormData();
//     formData.append('file', file);

//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', '/upload', true);
//     xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

//     xhr.upload.onprogress = function (event) {
//         var progress = (event.loaded / event.total) * 100;
//         attachment.setUploadProgress(progress);
//     };

//     xhr.onload = function () {
//         if (xhr.status === 200) {
//             var data = JSON.parse(xhr.responseText);
//             attachment.setAttributes({
//                 url: data.url,
//                 href: data.url
//             });
//         } else {
//             attachment.remove();
//         }
//     };

//     xhr.send(formData);
// }



document.addEventListener('trix-attachment-add', function (event) {
    let attachment = event.attachment;
    if (attachment.file) {
        uploadAttachment(attachment);
    }
});


document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        document.querySelector("trix-editor").editor.loadHTML(document.querySelector("trix-editor").value);
    }, 500);
});

function uploadAttachment(attachment) {
    let file = attachment.file;
    let formData = new FormData();
    formData.append('file', file);

    fetch("{{ route('trix.upload') }}", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.url) {
                attachment.setAttributes({
                    url: data.url,
                    href: data.url
                });
            } else {
                attachment.remove();
            }
        })
        .catch(error => {
            console.error("Upload error:", error);
            attachment.remove();
        });
}
