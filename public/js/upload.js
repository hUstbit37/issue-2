function upload() {
    if (document.getElementById("file-input").files.length === 0) {
        alert('error')
    }
    let myFile = new FormData()
    myFile.append('file', $('#file-input')[0].files[0])
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/users/import",
        data: myFile,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (res) {
            console.log(res)
        },
        error: function (data) {
            console.log(data)
        }
    })
}
