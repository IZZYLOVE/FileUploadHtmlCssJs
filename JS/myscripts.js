// const form = document.querySelector("form"),
const form = document.querySelector("#fileform"),
fileInput = form.querySelector(".file-input"),
progressArea = document.querySelector(".progress-area"),
uploadedArea = document.querySelector(".uploaded-area");

form.addEventListener("click", ()=>{
    fileInput.click();
})

fileInput.onchange = ({target}) =>{
    let file = target.files[0]; // getting file and [0] means if user selected multiple files then get the first one only
        if(file){// if file is selected
        let fileName = file.name; // getting sellected file name
        if(fileName.length >= 12){
            let splitName = fileName.split('.');
            fileName = splitName[0].substring(0, 12) + "... ." + splitName[1];
        }
        uploadFile(fileName)

    }  
}

function uploadFile(name) {
    // alert('here')
    i =0
    let xhr = new XMLHttpRequest(); // creating new xml object (AJAX)
    // xhr.open("POST", "php/upload.php"); // sending the post request to the specified url/file
    xhr.open("POST", "php/upload_mod.php"); // sending the post request to the specified url/file
    xhr.upload.addEventListener("progress", ({loaded, total}) => {
        let fileLoaded = Math.floor((loaded / total) * 100); // getting the percentage of loaded file sze
        let fileTotal = Math.floor(total / 1000); // getting the file size in bytes
        // console.log(fileLoaded, fileTotal)
        let fileSize;
        (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
        let progressHTML = `
                <li class="row">
                <i class="fas fa-file-alt"></i> 
                    <div class="content">
                        <div class="details">
                            <span class="name">${name}. Uploading</span>
                            <span class="percent">${fileLoaded}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: ${fileLoaded}%"></div>
                        </div>
                    </div>
                </li>`;
        progressArea.classList.add("onprogress"); 
        progressArea.innerHTML = progressHTML;
        if(loaded == total){
        progressArea.innerHTML = '';
        let uploadedHTML = `
            <li class="row">
            <div class="content">
                <i class="fas fa-file-alt"></i> 
                <div class="details">
                    <span class="name">${name}. Uploaded</span>
                    <span class="size">${fileSize}</span>
                </div>
            </div>
            <i class="fas fa-check"></i>
            </li>`;
        progressArea.classList.remove("onprogress"); 
        uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
        }
    });
    let formdata = new FormData(form); //form data is object to easily send form data
    xhr.send(formdata); // sending form data
}