const input_load = document.getElementById('input__file');
const files = document.querySelector('.files');

const btnLoad = document.querySelector('.btn-load');
input_load.addEventListener('change', function () {
    let filesArr = this.files
    let fileItems = document.querySelectorAll('.file-item')
    fileItems.forEach(item => item.remove())
    console.log('rest')

    Array.prototype.forEach.call(filesArr, file => {
        let fileName = file.name;
        let fileSize =  (parseFloat(file.size) / 1000).toFixed(1);
        let files = document.querySelector('.files')

        let fileItem = document.createElement('div')
        fileItem.classList.add('file-item')

        let fileNameDiv = document.createElement('div')
        fileNameDiv.classList.add('file-name')
        fileNameDiv.textContent = fileName

        let fileSizeDiv = document.createElement('div')
        fileSizeDiv.classList.add('file-size')
        fileSizeDiv.textContent = fileSize + " KB"

        let fileCloseImg = document.createElement('img')
        fileCloseImg.setAttribute('src', 'assets/img/close-svg.svg')
        fileCloseImg.addEventListener('click', (e) => {
            let fileNameDelete = e.target.parentNode.querySelector('.file-name').innerText
            e.target.parentNode.remove()
            let dt = new DataTransfer();
            let filesPrev = [...input_load.files]
            let fileToDelete = filesPrev.indexOf(filesPrev.find(value => value.name == fileNameDelete))

            filesPrev.splice(fileToDelete, 1)

            filesPrev.forEach((item) => {
                dt.items.add(item);
            })

            input_load.files = dt.files
            // console.log(input_load.files)
            // console.log(input_load.files)

        })
        fileItem.appendChild(fileNameDiv)
        fileItem.appendChild(fileSizeDiv)
        fileItem.appendChild(fileCloseImg)

        files.appendChild(fileItem)
        btnLoad.classList.add('active')
    });

    console.log(this.files)
});

btnLoad.addEventListener('click', function() {
    if (btnLoad.classList.contains('active')) {
        let form = document.getElementById('form-load');
        let error_load = document.getElementById('error_load');

        let fd = new FormData;

        for (i = 0; i < form.file.files.length; i++){
            fd.append(i, form.file.files[i]);
        }

        fd.append('title', form.title.value);
        fd.append('description', form.description.value);

        $.ajax({
            type: "POST",
            url: "../php-scripts/action_db.php",
            processData: false,
            contentType: false,
            data: fd,
            cache: false,
            success: function(html) {
                if (html == "") {
                    window.location = '/';
                    error_load.innerHTML = html;

                } else {
                    error_load.innerHTML = html;
                }
            }
        });
        return false;
    }
});

let dropArea = document.querySelector('.fileLoad-area')
dropArea.addEventListener('dragover', function (e) {
    e.preventDefault()
    e.stopPropagation()
    this.classList.add('dragging')
})

dropArea.addEventListener('dragleave', function (e) {
    e.preventDefault()
    e.stopPropagation()
    this.classList.remove('dragging')
})

dropArea.addEventListener('drop', function (e) {
    e.preventDefault()
    e.stopPropagation()
    this.classList.remove('dragging')

    let dt = e.dataTransfer
    let files = dt.files

    let fileItems = document.querySelectorAll('.file-item')
    fileItems.forEach(item => item.remove())

    input_load.files = files

    Array.prototype.forEach.call(files, file => {
        let fileName = file.name;
        let fileSize =  (parseFloat(file.size) / 1000).toFixed(1);
        let files = document.querySelector('.files')

        let fileItem = document.createElement('div')
        fileItem.classList.add('file-item')

        let fileNameDiv = document.createElement('div')
        fileNameDiv.classList.add('file-name')
        fileNameDiv.textContent = fileName

        let fileSizeDiv = document.createElement('div')
        fileSizeDiv.classList.add('file-size')
        fileSizeDiv.textContent = fileSize + " KB"

        let fileCloseImg = document.createElement('img')
        fileCloseImg.setAttribute('src', 'assets/img/close-svg.svg')
        fileCloseImg.addEventListener('click', (e) => {
            let fileNameDelete = e.target.parentNode.querySelector('.file-name').innerText
            e.target.parentNode.remove()
            let dt = new DataTransfer();
            let filesPrev = [...input_load.files]
            let fileToDelete = filesPrev.indexOf(filesPrev.find(value => value.name == fileNameDelete))

            filesPrev.splice(fileToDelete, 1)

            filesPrev.forEach((item) => {
                dt.items.add(item);
            })

            input_load.files = dt.files

        })
        fileItem.appendChild(fileNameDiv)
        fileItem.appendChild(fileSizeDiv)
        fileItem.appendChild(fileCloseImg)

        files.appendChild(fileItem)
        btnLoad.classList.add('active')
    });
})


// const filesTest = [
//     {
//         name: 'one',
//         x: '32223'
//     },
//     {
//         name: 'two',
//         x: '4353464'
//
//     }]
//
// console.log(filesTest.find(value => value.name == 'one'))